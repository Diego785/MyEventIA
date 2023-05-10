<?php

namespace App\Http\Livewire\Photographer;

use App\Models\Event;
use App\Models\Guest;
use App\Models\Photo;
use App\Models\PhotoProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithFileUploads;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Support\Str;


class EventSelected extends Component
{
    use WithFileUploads;

    public $event, $name, $category = 'public', $event_id, $image, $image_preview;
    public $photosEvent = true;
    public $photosGuest;
    public $guestFinded;
    public $result = 'No hay imágen';

    public function mount($event)
    {
        $this->event_id = $event;
        $this->event = Event::find($event);
        $this->photosGuest = DB::table('photo_profiles')
            ->join('guests', 'guests.id', 'photo_profiles.guest_id')
            ->join('event_guests', 'guests.id', 'event_guests.guest_id')
            ->select('photo_profiles.*')
            ->where('event_guests.event_id', $event)
            ->get();
    }

    public function updatedImage()
    {
        $this->image_preview = $this->image->temporaryUrl(); // guardamos la url temporal de la imagen

    }




    public function submit()
    {


        if ($this->image != null) {



            // Guardar la imágen en AWS3
            $folder = "imgs";

            $photo = new Photo();
            $image_path = Storage::disk('s3')->put($folder, $this->image, 'public');

            $photo->path = $image_path;
            $photo->photographer_id = Auth::user()->id;
            $photo->event_id = $this->event_id;
            $photo->category = $this->category;
            $photo->save();


            //EJECUTAMOS EL SCRIPT DE LA IA CON PYTHON
            // ruta a tu archivo Python - Inicialización
            $photographer = auth()->id();
            $event = $this->event_id;
            $image = $image_path;
            $photosGuest = $this->photosGuest;
            $pythonScript = "helpers/bd-test.py";

            $process = new Process(['python', $pythonScript, $photographer, $event, $image, json_encode($photosGuest)]);
            $process->run();
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            $output = $process->getIncrementalOutput();
            while (!$process->isTerminated()) {
                $output .= $process->getIncrementalOutput();
            }
            $this->result = $output;

            $this->guestFinded = Guest::find($this->result)->user->name;
            $this->emit('resultSearch', $this->guestFinded);


            $this->emit('scriptExecuted', $output);
        } else {
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
