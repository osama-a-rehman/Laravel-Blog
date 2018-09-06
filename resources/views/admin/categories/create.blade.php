@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Create a New Category</div>

    @include('admin.includes.errors')

    <div class="panel-body">
        <form action="{{ route('category.store') }}" method="post">

            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control"/>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <input type="submit" value="Create Category" class="btn btn-success center" />
                </div>
            </div>

        </form>
    </div>
</div>

@stop