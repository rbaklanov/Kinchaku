<?php

namespace App\Http\Controllers;

use App\Services\ProfileService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request, ProfileService $profileService)
    {
        $profile = $profileService->getProfile();

        //dd($profile);

        return view('home', ['profile' => $profile]);
    }
}
