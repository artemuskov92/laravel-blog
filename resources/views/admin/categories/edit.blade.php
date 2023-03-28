@extends('admin.layout')
@section('content')
    <x-admin.container>
        <x-admin.card>
            <x-admin.card-header> {{ __('Edit category') }}</x-card-header>
                <x-admin.card-body>
                    <x-admin.form method="POST" action="{{ route('categories.update', $category->id) }}">
                        @method('PUT')
                        @csrf
                        <x-admin.validate-errors />

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Category name') }}</x-admin.label>
                            <x-admin.input placeholder="Enter the name of category" name="name" value="{{ $category->name }}" />
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <select name="parent_id" id="" class="form-control">
                                <option value="0">
                                    -- no parrents --
                                </option>
                                @include('admin.includes.categories')
                            </select>
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <a href="{{ route('categories.index') }}"
                                class="btn btn-secondary  mb-4 col-md-2 col-lg-2">{{ __('Back') }}</a>
                            <x-admin.button>{{ __('Edit category') }}</x-admin.button>
                        </x-admin.input-item>
                        
                    </x-admin.form>
                </x-admin.card-body>
        </x-admin.card>
    </x-admin.container>
@endsection
