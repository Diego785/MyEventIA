<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class RegisterController extends Controller
{
    public function select_register()
    {
        return view('my-views.system.register');
    }

    public function registering_time()
    {
        return view('my-views.system.registering_time');
    }

    public function registering_photographer($amount)
    {
        $amounted = $amount;
        return view('my-views.system.registering_photographer', compact('amounted'));
    }
    public function testing_payment_view()
    {
        return view('my-views.testing.testing-payment-view');
    }

    public function registering_organizer()
    {
        return view('my-views.system.registering_organizer');
    }
    public function login()
    {
        return view('my-views.system.my_login');
    }

    public function testing_qr()
    {
        $enlaceProfundo = 'miapp://formulario';

        $qrCode = QrCode::size(500)
            ->margin(10)
            ->generate($enlaceProfundo);
        // var_dump($qrCode);
   
        // $base64 = base64_encode($qrCode);
        // $image = 'data:image/png;base64,' . $base64;

         return view('my-views.testing.testing-qr', [
             'qrCode' => $qrCode,
         ]);
    }

    public function add_user_qr()
    {
        $enlaceProfundo = 'miapp://formulario';

        $qrCode = QrCode::size(500)
            ->margin(10)
            ->generate($enlaceProfundo);
        // var_dump($qrCode);
   
        // $base64 = base64_encode($qrCode);
        // $image = 'data:image/png;base64,' . $base64;

         return view('my-views.testing.testing-qr', [
             'qrCode' => $qrCode,
         ]);
    }
}
