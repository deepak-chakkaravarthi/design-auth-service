@extends('layouts.app')

@section('content')
    <h1>Assign Role to User: {{ $user->username }}</h1>
    <form action="{{ route('user.assign-role.store', $user->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role">Select Role</label>
            <select id="role" class="form-control" name="role_id">
                <option value="1">Admin</option>
                <option value="2">User</option>
                <!-- Add more roles as per your application -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Assign Role</button>
    </form>
@endsection
