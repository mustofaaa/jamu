@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard Users</div>

                <div class="card-body ">
                    <a href="{{ route('user.create') }}" class="btn btn-primary mb-2">Add New data</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->role }}</td>
                                <td>{{ $d->password }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $d->id ) }}"
                                        class="btn btn-sm btn-primary mb-1">Edit</a>
                                    <form action="{{ route('user.destroy', $d->id ) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">delete</button>
                                    </form>
                                </td>

                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
