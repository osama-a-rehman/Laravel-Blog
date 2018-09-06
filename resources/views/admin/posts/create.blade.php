@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Create a New Post</div>

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
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="featured_image">Featured Image</label>
                <input type="file" name="featured_image" class="form-control" />
            </div>

            <div class="form-group">
                <label for="category">Select a Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name  }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" name="content" class="form-control" rows="10"></textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <input type="submit" value="Store Post" class="btn btn-success center" />
                </div>
            </div>

        </form>
    </div>
</div>

@stop