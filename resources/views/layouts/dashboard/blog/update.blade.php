@extends('layouts.dashboard.master')
@push('css')
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'Update Blog')

@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Settings</li>
        <li class="breadcrumb-item">Blog</li>
        <li class="breadcrumb-item">Update</li>
    @endcomponent
    <div class="container w-50">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="pb-2">Update Blog</h3>
                        <form action="{{ route('blog.update', ['id' => $blog->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="author" :value="__('Author Name')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="author" type="text"
                                        placeholder="Enter your author here..." value="{{ $blog->author }}"
                                        name="author" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="title" :value="__('Title')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="title" type="text"
                                        placeholder="Enter your title here..." value="{{ $blog->title }}" name="title" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="image" :value="__('Image')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="image" type="file" name="image" />
                                    @if ($blog->image)
                                        <img class="pt-4" src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image"
                                            width="25%">
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="description" :value="__('Description')" />
                                    <span class="text-danger">(*)</span>
                                    <textarea class="form-control" id="description" placeholder="Enter your description here..." name="description"
                                        required="">{!! $blog->description !!}</textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="tags" :value="__('Tags')" />
                                    <input class="form-control" id="tags" name="tags"
                                        placeholder="Enter tags here..." value="{{ old('tags', $blog->tags) }}" />
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <x-input-label class="form-label" for="link_one" :value="__('Link')" />
                                    <x-text-input class="form-control" placeholder="https://..." id="link_one"
                                        type="url" name="link_one" value="{{ $blog->link_one }}" />
                                </div>
                                <div class="col-sm-6">
                                    <x-input-label class="form-label" for="link_two" :value="__('Link')" />
                                    <x-text-input class="form-control" placeholder="https://..." id="link_two"
                                        type="url" name="link_two" value="{{ $blog->link_two }}" />
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        //FroalaEditor
        var editor = new FroalaEditor('#description', {
            pluginsEnable: ['insertUnorderedList', 'fullscreen', 'bold', 'italic', 'underline', 'strikeThrough',
                'subscript', 'superscript', 'fontFamily', 'fontSize', 'color', 'align', 'outdent', 'indent',
                'quote', 'insertLink',
                'insertImage', 'insertTable', 'insertHR', 'undo', 'redo'
            ],
            height: '70px',
        });

        // Initialize Tagify on the input field with ID "tags"
        var input = document.getElementById('tags');
        new Tagify(input);
    </script>
@endpush
