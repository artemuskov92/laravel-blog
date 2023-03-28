@extends('admin.layout')
@section('content')
    <x-admin.container>
        <x-admin.card>
            <x-admin.card-header> {{ __('Tags') }}</x-card-header>
                <x-admin.button-link href="{{ route('tags.create') }}">
                    {{ __('Add tags') }}
                    </x-admin-button-link>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th> {{ __('Tag name') }}</th>
                                    <th> {{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>{{ $tag->id }}</strong>
                                        </td>
                                        <td>{{ __($tag->tag_name) }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item"
                                                        href="{{ route('tags.edit', $tag->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <x-admin.form action="{{ route('tags.destroy', $tag->id) }}"
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        </x-admin.card>
    </x-admin.container>
@endsection
