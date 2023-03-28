@extends('pages.layout')
@section('content')
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="leave-comment mr0"><!--leave comment-->
                    
                    <h3 class="text-uppercase">My profile</h3>
                    <br>
                    <img src="{{Auth::user()->getImage()}}" alt="" class="profile-image">
                    <form class="form-horizontal contact-form" role="form" method="post" enctype="multipart/form-data" action="{{route('profile.update')}}">
                        @csrf
                        @method('PUT')
                        <x-admin.validate-errors />
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Name" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="password" name="password"
                                       placeholder="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
								<input type="file" class="form-control" id="image" name="avatar">	
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn send-btn">Update</button>

                    </form>
                </div><!--end leave comment-->
            </div>
            @include('pages.includes.sidebar')
        </div>
    </div>
</div>
@endsection