@extends('layouts.dashboard.master')
@push('css')
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'Update Employee')

@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Settings</li>
        <li class="breadcrumb-item">Employee</li>
        <li class="breadcrumb-item">Update</li>
    @endcomponent
    <div class="container w-50">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Update Media</h3>
                        <form action="{{ route('media.update', ['id' => $media->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="title" :value="__('Title')" />
                                    <x-text-input class="form-control" id="title" type="text"
                                        value="{{ $media->title }}" name="title" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="newspaper_name" :value="__('Newspaper Name')" />
                                    <x-text-input class="form-control" id="newspaper_name" type="text"
                                        value="{{ $media->newspaper_name }}" name="newspaper_name" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="newspaper_url" :value="__('Newspaper URL')" />
                                    <x-text-input class="form-control" id="newspaper_url" type="url"
                                        value="{{ $media->newspaper_url }}" name="newspaper_url" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="newspaper_title" :value="__('Newspaper Title')" />
                                    <x-text-input class="form-control" id="newspaper_title" type="text"
                                        value="{{ $media->newspaper_title }}" name="newspaper_title" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="newspaper_description" :value="__('Newspaper Description')" />
                                    <textarea class="form-control" id="newspaper_description" name="newspaper_description">{!! $media->newspaper_description !!}</textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="image" :value="__('Image')" />
                                    <x-text-input class="form-control" id="image" type="file" name="image" />
                                    @if ($media->image)
                                        <img class="mt-4 shadow bg-body rounded"
                                            src="{{ asset('storage/' . $media->image) }}" alt="Media Image" width="30%">
                                    @endif
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
        var editor = new FroalaEditor('#newspaper_description', {
            pluginsEnable: ['insertUnorderedList', 'fullscreen', 'bold', 'italic', 'underline', 'strikeThrough',
                'subscript', 'superscript', 'fontFamily', 'fontSize', 'color', 'align', 'outdent', 'indent',
                'quote', 'insertLink',
                'insertImage', 'insertTable', 'insertHR', 'undo', 'redo'
            ],
            height: '100px',
        });
    </script>
@endpush
