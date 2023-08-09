@extends('layouts.dashboard.master')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatable-extension.css') }}">
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'List of Media')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Media</li>
        <li class="breadcrumb-item">List of Media</li>
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div>
                                @if (session()->has('create'))
                                    <div class="alert alert-success">
                                        {{ session('create') }}
                                    </div>
                                @endif
                                @if (session()->has('update'))
                                    <div class="alert alert-success">
                                        {{ session('update') }}
                                    </div>
                                @endif
                                @if (session()->has('delete'))
                                    <div class="alert alert-danger">
                                        {{ session('delete') }}
                                    </div>
                                @endif
                            </div>
                            <table class="table display" id="basic-1" style="font-size:12px">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Newspaper Name</th>
                                        <th>Newspaper URL</th>
                                        <th>Newspaper Title</th>
                                        <th>Newspaper Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medias as $media)
                                        <tr class="clickable-row">
                                            <td>{{ $media->title }}</td>
                                            <td>{{ $media->newspaper_name }}</td>
                                            <td>
                                                <div class="newspaper-url-container">
                                                    <a href="{{ $media->newspaper_url }}"
                                                        target="_blank">{{ $media->newspaper_url }}</a>
                                                </div>
                                            </td>
                                            <td>{{ $media->newspaper_title }}</td>
                                            <td>
                                                <div class="collapse-content" id="collapseContent{{ $media->id }}">
                                                    {!! $media->newspaper_description !!}
                                                </div>
                                                <div class="collapse-link pt-2"
                                                    onclick="toggleCollapse({{ $media->id }})">
                                                    <span id="collapseLinkText{{ $media->id }}">See More</span>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/' . $media->image) }}" alt="Media Image"
                                                    width="90">
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div>
                                                        <a href="{{ route('media.edit', ['id' => $media->id]) }}"
                                                            class="btn btn-outline-primary">Edit</a>
                                                    </div>
                                                    <div style="margin-left:5px">
                                                        <form action="{{ route('media.destroy', ['id' => $media->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $medias->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function toggleCollapse(id) {
            const contentDiv = document.getElementById(`collapseContent${id}`);
            const linkTextSpan = document.getElementById(`collapseLinkText${id}`);

            if (contentDiv.style.maxHeight) {
                // Collapse the content
                contentDiv.style.maxHeight = null;
                linkTextSpan.textContent = "See More";
            } else {
                // Expand the content
                contentDiv.style.maxHeight = contentDiv.scrollHeight + "px";
                linkTextSpan.textContent = "See Less";
            }
        }
    </script>
@endpush
