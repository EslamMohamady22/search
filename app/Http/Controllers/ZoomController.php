<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/ZoomController.php
use Socialite;
use Illuminate\Support\Facades\Http;
// use Laravel\Socialite\Facades\Socialite;

class ZoomController extends Controller {
    public function redirectToZoom() {
        return ( Socialite::driver('zoom'))
        ->redirect();
    }




    // public function handleZoomCallback() {
    //         $user = Socialite::driver('zoom')->user();

    //         $this->createMeeting($user);
    //         // dd($user);


    // }

    public function handleZoomCallback() {
        $user = Socialite::driver('zoom');

        dd($user);

        $token = $user->token; // OAuth Access Token
        $refreshToken = $user->refreshToken; // Refresh Token
        $expiresIn = $user->expiresIn; // Token expiration

        // Save to database
        // auth()->user()->update([
        //     'zoom_token' => $token,
        //     'zoom_refresh_token' => $refreshToken,
        //     'zoom_token_expires' => now()->addSeconds($expiresIn),
        // ]);

        return $this->createMeeting(request());

        // return redirect('/list');
    }




    public function createMeeting(Request $request) {
        $token = auth()->user()->zoom_token; // Retrieve from the database

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ])->post(env('ZOOM_API_URL') . '/users/me/meetings', [
            'topic' => 'My Meeting',
            'type' => 2,
            'start_time' => now()->addDay()->toIso8601String(),
            'duration' => 30,
        ]);



        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json([
                'error' => 'Unable to create meeting',
                'details' => $response->json(),
            ], $response->status());
        }
    }


}
