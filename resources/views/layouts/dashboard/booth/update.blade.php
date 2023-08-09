@extends('layouts.dashboard.master')
@push('css')
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'Update Booth')

@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Settings</li>
        <li class="breadcrumb-item">Digital Booth</li>
        <li class="breadcrumb-item">Update</li>
    @endcomponent
    <div class="container w-50">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Update Digital Booth</h3>
                        <form action="{{ route('booth.update', ['id' => $booth->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="booth_name" :value="__('Digital Booth Name')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="booth_name" type="text"
                                        value="{{ $booth->booth_name }}" required="" name="booth_name" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="booth_address" :value="__('Digital Booth Address')" />
                                    <span class="text-danger">(*)</span>
                                    <textarea class="form-control" id="booth_address" type="text" required="" name="booth_address">{{ $booth->booth_address }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="booth_helpline" :value="__('Digital Booth HelpLine')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="booth_helpline" type="tel"
                                        value="{{ $booth->booth_helpline }}" required="" name="booth_helpline" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="booth_email" :value="__('Digital Booth Email')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="booth_email" type="email"
                                        value="{{ $booth->booth_email }}" required="" name="booth_email" />
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
