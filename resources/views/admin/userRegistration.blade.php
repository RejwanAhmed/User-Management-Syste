@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-8 col-8  offset-md-2 text-center">
                <h1>{{ $title }}</h1>
            </div>
            <div class="col-md-2 mt-2 text-center ">
                <a href = "{{ route('admin.showUser') }}" class="btn btn-secondary fw-bold">Back</a>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12 form-color shadow rounded p-3">
                <form action="{{ $url }}" method = "POST">
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
                    <div class="form-group mt-2 ">
                        <button class = " form-control btn btn-color">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
