<?php

namespace App\Services;

use App\Models\Profile;

class ProfileService
{
    public function getNewProfile(): array
    {
        $profiles = json_decode(file_get_contents('https://randomuser.me/api/?results=1'),true);

        return $profiles['results'][0];
    }

    public function saveProfile(array $profile): bool
    {
        Profile::create([
            'title' => $profile['name']['title'],
            'first_name' => $profile['name']['first'],
            'last_name' => $profile['name']['last'],
            'gender' => $profile['gender'],
            'address' => $profile['location']['postcode'] . ', ' .  $profile['location']['country'] . ', ' . $profile['location']['state'] . ', ' . $profile['location']['city'] . ', ' . $profile['location']['street']['name'] . ', ' . $profile['location']['street']['number'],
            'email' => $profile['email'],
            'phone' => $profile['phone'],
            'avatar' => $profile['picture']['large'],
            'birthdate' => $profile['dob']['date'],
            'country' => $profile['location']['country'],
            'nationality' => $profile['nat'],
        ]);

        return true;
    }

    public function getCurrentProfile()
    {
        return Profile::latest()->first();
    }

    public function updateGender(): Profile
    {
        $newProfile = $this->getNewProfile();

        $profile = $this->getCurrentProfile();

        $profile['gender'] = $newProfile['gender'];

        $profile->save();

        return $profile;
    }

    public function updateNationality(): Profile
    {
        $newProfile = $this->getNewProfile();

        $profile = $this->getCurrentProfile();

        $profile['nationality'] = $newProfile['nat'];

        $profile->save();

        return $profile;
    }
}
