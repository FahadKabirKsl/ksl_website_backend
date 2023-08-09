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
                        <h3>Update Employee</h3>
                        <form action="{{ route('employee.update', ['id' => $employee->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="employee_type" :value="__('Employee Type')" />
                                    <select class="form-control btn btn-outline-danger" id="employee_type"
                                        name="employee_type" required>
                                        <option class="select-placeholder" value="" disabled>Select Employee Type
                                        </option>
                                        <option value="director"
                                            {{ $employee->employee_type === 'director' ? 'selected' : '' }}>Director
                                        </option>
                                        <option value="management_team"
                                            {{ $employee->employee_type === 'management_team' ? 'selected' : '' }}>
                                            Management Team</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="employee_name" :value="__('Employee Name')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="employee_name" type="text"
                                        value="{{ $employee->employee_name }}" name="employee_name" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="employee_designation" :value="__('Employee Designation')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="employee_designation" type="text"
                                        value="{{ $employee->employee_designation }}" name="employee_designation" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="employee_contact_number" :value="__('Employee Contact Number')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="employee_contact_number" type="tel"
                                        value="{{ $employee->employee_contact_number }}" name="employee_contact_number" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="employee_about" :value="__('Employee About')" />
                                    <span class="text-danger">(*)</span>
                                    <textarea class="form-control" id="employee_about" name="employee_about">{!! $employee->employee_about !!}</textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="image" :value="__('Image')" />
                                    <x-text-input class="form-control" id="image" type="file" name="image" />
                                    @if ($employee->image)
                                        <img class="mt-4 shadow bg-body rounded"
                                            src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image"
                                            width="30%">
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
