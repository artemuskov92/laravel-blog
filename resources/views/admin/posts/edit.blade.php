@extends('admin.layout')
@section('content')
    <x-admin.container>
        <x-admin.card>
            <x-admin.card-header> {{ __('Edit post') }}</x-card-header>
                <x-admin.card-body>
                    <x-admin.form method="POST" action="{{ route('posts.update', $post->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-admin.validate-errors />

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Post  title') }}</x-admin.label>
                            <x-admin.input name='title' value="{{ $post->title }}" placeholder="Enter the title of post" />
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Post  iamge') }}</x-admin.label>
                            <img src="{{$post->getImage()}}" class="mb-4 w-px-300" alt="image">
                            <x-admin.input name='image' type="file" placeholder="Enter the title of post" />
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Post category') }}</x-admin.label>
                            <select name="category[]" multiple class="form-control">
                                @include('admin.includes.edit-categories')
                            </select>
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Post tags') }}</x-admin.label>
                            <select name="tags[]" multiple class="form-control">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" @if ($post->tags->contains('id', $tag->id)) selected @endif>
                                        {{ $tag->tag_name }}</option>
                                @endforeach
                            </select>
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Post date') }}</x-admin.label>
                            <x-admin.input name='date' type="date" value="{{ $post->date }}" />
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Is featured') }}</x-admin.label>
                            <input class="form-check-input" @if($post->is_featured) checked @endif value="{{$post->is_featured}}" name="is_featured" type="checkbox">
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Is publish') }}</x-admin.label>
                            <input class="form-check-input" @if($post->status) checked @endif value="{{$post->status}}" name="status" type="checkbox">
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Description') }}</x-admin.label>
                            <textarea name="description" class="ckeditor form-control" placeholder="Content">{{$post->description}}</textarea>
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <x-admin.label class="form-label">{{ __('Content') }}</x-admin.label>
                            <textarea name="content"  class="ckeditor form-control" placeholder="Content">{{$post->content}}</textarea>
                        </x-admin.input-item>

                        <x-admin.input-item>
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary  mb-4 col-md-2 col-lg-2">Back</a>
                            <x-admin.button>{{ __('Edit post') }}</x-admin.button>
                        </x-admin.input-item>

                    </x-admin.form>
                </x-admin.card-body>
        </x-admin.card>
    </x-admin.container>
@endsection
