@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (isset($posts))
                <h1>{{ __('My Posts') }}</h1>
                    @forelse ($posts ?? '' as $post)
                        <div class="card m-2">
                            <div class="card-header">{{ $post->title ?? '' }}</div>

                            <div class="card-body">
                                {!! $post->content !!}
                            </div>

                            <div class="card-footer">
                                {{ __('By ' . $post->user->name) }} -
                                <a href="{{ route('post.form', ['id' => $post->id]) }}">{{ __('View') }}</a>
                                @can('manage', $post)
                                    - <a
                                        href="{{ route('post.access', ['id' => $post->id, 'type' => 'view']) }}">{{ __('Change view access...') }}</a>
                                    -
                                    <a
                                        href="{{ route('post.access', ['id' => $post->id, 'type' => 'edit']) }}">{{ __('Change edit access...') }}</a>
                                @endcan
                            </div>
                        </div>
                    @empty
                        <div class="card">
                            <div class="card-body">
                                {{ __('You have no posts') }}
                            </div>
                        </div>
                    @endforelse
                @endif
            </div>
        </div>
    </div>
@endsection
