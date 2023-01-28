<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>free classifieds in Nigeria</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/iziToast.js') }}"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('vendor.lara-izitoast.toast')
    <script src="https://cdn.tiny.cloud/1/m25py2yrw4tp76ri87ozm3ay2i78qwop82mcrytvzu4rjsio/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/m25py2yrw4tp76ri87ozm3ay2i78qwop82mcrytvzu4rjsio/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
    
</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-custom shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style = "color:#fff;">
                    {{ config('app.name', 'iyaba.ng') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    <a href="{{route('ads.create')}}" style = "color:#fff"><button class = "btn btn-primary"><h5>Post your ads</h5></button></a>                        
                    </ul>
                     <!-- Centre Side of Navbar-->
                    <ul class = "navbar-nav mc-auto">
                    <div class="search-container">
                    <form action="{{ url('/search') }}" type = "get">
                        <input type="search" placeholder="Search products..." name="query" required arial-label = "Search">@csrf
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    </div>
                    </ul>      
                   
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" style = "color:#fff;"><Button class = "btn btn-primary"><h5>{{ __('Login') }}</h5></Button></a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style = "color:#fff;"><Button class = "btn btn-primary"><h5>{{ __('Register') }}</h5></Button></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style = "color:#fff">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::check()&& Auth::user()->isadmin==1)
                                    <a class="dropdown-item" href="{{ url('auth') }}">{{ __('Dashboard') }}</a>
                                    @else
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                                    <a class="dropdown-item" href="{{ url('ads') }}">{{ __('Published Ads') }}</a>
                                    <a class="dropdown-item" href="{{ url('ads/create') }}">{{ __('Create Ads') }}</a> 
                                    <a class="dropdown-item" href="{{ url('saved-ad') }}">{{ __('Saved Ads') }}</a>
                                    <a class="dropdown-item" href="{{ url('messages') }}">{{ __('Messages') }}</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navbar-hover">
            <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover"
                    aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        <div class="collapse navbar-collapse" id="navbarHover">
            <ul class="container-fluid navbar-nav">
                @foreach($menus as $menuItem)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{route('category.show',[$menuItem->slug])}}"
                        data-toggle="dropdown_remove_dropdown_class_for_clickable_link" aria-haspopup="true"
                        aria-expanded="false">
                        {{$menuItem->name}}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($menuItem->subcategories as $subMenuItem)
                        <li>
                            <a class="dropdown-item dropdown-toggle" href="{{route('subcategory.show',[
                                    $menuItem->slug,$subMenuItem->slug
                                ])}}">
                            {{$subMenuItem->name}}
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($subMenuItem->childcategories as $childMenuItem)
                                <li>
                                    <a class="dropdown-item" href="{{route('childcategory.show',[
                                                                $menuItem->slug,
                                                                $subMenuItem->slug,
                                                                $childMenuItem->slug
                                                            ])}}">
                                    {{$childMenuItem->name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach    
            </ul>
        </div> 
        </nav>   
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
        <style>
        /* .navbar li a {
        color: white !important;
        } */
        .dropdown:hover>.dropdown-menu {
        display: block;
        }
        /* hover dropdown menus */
        @media only screen and (max-width: 991px) {
        .navbar-hover .show > .dropdown-toggle::after{
        transform: rotate(-90deg);
        }
        }
        @media only screen and (min-width: 492px) {

        .navbar-hover .collapse ul li{position:relative;}
        .navbar-hover .collapse ul li:hover> ul{display:block}
        .navbar-hover .collapse ul ul{position:absolute;top:100%;left:0;min-width:250px;display:none}
        .navbar-hover .collapse ul ul ul{position:absolute;top:0;left:100%;min-width:250px;display:none}
        .vertical-menu a {
            background-color: #fff;
            color: #000;
            display: block;
            padding: 12px;
            text-decoration: none;
        }
        .vertical-menu a:hover {
            background-color: #001f3f;
            color: #fff;
        }
        .vertical-menu a.active {
            background-color:#001f3fed;
            color:#fff;
        }
        #card a:hover{
            background-color:#001f3f;
            color:#fff;
        }
        .navbar-custom {
        background-color: #001f3f;
        }
</style>
</body>
</html>