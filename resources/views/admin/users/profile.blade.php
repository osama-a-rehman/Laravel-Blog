@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Edit your Profile</div>

    @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error }}
                </li>
            @endforeach 
        </ul>
    @endif

    <div class="panel-body">
        <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="old_password">Old Password</label>
                <input type="password" name="old_password" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="avatar">Upload Avatar</label>
                <input type="file" name="avatar" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="facebook">Facebook Profile</label>
                <input type="text" name="facebook" value="{{ $user->profile->facebook }}" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="youtube">Youtube Profile</label>
                <input type="text" name="youtube" value="{{ $user->profile->youtube }}" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="about">About</label>
                <textarea type="text" name="about" rows="10" style="resize: none;" class="form-control">{{ $user->profile->about }}"</textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <input type="submit" value="Edit Profile" class="btn btn-success center" />
                </div>
            </div>

        </form>
    </div>
</div>

@stop