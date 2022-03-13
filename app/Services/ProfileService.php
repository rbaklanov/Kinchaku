<?php

namespace App\Services;

use App\Models\Profile;

class ProfileService
{
    public function getProfile(): array
    {
        $profiles = json_decode(file_get_contents('https://randomuser.me/api/?results=20&gender=female&nat=de'),true);

        $profile = $profiles['results'][0];

        return $profile;

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
            'nationality' => $profile['nationality'],
        ]);
    }
}
