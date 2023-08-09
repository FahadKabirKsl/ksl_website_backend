@extends('layouts.dashboard.master')
@push('css')
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'Create Partner With Us')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Partner With Us</li>
        <li class="breadcrumb-item">Create</li>
    @endcomponent
    <div class="container w-75">
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('partner.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="name" :value="__('Name')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="name" type="text"
                                        placeholder="Enter your name here..." required="" name="name" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="email" :value="__('Email')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="email" type="email"
                                        placeholder="Enter email is here..." required="" name="email" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="phoneNumber" :value="__('Phone Number')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="phoneNumber" type="tel"
                                        placeholder="Enter phone number name..." required="" name="phoneNumber" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="reason" :value="__('Partner with Us')" />
                                    <span class="text-danger">(*)</span>
                                    <textarea class="form-control" id="reason" required="" placeholder="Why do you want to Partner with us ?"
                                        name="reason"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-flex">
                                    <div class="row-md-3 mb-3">
                                        <x-input-label class="form-label" for="division" :value="__('Select division')" />
                                        <span class="text-danger">(*)</span>
                                        <select name="division_id" id="division" class="form-select" required>
                                            <option value="">Select Division</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">
                                                    {{ $division->name }}-{{ $division->bn_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row-md-3 mb-3 ms-5">
                                        <x-input-label class="form-label" for="district" :value="__('Select district')" />
                                        <span class="text-danger">(*)</span>
                                        <select name="district_id" id="district" class="form-select" required>
                                            <option value="">Select Upazila</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}">
                                                    {{ $district->name }}-{{ $district->bn_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex mt-3">
                                    <div class="row-md-3 mb-3">
                                        <x-input-label class="form-label" for="upazila" :value="__('Select Thana/Upazila')" />
                                        <span class="text-danger">(*)</span>
                                        <select name="upazila_id" id="upazila" class="form-select" required>
                                            <option value="">Select Thana/Upazila</option>
                                            @foreach ($upazilas as $upazila)
                                                <option value="{{ $upazila->id }}">
                                                    {{ $upazila->name }}-{{ $upazila->bn_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row-md-3 mb-3 ms-2">
                                        <x-input-label class="form-label" for="union" :value="__('Select Union')" />
                                        <span class="text-danger">(*)</span>
                                        <select name="union_id" id="union" class="form-select" required>
                                            <option value="">Select Union</option>
                                            @foreach ($unions as $union)
                                                <option value="{{ $union->id }}">
                                                    {{ $union->name }}-{{ $union->bn_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
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
