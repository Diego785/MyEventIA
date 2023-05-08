<?php

namespace App\Http\Livewire\Photographer;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithFileUploads;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class EventSelected extends Component
{
    use WithFileUploads;

    public $event, $name, $category = 'public', $event_id, $image, $image_preview;
    public $result = 'No hay imágen';

    public function mount($event)
    {
        $this->event_id = $event;
    }

    public function updatedImage()
    {
        $this->image_preview = $this->image->temporaryUrl(); // guardamos la url temporal de la imagen
    }


    public function submit()
    {




        if ($this->image != null) {

            $folder = "imgs";

            $photo = new Photo();
            $image_path = Storage::disk('s3')->put($folder, $this->image, 'public');

            $photo->path = $image_path;
            $photo->photographer_id = Auth::user()->id;
            $photo->event_id = $this->event_id;
            $photo->category = $this->category;
            $photo->save();


            //EJECUTAMOS EL SCRIPT DE LA IA CON PYTHON
            // ruta a tu archivo Python
            $photographer = auth()->id();
            $event = $this->event_id;
            $image = $this->image;
            $pythonScript = "helpers/bd-test.py";

            $process = new Process(['python', $pythonScript, $photographer, $event, $image]);
            $process->run();
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            $output = $process->getIncrementalOutput();
            while (!$process->isTerminated()) {
                $output .= $process->getIncrementalOutput();
            }
            $this->result = $output;
            $this->emit('scriptExecuted', $output);

        }else{
            $this->result = 'Sigue sin haber entrado';
        }
        // return back()->withInput();



        //     // return redirect()->route('testing-screen')->with('success', 'Photo uploaded successfully!');

        //     // return redirect()->route('testing-screen')->with('error', 'Error at uploading photo! ' . $th->getMessage());
    }



    public function render()
    {
        if ($this->category == 'public') {

            $imgs = Photo::where('category', 'public')
                ->where('photographer_id', Auth()->user()->id)
                ->where('event_id', $this->event_id)
                ->get();
        } else {
            $imgs = Photo::where('category', 'private')
                ->where('photographer_id', Auth()->user()->id)
                ->where('event_id', $this->event_id)
                ->get();
        }


        return view('livewire.photographer.event-selected', compact('imgs'));
    }
}
