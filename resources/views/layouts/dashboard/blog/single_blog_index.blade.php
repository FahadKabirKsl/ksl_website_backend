@extends('layouts.dashboard.master')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatable-extension.css') }}">
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'Single Blog')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Blog</li>
        <li class="breadcrumb-item">
            {{ $blog->title }}
        </li>
    @endcomponent
    <div class="container w-75">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12">
                        <h5 class="mb-2">{{ $blog->title }}</h5>
                        <div class="social my-3 " style="float:right">
                            <a class="btn btn-outline-dark my-2" style="font-size: 12px" href="{{ $blog->link_one }}">
                                <i class="fa fa-facebook"></i> Share on Facebook</a>
                            <a class="btn btn-outline-dark" style="font-size: 12px" href="{{ $blog->link_two }}">
                                <i class="fa fa-twitter"></i> Share on Twitter</a>
                        </div>
                        <div class="my-4">
                            <i class="fa fa-user"></i><b class="fs-6">{{ ' ' . $blog->author }}</b>
                            <span class="d-block">
                                <i class="fa fa-calendar"></i>{{ ' ' . $blog->created_at->format('Y-m-d') }}
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="my-2">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="100%">
                                </div>
                                <div class="desc my-4">
                                    {!! $blog->description !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="my-2 mx-4">
                                    <p>Popular Tags:</p>
                                    @if ($blog->tags)
                                        @php
                                            $tags = json_decode($blog->tags);
                                        @endphp
                                        @if ($tags)
                                            @foreach ($tags as $tag)
                                                <button type="button" style="font-size:12px"
                                                    class="btn btn-outline-danger my-1">{{ $tag->value }}</button>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
