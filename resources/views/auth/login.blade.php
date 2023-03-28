@extends('pages.layout')
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="leave-comment mr0">
                        <h3 class="text-uppercase">Login</h3>
                        <br>
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <form class="form-horizontal contact-form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <x-admin.validate-errors />
                            <div class="form-group">
                                <div class="col-md-12">
                                    <x-text-input id="email" class="form-control" type="email" placeholder="Email"
                                        name="email" :value="old('email')" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <x-text-input id="password" class="form-control" placeholder="password" type="password"
                                        name="password" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <x-primary-button class="btn send-btn">
                                        {{ __('Login') }}
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
