@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            Tags
        </div>

        <div class="panel-body">
			@if(count($tags) > 0)
            <table class="table table-hover">
                <thead>
                    <th>Tag Name</th>
                    <th>Edit Post</th>
                    <th>Delete Post</th>
                </thead>

                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->tag }}</td>

                            <td>
                                <a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-primary btn-sm">
                                    <span class="">Edit</span>
                                </a>
                            </td>

                            <td>
                                <a href=" {{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-danger btn-sm">
                                    <span class="">Delete</span>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
			@else
				<h2 class="text-center">No Tags</h2>
			@endif
        </div>
    </div>
@endsection