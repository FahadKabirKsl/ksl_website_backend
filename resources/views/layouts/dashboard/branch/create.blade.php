@extends('layouts.dashboard.master')
@push('css')
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'Create Branch')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Branch</li>
        <li class="breadcrumb-item">Create</li>
    @endcomponent
    <div class="container w-50">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('branch.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="branch_name" :value="__('Branch Name')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="branch_name" type="text"
                                        placeholder="Enter your branch name here..." required="" name="branch_name" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="branch_address" :value="__('Branch Address')" />
                                    <span class="text-danger">(*)</span>
                                    <textarea class="form-control" id="branch_address" placeholder="Enter your branch address here..." required=""
                                        name="branch_address">
                                    </textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="branch_helpline_1" :value="__('Branch Helpline 1')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="branch_helpline_1" type="tel"
                                        placeholder="Enter your branch helpline 1 is here..." required="" name="branch_helpline_1" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="branch_helpline_2" :value="__('Branch Helpline 2')" />
                                    <x-text-input class="form-control" id="branch_helpline_2" type="tel"
                                        placeholder="Enter your branch helpline 2 is here..." name="branch_helpline_2" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="branch_email" :value="__('Branch Email')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="branch_email" type="email"
                                        placeholder="Enter your branch email here..." required="" name="branch_email" />
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
