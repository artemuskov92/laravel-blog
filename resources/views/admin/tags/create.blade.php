@extends('admin.layout')
@section('content')
    <x-admin.container>
        <x-admin.card>
            <x-admin.card-header> {{ __('Create tag') }}</x-card-header>
                <x-admin.card-body>
                    <x-admin.form method="POST" action="{{ route('tags.store') }}">
                        @csrf
                        <x-admin.validate-errors />

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('tag name') }}</x-admin.label>
                            <x-admin.input name='tag_name' placeholder="Enter the tag name" />
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <a href="{{ route('tags.index') }}"
                                class="btn btn-secondary  mb-4 col-md-2 col-lg-2">{{ __('Back') }}</a>
                            <x-admin.button>{{ __('Create tag') }}</x-admin.button>
                        </x-admin.input-item>
                        
                    </x-admin.form>
                </x-admin.card-body>
        </x-admin.card>
    </x-admin.container>
@endsection
