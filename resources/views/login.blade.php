@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center d-flex align-items-center" style = "height:90vh">
            <div class="col-lg-5 com-sm-6 col-12 shadow p-3 rounded form-color border">
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
                <form action="" method = "POST">
                    @csrf
                    {{-- Email --}}
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input class = "form-control mt-2" type="email" name = "email" value = "{{ old('email') }}"
                            placeholder="Enter Email" required>
                    </div>
                    @error('email')
                        <small class = "text-danger fw-bold">{{ $message }}</small>
                    @enderror

                    {{-- Password --}}
                    <div class="form-group mt-2">
                        <label for="">Password:</label>
                        <input class = "form-control" type="password" name = "password" placeholder="Enter Password"
                            required>
                    </div>
                    @error('password')
                        <small class = "text-danger fw-bold">{{ $message }}</small>
                    @enderror

                    {{-- Remember Me --}}
                    <div class="form-group mt-2">
                        <label for="remember">Remember Me</label>
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    </div>
                    <div class="form-group mt-2">
                        <button class = "btn btn-color">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
