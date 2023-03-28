@extends('admin.layout')
@section('content')
    <x-admin.container>
        <x-admin.card>
            <x-admin.card-header> {{ __('User edit') }}</x-card-header>
                <x-admin.card-body>
                    <x-admin.form method="POST" action="{{ route('users.update',$user->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <x-admin.validate-errors />

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('User name') }}</x-admin.label>
                            <x-admin.input name='name' value="{{$user->name}}" placeholder="Enter the user name" />
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('User email') }}</x-admin.label>
                            <x-admin.input name='email' value="{{$user->email}}" placeholder="Enter the user email" />
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('User password') }}</x-admin.label>
                            <x-admin.input name='password' placeholder="Enter the userpassword" />
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('User avar') }}</x-admin.label>
                            <x-admin.input type="file" name='avatar' />
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('User role') }}</x-admin.label>
                            <select name="role" class="form-control">
                                @foreach ($roles as $role)
                                    <option  value="{{$role->id}}">{{$role->display_name}}</option>
                                @endforeach
                            </select>
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <a href="{{ route('users.index') }}"
                                class="btn btn-secondary  mb-4 col-md-2 col-lg-2">Back</a>
                            <x-admin.button>{{ __('Edit user') }}</x-admin.button>
                        </x-admin.input-item>

                    </x-admin.form>
                </x-admin.card-body>
        </x-admin.card>
    </x-admin.container>
@endsection
