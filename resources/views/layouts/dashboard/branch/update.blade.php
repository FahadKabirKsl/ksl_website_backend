@extends('layouts.dashboard.master')
@push('css')
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'Update Branch')

@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Branch</li>
        <li class="breadcrumb-item">Update</li>
    @endcomponent
    <div class="container w-50">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Update Branch</h3>
                        <form action="{{ route('branch.update', ['id' => $branch->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="branch_name" :value="__('Branch Name')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="branch_name" type="text"
                                        value="{{ $branch->branch_name }}" required="" name="branch_name" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="branch_address" :value="__('Branch Address')" />
                                    <span class="text-danger">(*)</span>
                                    <textarea class="form-control" id="branch_address" type="text" required="" name="branch_address">{{ $branch->branch_address }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="branch_helpline_1" :value="__('Branch Helpline 1')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="branch_helpline_1" type="tel"
                                        value="{{ $branch->branch_helpline_1 }}" required="" name="branch_helpline_1" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="branch_helpline_2" :value="__('Branch Helpline 2')" />
                                    <x-text-input class="form-control" id="branch_helpline_2" type="tel"
                                        value="{{ $branch->branch_helpline_2 }}" name="branch_helpline_2" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="branch_email" :value="__('Branch Email')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="branch_email" type="email"
                                        value="{{ $branch->branch_email }}" required="" name="branch_email" />
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
