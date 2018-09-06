@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Create a New Tag</div>

    @include('admin.includes.errors')

    <div class="panel-body">
        <form action="{{ route('tag.store') }}" method="post">

            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="name">Tag Name</label>
                <input type="text" name="tag" class="form-control"/>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <input type="submit" value="Create Tag" class="btn btn-success center" />
                </div>
            </div>

        </form>
    </div>
</div>

@stop