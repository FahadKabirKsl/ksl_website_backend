    @extends('layouts.dashboard.master')
    @push('css')
    @endpush
    @includeIf('layouts.dashboard.partials.css')
    @section('title', 'Create Media')
    @section('content')
        @component('components.breadcrumb')
            @slot('bredcrumb_title')
                Home
            @endslot
            <li class="breadcrumb-item">Media</li>
            <li class="breadcrumb-item">Create</li>
        @endcomponent
        <div class="container w-50">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('media.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col">
                                        <x-input-label class="form-label" for="title" :value="__('Title')" />
                                        <span class="text-danger">(*)</span>
                                        <x-text-input class="form-control" id="title" type="text"
                                            placeholder="Enter your title here..." required="" name="title" />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <x-input-label class="form-label" for="newspaper_name" :value="__('Newspaper Name')" />
                                        <span class="text-danger">(*)</span>
                                        <x-text-input class="form-control" id="newspaper_name" type="text"
                                            placeholder="Enter your newspaper name here..." required=""
                                            name="newspaper_name" />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <x-input-label class="form-label" for="newspaper_url" :value="__('Newspaper URL')" />
                                        <span class="text-danger">(*)</span>
                                        <x-text-input class="form-control" id="newspaper_url" type="url"
                                            placeholder="Enter your newspaper_url here..." required=""
                                            name="newspaper_url" />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <x-input-label class="form-label" for="newspaper_title" :value="__('Newspaper Title')" />
                                        <span class="text-danger">(*)</span>
                                        <x-text-input class="form-control" id="newspaper_title" type="text"
                                            placeholder="Enter your newspaper title here..." required=""
                                            name="newspaper_title" />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <x-input-label class="form-label" for="newspaper_description" :value="__('Newspaper Description')" />
                                        <span class="text-danger">(*)</span>
                                        <textarea class="form-control" id="newspaper_description" placeholder="Enter your employee about here..."
                                            name="newspaper_description" required=""></textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <x-input-label class="form-label" for="image" :value="__('Image')" />
                                        <span class="text-danger">(*)</span>
                                        <x-text-input class="form-control" id="image" type="file" required=""
                                            name="image" />
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <x-primary-button href="#" class="btn btn-primary">Save</x-primary-button>
                                        <x-secondary-button href="#" class="btn btn-secondary">Cancel
                                        </x-secondary-button>
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
