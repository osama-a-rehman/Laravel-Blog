@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Edit Post: <span style="font-weight: bold">{{ $post->title }}</span></div>

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
        <form action="{{ route('post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" value="{{ $post->title }}" name="title" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="featured_image">Featured Image</label>
                <input type="file" name="featured_image" class="form-control" />
            </div>

            <div class="form-group">
                <label for="category">Select a Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        @if($category->id == $post->category_id)
                            <option selected="selected" value="{{ $category->id }}">{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        
                    @endforeach
                </select>
            </div>

            @foreach($tags as $tag)
                <div class="checkbox">
                    <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                
                @foreach ($post->tags as $t)
                    @if($t->id == $tag->id)
                        checked
                    @endif
                @endforeach
                />{{ $tag->tag }}</label>
                </div>
            @endforeach


            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" name="content" class="form-control" rows="10">{{ $post->content }}</textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <input type="submit" value="Edit Post" class="btn btn-success center" />
                </div>
            </div>

        </form>
    </div>
</div>

@stop