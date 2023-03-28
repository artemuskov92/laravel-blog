@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            @forelse ($comments as $comment)
                <div class="col-md-6 col-lg-4">
                    <h6 class="mt-2 text-muted">{{ $comment->user->name }}</h6>
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="card-text">
                                {{ $comment->text }}
                            </p>
                        </div>
                    </div>
                    <a class="btn btn-primary" href="{{ route('comments.toggle', $comment->id) }}">
                        @if ($comment->status == 0)
                            Allow
                        @else
                            DisAllow
                        @endif
                    </a>
                    <x-admin.form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="bx bx-trash me-1"></i>
                            Delete</button>
                    </x-admin.form>
                </div>
                @empty
                    <h1>Comments not found</h1>
            @endforelse
        </div>
    </div>
@endsection
