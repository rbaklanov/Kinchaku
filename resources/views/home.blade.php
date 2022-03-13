@extends('layouts.app')

@section('content')
    <div class="container mb-12" align="left" style="margin: 24px auto;">
        <div class="bg-white radius-8" style="padding: 24px;">
            <img src="{{ $profile->avatar }}" alt="User avatar">
            <div><b>Full name:</b> {{ $profile->full_name }}</div>
            <div><b>Gender:</b> {{ $profile->gender }}</div>
            <div><b>Address:</b> {{ $profile->address }}</div>
            <div><b>Email:</b> {{ $profile->email }}</div>
            <div><b>Phone:</b> {{ $profile->phone }}</div>
            <div><b>Date of birth:</b> {{ $profile->birthdate }}</div>
            <div><b>Country:</b> {{ $profile->country }}</div>
            <div><b>Nationality:</b> {{ $profile->nationality }}</div>
            <hr>
            <a href="{{ route('update.gender') }}" class="btn btn-secondary" role="button" aria-disabled="true">Update Gender</a>
            <a href="{{ route('update.nationality') }}" class="btn btn-secondary" role="button" aria-disabled="true">Update Nationality</a>
        </div>
    </div>
@endsection
