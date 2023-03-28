@extends('pages.layout')
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <article class="post">
                        @if (Session::has('status'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
                        @endif
                        <div class="post-thumb">
                            <a href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->getImage() }}"
                                    alt=""></a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6>
                                    @foreach ($post->categories as $category)
                                        <a href="{{ route('category.show', $category->slug) }}"> {{ $category['name'] }}</a>
                                    @endforeach
                                </h6>

                                <h1 class="entry-title"><a
                                        href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h1>
                            </header>
                            <div class="entry-content">
                                {!! $post->content !!}
                            </div>
                            <div class="decoration">
                                @foreach ($post->tags as $tag)
                                    <a href="{{ route('tag.show', $tag->slug) }}"
                                        class="btn btn-default">{{ $tag['tag_name'] }}</a>
                                @endforeach
                            </div>

                            <div class="social-share">
                                <span class="social-share-title pull-left text-capitalize">By {{ $post->user->name }} On
                                    {{ $post->date }}
                                </span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <div class="top-comment">
                        <!--top comment-->
                        <img src="{{ $post->user->getImage() }}" width="50" class="pull-left img-circle"
                            alt="">
                        <h4 class="text-capitalize">{{ $post->user->name }}</h4>

                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy hello ro mod tempor
                            invidunt ut labore et dolore magna aliquyam erat.</p>
                    </div>
                    <!--top comment end-->
                    <div class="row">
                        <!--blog next previous-->
                        <div class="col-md-6">
                            @if ($post->hasPrevious())
                                <div class="single-blog-box">
                                    <a href="{{ route('post.show', $post->getPrevious()->slug) }}">
                                        <img src="{{ $post->getPrevious()->getImage() }}" alt="">

                                        <div class="overlay">
                                            <div class="promo-text">
                                                <p><i class=" pull-left fa fa-angle-left"></i></p>
                                                <h5>{{ $post->getPrevious()->title }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if ($post->hasNext())
                                <div class="single-blog-box">
                                    <a href="{{ route('post.show', $post->getNext()->slug) }}">
                                        <img src="{{ $post->getNext()->getImage() }}" alt="">

                                        <div class="overlay">
                                            <div class="promo-text">
                                                <p><i class=" pull-right fa fa-angle-right"></i></p>
                                                <h5>{{ $post->getNext()->title }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!--blog next previous end-->
                    <div class="related-post-carousel">
                        <!--related post carousel-->
                        <div class="related-heading">
                            <h4>You might also like</h4>
                        </div>
                        <div class="items">
                            @foreach ($post->related() as $item)
                                <div class="single-item" style="margin-left: 20px">
                                    <a href="{{ route('post.show', $item->slug) }}">
                                        <img src="{{ $item->getImage() }}" alt="">
                                        <p>{{ $item->title }}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--related post carousel-->
                    @foreach ($post->commnets()->where('status',1)->get() as $comment)
                        <div class="bottom-comment">
                            <!--bottom comment-->
                            <div class="comment-img">
                                <img class="img-circle" src="{{ $comment->user->getImage() }}" alt="">
                            </div>

                            <div class="comment-text">
                                <h5>{{ $comment->user->name }}</h5>

                                <p class="comment-date">
                                    {{ $comment->created_at }}
                                </p>


                                <p class="para">{{ $comment->text }}</p>
                            </div>
                        </div>
                        <!-- end bottom comment-->
                    @endforeach


                    @if (Auth::check())
                        <div class="leave-comment">
                            <!--leave comment-->
                            <h4>Leave a reply</h4>


                            <form class="form-horizontal contact-form" role="form" method="post"
                                action="{{ route('comment.store') }}">
                                @csrf
                                <input type="text" hidden name="post_id" value="{{ $post->id }}">
                                <x-admin.validate-errors />
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="6" name="text" placeholder="Write Massage"></textarea>
                                    </div>
                                </div>
                                <button class="btn send-btn">Post Comment</button>
                            </form>
                        </div>
                    @endif
                    <!--end leave comment-->
                </div>
                @include('pages.includes.sidebar')
            </div>
        </div>
    </div>
@endsection
