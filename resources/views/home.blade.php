@extends('layouts.app')

@section('content')
    <div class="container mb-12" align="left" style="margin: 24px auto;">
        <div class="bg-white radius-8" style="padding: 24px;">
            <img src="{{ $profile['picture']['large'] }}" alt="User avatar">
            <div><b>Full name:</b> {{ $profile['name']['title'] . ' ' . $profile['name']['first'] . ' ' . $profile['name']['last'] }}</div>
            <div><b>Gender:</b> {{ $profile['gender'] }}</div>
            <div><b>Address:</b> {{ $profile['location']['postcode'] . ', ' .  $profile['location']['country'] . ', ' . $profile['location']['state'] . ', ' . $profile['location']['city'] . ', ' . $profile['location']['street']['name'] . ', ' . $profile['location']['street']['number']}}</div>
            <div><b>Email:</b> {{ $profile['email'] }}</div>
            <div><b>Phone:</b> {{ $profile['phone'] }}</div>
            <div><b>Date of birth:</b> {{ $profile['dob']['date'] }}</div>
            <div><b>Country:</b> {{ $profile['location']['country'] }}</div>
            <div><b>Nationality:</b> {{$profile['nat'] }}</div>
            <hr>
            <button>Update Gender</button>
            <button>Update Nationality</button>
        </div>
    </div>
@endsection
