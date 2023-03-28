@extends('pages.layout')
@section('content')
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="leave-comment mr0"><!--leave comment-->
                    
                    <h3 class="text-uppercase">Welcome to you profile</h3>
                    <img src="{{Auth::user()->getImage()}}" alt="">
                    <h3 class="">Your name:{{ Auth::user()->name }}</h3>
                    <h3 class="">Your email: {{ Auth::user()->email }}</h3>
                    <a class="btn btn-subscribe mt-2" href="{{route('profile.edit')}}">
                        {{ __('Edit Profile') }}
                    </a>
    
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
    
                        <a class="btn btn-subscribe mt-2" href="{{route('logout')}}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </div><!--end leave comment-->
            </div>
            @include('pages.includes.sidebar')
        </div>
    </div>
</div>

@endsection
