@extends('layouts.dashboard.master')
@push('css')
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'Create Booth')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Booth</li>
        <li class="breadcrumb-item">Create</li>
    @endcomponent
    <div class="container w-50">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('booth.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="booth_name" :value="__('Booth Name')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="booth_name" type="text"
                                        placeholder="Enter your booth name here..." required="" name="booth_name" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="booth_address" :value="__('Booth Address')" />
                                    <span class="text-danger">(*)</span>
                                    <textarea class="form-control" id="booth_address" placeholder="Enter your booth address here..." required=""
                                        name="booth_address">
                                    </textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="booth_helpline" :value="__('Booth Helpline')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="booth_helpline" type="tel"
                                        placeholder="Enter your booth helpline here..." required="" name="booth_helpline" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="booth_email" :value="__('Booth Email')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="booth_email" type="email"
                                        placeholder="Enter your booth email here..." required="" name="booth_email" />
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
