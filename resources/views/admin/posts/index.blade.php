@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            Posts
        </div>

        <div class="panel-body">
			@if(count($posts) > 0)
            <table class="table table-hover">
                <thead>
                    <th>Featured Image</th>
                    <th>Post Title</th>
                    <th>Edit Post</th>
                    <th>Delete Post</th>
                </thead>

                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{ $post->featured_image }}" height="100" width="100" class="img-thumbnail" alt="No Image Found"></td>

                            <td>{{ $post->title }}</td>

                            <td>
                                <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-primary btn-sm">
                                    <span class="">Edit</span>
                                </a>
                            </td>

                            <td>
                                <a class="btn btn-danger btn-sm" data-id="{{ $post->id }}" data-title="{{ $post->title }}" data-toggle="modal" data-target="#deletePostModal">
                                <span class="">Delete</span>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>


<!-- Modal -->
<div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Post: <span id ="modal_delete_post_title" style="font-weight: bold;"></span></h5>
      </div>
      <div class="modal-body">
        Do you really want to delete this Post ?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-secondary" data-dismiss="modal">No</a>
        <a id="modal_delete_post_route" type="button" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>

			@else
				<h2 class="text-center">No Posts</h2>
			@endif
        </div>
    </div>
@endsection