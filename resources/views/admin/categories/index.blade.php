@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-body">
			@if(count($categories) > 0)
            <table class="table table-hover">
                <thead>
                    <th>Category Name</th>
                    <th>Edit Category</th>
                    <th>Delete Category</th>
                </thead>

                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>

                            <td>
                                <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-primary btn-sm">
                                    <span class="">Edit</span>
                                </a>
                            </td>

                            <td>
                                <a class="btn btn-danger btn-sm" data-id="{{ $category->id }}" data-name="{{ $category->name}}" data-toggle="modal" data-target="#deleteModal">
                                <span class="">Delete</span>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Category: <span id ="modal_delete_category_title" style="font-weight: bold;"></span></h5>
      </div>
      <div class="modal-body">
        Do you really want to delete this Category ?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-secondary" data-dismiss="modal">No</a>
        <a id="modal_delete_category_route" type="button" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>

			@else
				<h2 class="text-center">No Categories</h2>
			@endif
        </div>
    </div>
@endsection