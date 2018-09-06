<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    <style>
        textarea{
            resize: none;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                @if(Auth::check())
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{ route('posts') }}">Posts</a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="{{ route('post.create') }}">Create New Post</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{ route('posts.deleted') }}">Deleted Posts</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{ route('categories') }}">Categories</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{ route('category.create') }}">Create New Category</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{ route('tags') }}">Tags</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{ route('tag.create') }}">Create New Tag</a>
                        </li>
                    </ul>
                </div>
                @endif
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">@yield('content')</div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src=" {{ asset('js/toastr.min.js') }}"></script> 
    <script>
        $("#deleteModal").on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);
            var delete_category_id = button.data('id');
            var delete_category_name = button.data('name');

            var modal = $(this);

            var url = '{{ route("category.delete", ":category_id") }}';
            url = url.replace(':category_id', delete_category_id);

            modal.find("#modal_delete_category_title").text(delete_category_name);
            modal.find("#modal_delete_category_route").attr("href", url);
        });

        $("#deletePostModal").on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);
            var delete_post_id = button.data('id');
            var delete_post_title = button.data('title');

            var modal = $(this);

            var url = '{{ route("post.delete", ":post_id") }}';
            url = url.replace(':post_id', delete_post_id);

            modal.find("#modal_delete_post_title").text(delete_post_title);
            modal.find("#modal_delete_post_route").attr("href", url);
        });
    </script>

    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}", {timeOut: 2000});
        @elseif(Session::has('info'))
            toastr.info("{{ Session::get('info') }}", {timeOut: 2000});   
        @endif
    </script>
</body>
</html>
