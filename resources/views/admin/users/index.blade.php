@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            Users
        </div>

        <div class="panel-body">
			@if(count($users) > 0)
            <table class="table table-hover">
                <thead>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>Delete User</th>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><img style="border-radius: 50%; border: none;" src="{{ $user->profile->avatar }}" height="80" width="80" class="img-thumbnail" alt="No Image Found"></td>

                            <td>{{ $user->name }}</td>

                            <td>
                                @if($user->admin)
                                    <a href="{{ route('user.admin', ['id' => $user->id, 'admin' => 0]) }}" class="btn btn-danger btn-sm">Remove Privileges</a>
                                @else
                                    <a href="{{ route('user.admin', ['id' => $user->id, 'admin' => 1]) }}" class="btn btn-success btn-sm">Make Admin</a>
                                @endif
                            </td>

                            @if(Auth::id() != $user->id)
                            <td>
                                <a href=" {{ route('user.delete', ['id' => $user->id]) }} " class="btn btn-danger btn-sm">
                                <span class="">Delete</span>
                                </a>
                            </td>
                            @endif
                        </tr>

                    @endforeach
                </tbody>
            </table>
			@else
				<h2 class="text-center">No Users</h2>
			@endif
        </div>
    </div>
@endsection