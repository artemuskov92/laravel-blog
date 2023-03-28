@extends('admin.layout')
@section('content')
    <x-admin.container>
        <x-admin.card>
            <x-admin.card-header> {{ __('Posts') }}</x-card-header>
                <x-admin.button-link href="{{ route('posts.create') }}">
                    {{ __('Create post') }}
                    </x-admin-button-link>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> {{ __('Post id') }}</th>
                                    <th> {{ __('Post title') }}</th>
                                    <th> {{ __('Post category') }}</th>
                                    <th> {{ __('Post tags') }}</th>
                                    <th> {{ __('Post image') }}</th>
                                    <th> {{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($posts as $post)
                                    <tr>
                                        <td><i class="fab fa-angular fa-    lg text-danger me-3"></i>
                                            <strong>{{ $post->id }}</strong>
                                        </td>
                                        <td>{{ __($post->title) }}</td>
                                        <td>
                                            @forelse ($post->categories as $category)
                                                {{ $category['name'] }}
                                                @empty
                                                    <p>Category not found</p>
                                            @endforelse
                                        </td>
                               
                                        <td>
                                            @forelse ($post->tags as $tag)
                                                {{ $tag['tag_name'] }}
                                                @empty
                                                    <p>Tags not found</p>
                                            @endforelse
                                        </td>
                                        <td><img src="{{ $post->getImage() }}" class="w-px-100 h-auto "
                                                alt="image post"></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <x-admin.form action="{{ route('posts.destroy', $post->id) }}"
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
                                            <h5 class="text-center">{{ __('Posts not found') }}</h5>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
        </x-admin.card>
    </x-admin.container>
@endsection
