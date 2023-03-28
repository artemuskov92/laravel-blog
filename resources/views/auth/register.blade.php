@extends('pages.layout')
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="leave-comment mr0">
                        <h3 class="text-uppercase">Register</h3>
                        <br>
                        <form class="form-horizontal contact-form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-12">
                                    <x-text-input id="name" placeholder="Name" class="form-control" type="text"
                                        name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <x-text-input id="email" class="form-control" type="email" placeholder="Email"
                                        name="email" :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <x-text-input id="password" class="form-control" placeholder="password" type="password"
                                        name="password" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <x-text-input id="password_confirmation" class="form-control"
                                        placeholder="confirm password" type="password" name="password_confirmation" required
                                        autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <a class="btn send-btn ml-2"
                                        href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                    <x-primary-button class="btn send-btn">
                                        {{ __('Register') }}
                                    </x-primary-button>
                                </div>
                            </div>
                           
                            
                        </form>
                    </div>
                    <!--end leave comment-->
                </div>
                @include('pages.includes.sidebar');
            </div>
        </div>
    </div>
@endsection
