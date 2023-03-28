@extends('admin.layout')
@section('content')
    <x-admin.container>
        <x-admin.card>
            <x-admin.card-header> {{ __('Create post') }}</x-card-header>
                <x-admin.card-body>
                    <x-admin.form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <x-admin.validate-errors />

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Post  title') }}</x-admin.label>
                            <x-admin.input name='title' value="{{ old('title') }}" placeholder="Enter the title of post" />
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Post  iamge') }}</x-admin.label>
                            <x-admin.input name='image' type="file" placeholder="Enter the title of post" />
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Post category') }}</x-admin.label>
                            <select name="category[]" multiple class="form-control">
                                @include('admin.includes.categories')
                            </select>
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Post tags') }}</x-admin.label>
                            <select name="tags[]" multiple class="form-control">
                              @foreach ($tags as $tag)
                                  <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                              @endforeach
                            </select>
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Post date') }}</x-admin.label>
                            <x-admin.input name='date' type="date" value="{{ old('data') }}" />
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Is featured') }}</x-admin.label>
                            <input class="form-check-input" name="is_featured" type="checkbox">
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Is publish') }}</x-admin.label>
                            <input class="form-check-input" name="status" type="checkbox" >
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Content') }}</x-admin.label>
                            <textarea name="content" class="ckeditor form-control" placeholder="Content"></textarea>
                        </x-admin.input-item>


                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Description') }}</x-admin.label>
                            <textarea name="description" class="ckeditor form-control" placeholder="Content"></textarea>
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary  mb-4 col-md-2 col-lg-2">Back</a>
                            <x-admin.button>{{ __('Create post') }}</x-admin.button>
                        </x-admin.input-item>

                    </x-admin.form>
                </x-admin.card-body>
        </x-admin.card>
    </x-admin.container>
@endsection
