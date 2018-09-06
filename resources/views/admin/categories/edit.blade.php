@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Edit the Category; <span style="font-weight: bold;"> {{ $category->name}}</span></div>

    @include('admin.includes.errors')

    <div class="panel-body">
        <form action="{{ route('category.update', ['id' => $category->id]) }}" method="post">

            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control"/>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <input type="submit" value="Edit Category" class="btn btn-success center" />
                </div>
            </div>

        </form>
    </div>
</div>

@stop