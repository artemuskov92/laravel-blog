@extends('admin.layout')
@section('content')
    <x-admin.container>
        <x-admin.card>
            <x-admin.card-header> {{ __('Users') }}</x-card-header>
                <x-admin.button-link href="{{ route('users.create') }}">
                    {{ __('Add user') }}
                    </x-admin-button-link>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th> {{ __('User name') }}</th>
                                    <th> {{ __('User email') }}</th>
                                    <th> {{ __('User avatar') }}</th>
                                    <th> {{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($users as $user)
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>{{ $user->id }}</strong>
                                        </td>
                                        <td>{{ __($user->name) }}</td>
                                        <td>{{ __($user->email) }}</td>
                                        <td><img src="{{$user->getImage()}}" class="w-px-40 h-auto rounded-circle" alt="avatar"></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item"
                                                        href="{{ route('users.edit', $user->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <x-admin.form action="{{ route('users.destroy', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item"><i class="bx bx-trash me-1"></i>
                                                            Delete</button>
                                                    </x-admin.form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>
                                            <h5 class="text-center">{{ __('Users not found') }}</h5>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
        </x-admin.card>
    </x-admin.container>
@endsection
