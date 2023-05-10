<?php

namespace App\Http\Controllers\Photographer;

use App\Http\Controllers\Controller;
use App\Models\EventPayment;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class MyEventsController extends Controller
{

    public function eventos()
    {
        return view('my-views.photographer.show-event');
    }

    public function requests()
    {
        if (Auth::user()->photographer != null) {
            $quantity_requests = EventPayment::where('photographer_id', Auth::user()->photographer->id)->where('status', 'Pendiente')->count();
        } else {
            $quantity_requests = EventPayment::where('organizer_id', Auth::user()->organizer->id)->where('status', 'Pendiente')->count();
        }
        return view('my-views.photographer.show-requests', compact('quantity_requests'));
    }


    public function event_selected($event)
    {
        return view('my-views.photographer.event-selected', compact('event'));
    }


    // public function upload_photo(Request $request)
    // {


    //     if ($request->file('image')) {
    //         $folder = "imgs";

    //         $photo = new Photo();
    //         $image_path = Storage::disk('s3')->put($folder, $request->image, 'public');

    //         $photo->path = $image_path;
    //         $photo->photographer_id = Auth::user()->id;
    //         $photo->save();
    //         $data = $photo->path;
    //         //return redirect()->route('testing-screen')->with('success', 'Photo uploaded successfully!');
    //     }
    //     return back()->withInput();



    //     // return redirect()->route('testing-screen')->with('success', 'Photo uploaded successfully!');

    //     // return redirect()->route('testing-screen')->with('error', 'Error at uploading photo! ' . $th->getMessage());
    // }

    public function python()
    {
        // ruta a tu archivo Python

        $pythonScript = "helpers/face-recognition.py";

        // ejecutar el script de Python
        $output = exec("python " . $pythonScript);

        // mostrar el resultado
        echo $output;


        echo "Diego Hurtado Vargas";
    }
    public function python_bd()
    {
        // ruta a tu archivo Python
        $photographer = auth()->id();
        $event = 1;
        $pythonScript = "helpers/bd-test.py";


        $process = new Process(['python', $pythonScript, $photographer, $event]);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $result = $process->getOutput();
        echo $result;
        // return back()->withInput();
        // // ejecutar el script de Python
        // $output = exec("python " . $pythonScript);


    }

    public function python_imgs()
    {
        // ruta a tu archivo Python
        $pythonScript = "helpers/show-imgs.py";

        // ejecutar el script de Python
        $output = exec("python " . $pythonScript);

        // mostrar el resultado
        echo $output;
    }

    
}
