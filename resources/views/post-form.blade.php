@extends('layouts.app')

@push('head_scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trix@1.3.1/dist/trix.css">
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $post ? __('Edit Post') : __('New Post') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('post.save', ['id' => $post ? $post->id : null]) }}">
                            @csrf
                            @error('post')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="text" name="title" id="title" placeholder="Title" required
                                    value="{{ $post ? $post->title : old('title') }}"
                                    class="form-control @error('title') is-invalid @enderror" />
                                @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">{{ __('Content') }}</label>
                                @error('content')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <input id="content" type="hidden" name="content"
                                    value="{{ $post ? $post->content : old('content') }}">
                                <trix-editor input="content" class="m-2"></trix-editor>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/trix@1.3.1/dist/trix.js"></script>
@endsection
