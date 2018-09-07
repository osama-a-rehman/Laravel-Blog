@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Create a New User</div>

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
        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control"/>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <input type="submit" value="Create User" class="btn btn-success center" />
                </div>
            </div>

        </form>
    </div>
</div>

@stop