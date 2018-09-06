@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Edit Tag:  <span style="font-weight: bold;"> {{ $tag->name}}</span></div>

    @include('admin.includes.errors')

    <div class="panel-body">
        <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="post">

            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="name">Tag Name</label>
                <input type="text" name="tag" value="{{ $tag->tag }}" class="form-control"/>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <input type="submit" value="Edit Tag" class="btn btn-success center" />
                </div>
            </div>
        </form>
    </div>
</div>

@stop