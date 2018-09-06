@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-body">
			@if(count($posts) > 0)
            <table class="table table-hover">
                <thead>
                    <th>Featured Image</th>
                    <th>Post Title</th>
                    <!-- <th>Edit Post</th> -->
                    <th>Restore Post</th>
                    <th>Destroy Post</th>

                </thead>

                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{ $post->featured_image }}" height="100" width="100" class="img-thumbnail" alt="No Image Found"></td>

                            <td>{{ $post->title }}</td>

                            <!-- <td>
                                <a href="{{ route('category.edit', ['id' => $post->id]) }}" class="btn btn-primary btn-sm">
                                    <span class="">Edit</span>
                                </a>
                            </td> -->

                            <td>
                                <a href="{{ route('post.restore', ['id' => $post->id])}}" class="btn btn-success btn-sm">
                                    <span class="">Restore Post</span>
                                </a>
                            </td>

                            <td>
                                <a href="{{ route('post.perm_delete', ['id' => $post->id])}}" class="btn btn-danger btn-sm">
                                    <span class="">Delete Post</span>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>


            
			@else
				<h2 class="text-center">No Deleted Posts</h2>
			@endif
        </div>
    </div>
@endsection