    @extends('layouts.dashboard.master')
    @push('css')
    @endpush
    @includeIf('layouts.dashboard.partials.css')
    @section('title', 'Create Employee')
    @section('content')
        @component('components.breadcrumb')
            @slot('bredcrumb_title')
                Home
            @endslot
            <li class="breadcrumb-item">Employee</li>
            <li class="breadcrumb-item">Create</li>
        @endcomponent
        <div class="container w-50">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('employee.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col">
                                        <x-input-label class="form-label" for="employee_type" :value="__('Employee Type')" />
                                        <span class="text-danger">(*)</span>
                                        <select class="form-control btn btn-outline-danger" id="employee_type"
                                            name="employee_type" required>
                                            <option class="select-placeholder" value="" disabled selected>Select
                                                Employee Type</option>
                                            <option value="director">Board of Directors</option>
                                            <option value="management_team">Management Team</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <x-input-label class="form-label" for="employee_name" :value="__('Employee Name')" />
                                        <span class="text-danger">(*)</span>
                                        <x-text-input class="form-control" id="employee_name" type="text"
                                            placeholder="Enter your employee name here..." required=""
                                            name="employee_name" />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <x-input-label class="form-label" for="employee_designation" :value="__('Employee Designation')" />
                                        <span class="text-danger">(*)</span>
                                        <x-text-input class="form-control" id="employee_designation" type="text"
                                            placeholder="Enter your employee designation here..." required=""
                                            name="employee_designation" />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <x-input-label class="form-label" for="employee_contact_number" :value="__('Employee Contact Number')" />
                                        <span class="text-danger">(*)</span>
                                        <x-text-input class="form-control" id="employee_contact_number" type="tel"
                                            placeholder="Enter your employee contact number here..." required=""
                                            name="employee_contact_number" />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <x-input-label class="form-label" for="employee_about" :value="__('Employee About')" />
                                        <span class="text-danger">(*)</span>
                                        <textarea class="form-control" id="employee_about" placeholder="Enter your employee about here..." name="employee_about"
                                            required=""></textarea>
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
            var editor = new FroalaEditor('#employee_about', {
                pluginsEnable: ['insertUnorderedList', 'fullscreen', 'bold', 'italic', 'underline', 'strikeThrough',
                    'subscript', 'superscript', 'fontFamily', 'fontSize', 'color', 'align', 'outdent', 'indent',
                    'quote', 'insertLink',
                    'insertImage', 'insertTable', 'insertHR', 'undo', 'redo'
                ],
                height: '100px',
            });
        </script>
    @endpush
