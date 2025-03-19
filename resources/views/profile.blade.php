<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
</head>
<body>
    @extends('layouts.app')
    @include('navbar')
    <h1>Profile</h1>
    <p>Welcome to your profile page!</p>

@section('content')
    <div class="container">
        <h1>{{ $user->name }}'s Profile</h1>
        <ul>
            <li>Email: {{ $user->email }}</li>
            <li>Address: {{ $user->address }}</li>
            <li>Mobile: {{ $user->mobile_number }}</li>
            <li>Gender: {{ $user->gender }}</li>
        </ul>

        @if($user->photo)
            <img src="{{ Storage::url($user->photo) }}" alt="Profile Photo" width="150">
        @endif

        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Edit Profile</a>
    </div>
@endsection

</body>
</html>
