@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-8 col-8 text-center">
                <h1>Update {{ $user->firstName }}'s Profile</h1>
            </div>
        </div>
        {{-- Alert Button To Show Message --}}
        @if (session('msg'))
            <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ session('msg') }}</strong>
            </div>

            <script>
                var alertList = document.querySelectorAll('.alert');
                alertList.forEach(function(alert) {
                    new bootstrap.Alert(alert)
                })
            </script>
        @endif
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12 form-color shadow rounded p-3">
                <form action="{{ route('user.update') }}" method = "POST">
                    @csrf
                    {{-- First Name --}}
                    <div class="form-group mt-2">
                        <label for="">First Name: <strong class = "text-danger">*</strong> </label>
                        <input class = "form-control" type="text" name = 'firstName' placeholder = "Enter First Name"
                            value = "{{ old('firstName', $user->firstName ?? '') }}">

                    </div>
                    @error('firstName')
                        <small class="text-danger fw-bold">{{ $message }}</small>
                    @enderror

                    {{-- Last Name --}}
                    <div class="form-group mt-2">
                        <label for="">Last Name: <strong class = "text-danger">*</strong> </label>
                        <input class = "form-control" type="text" name = 'lastName' placeholder = "Enter Last Name"
                            value = "{{ old('lastName', $user->lastName ?? '') }}">

                    </div>
                    @error('lastName')
                        <small class="text-danger fw-bold">{{ $message }}</small>
                    @enderror

                    {{-- Email --}}
                    <div class="form-group mt-2">
                        <label for="">Email: <strong class = "text-danger">*</strong> </label>
                        <input class = "form-control" type="email" name = 'email' placeholder = "Enter Your Email"
                            value = "{{ old('email', $user->email ?? '') }}">
                    </div>
                    @error('email')
                        <small class="text-danger fw-bold">{{ $message }}</small>
                    @enderror

                    {{-- Password --}}
                    <div class="form-group mt-2">
                        <label for="">Password: <strong class = "text-danger">*</strong> </label>
                        <input class = "form-control" type="password" name = 'password' placeholder = "Enter Your Password" required>
                    </div>
                    @error('password')
                        <small class="text-danger fw-bold">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2 ">
                        <button class = " form-control btn btn-color">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
