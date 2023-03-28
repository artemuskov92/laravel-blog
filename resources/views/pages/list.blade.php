@extends('pages.layout')
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @forelse ($posts as $post)
                            <div class="col-md-6">
                                <article class="post post-grid">
                                    <div class="post-thumb">
                                        <a href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->getImage() }}"
                                                alt=""></a>

                                        <a href="{{ route('post.show', $post->slug) }}"
                                            class="post-thumb-overlay text-center">
                                            <div class="text-uppercase text-center">View Post</div>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <header class="entry-header text-center text-uppercase">
                                            <h6>
                                                @foreach ($post->categories as $category)
                                                    <a href="{{route('category.show', $category->slug)}}"> {{$category->name}}</a>
                                                @endforeach
                                            </h6>

                                            <h1 class="entry-title"><a href="{{route('post.show',$post->slug)}}">{{$post->title}}</a></h1>
                                        </header>
                                        <div class="entry-content">
                                            <p>{!!$post->description!!}
                                            </p>

                                            <div class="social-share">
                                                <span class="social-share-title pull-left text-capitalize">By Rubel On
                                                    {{$post->date}}</span>
                                            </div>
                                        </div>
                                    </div>

                                </article>
                            </div>
                            @empty
                                <h1>Posts not found</h1>
                        @endforelse

                    </div>
                    {{$posts->links()}}
                </div>
                @include('pages.includes.sidebar')
            </div>
        </div>
    </div>
@endsection
