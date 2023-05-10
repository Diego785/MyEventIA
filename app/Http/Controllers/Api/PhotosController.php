<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Guest;
use App\Models\Photo;
use App\Models\PhotoProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function show_photos(Request $request)
    {
        $photos = DB::table('photos')
        ->join('events', 'events.id', 'photos.event_id')
        ->join('event_guests', 'events.id', 'event_guests.event_id')
        ->join('guests', 'guests.id', 'event_guests.guest_id')
        ->select('photos.*')
        ->where('photos.category', 'public')
        ->where('guests.user_id', $request->user_id)
        ->where('event_guests.event_id', $request->event_id)
        ->get();
        return $photos;
    }

    public function show_events(Request $request)
    {
        $events = DB::table('events')
        ->join('event_guests', 'events.id', 'event_guests.event_id')
        ->join('guests', 'guests.id', 'event_guests.guest_id')
        ->select('events.*')
        ->where('guests.user_id', $request->user_id)
        ->get();
        return $events;
    }
    public function show_profile_photos(Request $request)
    {
        $profiles = DB::table('photo_profiles')
                ->join('guests', 'guests.id', '=', 'photo_profiles.guest_id')
                ->join('users', 'users.id', '=', 'guests.user_id')
                ->select('photo_profiles.*')
                ->where('users.id', $request->userId)
                ->get();
                
        // $profiles = PhotoProfile::where('guest_id', $request->guestId)->get();
        return $profiles;
    }

    public function get_profile_photo(Request $request)
    {
        if ($request->hasFile('image')) {

            $folder = "imgs";

            $photo = new PhotoProfile();
            $photo->path = Storage::disk('s3')->put($folder, $request->image, 'public');
            $guest = Guest::where('user_id', $request->userId)->first();
            if($guest!= null ){
                $photo->guest_id = $guest->id;
            }
            $photo->save();
        }else{
            echo 'Entró por aquí';
            error_log('Some message here.');
        }
    }

    public function testing_guests_photos(Request $request){
        $photosGuest = DB::table('photo_profiles')
        ->join('guests', 'guests.id', 'photo_profiles.guest_id')
        ->join('event_guests', 'guests.id', 'event_guests.guest_id')
        ->select('photo_profiles.*')
        ->where('event_guests.event_id', $request->event)
        ->get();
        return $photosGuest;
    }
}
