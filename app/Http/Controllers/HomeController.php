<?php

namespace App\Http\Controllers;

use App\Services\ProfileService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request, ProfileService $profileService)
    {
        $profile = $profileService->getNewProfile();

        $profileService->saveProfile($profile);

        $profile = $profileService->getCurrentProfile();

        return view('home', compact('profile'));
    }

    public function updateGender(Request $request, ProfileService $profileService)
    {
        $profile = $profileService->updateGender();

        return view('home', compact('profile'));
    }

    public function updateNationality(Request $request, ProfileService $profileService)
    {
        $profile = $profileService->updateNationality();

        return view('home', compact('profile'));
    }
}
