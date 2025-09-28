@extends('layouts.app')

@section('title', $page->meta_title ?: $page->title)
@section('meta_description', $page->meta_description)

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm">
                @if($page->image)
                    <img src="{{ $page->image }}" class="card-img-top" alt="{{ $page->title }}">
                @endif
                <div class="card-body">
                    <h1 class="h3 mb-3">{{ $page->title }}</h1>
                    <div class="text-muted small mb-3">
                        @if($page->published_at)
                            เผยแพร่เมื่อ {{ $page->published_at->format('d/m/Y H:i') }}
                        @endif
                    </div>
                    <div class="content">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
