@extends('layouts.app')

<form action="{{ route('logout') }}" method="POST" id="logoutForm" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    
@section('content')
    <h1>All Users</h1>
    <table id="usersTable" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button class="btn btn-primary" onclick="window.location.href='/user/{{ $user->id }}'">View Details</button>
                        <button class="btn btn-warning" onclick="window.location.href='/assign-role/{{ $user->id }}'">Add Role</button>
                        <button class="btn btn-danger" onclick="window.location.href='/remove-role/{{ $user->id }}'">Remove Role</button>
                        <button class="btn btn-info" onclick="window.location.href='/update-user/{{ $user->id }}'">Update User</button>

                        <!-- <button class="btn btn-warning" onclick="assignRole({{ $user->id }})">Add Role</button> -->
                        <!-- <button class="btn btn-danger" onclick="removeRole({{ $user->id }})">Remove Role</button> -->
                        <!-- <button class="btn btn-info" onclick="updateUser({{ $user->id }})">Update User</button> -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

