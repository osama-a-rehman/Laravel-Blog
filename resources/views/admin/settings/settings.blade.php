@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Edit Blog Settings</div>

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
        <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="site_name">Site Name</label>
                <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="email" name="contact_email" value="{{ $settings->contact_email }}" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="contact_no">Contact Number</label>
                <input type="text" name="contact_no" value="{{ $settings->contact_no }}" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" value="{{ $settings->address }}" class="form-control"/>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <input type="submit" value="Edit Settings" class="btn btn-success center" />
                </div>
            </div>

        </form>
    </div>
</div>

@stop