@extends('admin.layout')
@section('content')
    <x-admin.container>
        <x-admin.card>
            <x-admin.card-header> {{ __('Category') }}</x-card-header>
                <x-admin.button-link href="{{ route('categories.create') }}">
                    {{ __('Add category') }}
                    </x-admin-button-link>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th> {{ __('Name of Category') }}</th>
                                    <th> {{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($categories as $category)
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>{{ $category->id }}</strong>
                                        </td>
                                        <td>{{ __($category->name) }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item"
                                                        href="{{ route('categories.edit', $category->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <x-admin.form action="{{ route('categories.destroy', $category->id) }}"
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
                                            <h5 class="text-center">{{ __('Category not found') }}</h5>
                                        </td>
                                    </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
    </x-admin.card>
</x-admin.container>
@endsection
