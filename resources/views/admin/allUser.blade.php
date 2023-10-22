@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-8 col-8  offset-md-2 text-center">
                <h1>All Users</h1>
            </div>
            <div class="col-md-2 mt-2 text-center ">
                <a href = "{{ route('admin.user.create') }}" class="btn btn-color">Add New</a>
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
        </div>
        <hr>

        <div class="row justify-content-center">
            <div class="table-responsive form-color p-2">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->firstName }}</td>
                                <td>{{ $user->lastName }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class = "btn btn-primary">Edit</a>
                                    <a href="{{ route('admin.user.delete', $user->id) }}" class = "btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->render('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
