@extends('layouts.dashboard.master')
@push('css')
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'Create IPO')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">IPO</li>
        <li class="breadcrumb-item">Create</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('ipo.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="company_name" :value="__('Company Name')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="company_name" type="text"
                                        placeholder="Enter your company name here..." required="" name="company_name" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="company_platform" :value="__('Company Platform')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="company_platform" type="text"
                                        placeholder="Enter company platform name..." required=""
                                        name="company_platform" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="founded" :value="__('Founded/Group')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="founded" type="text"
                                        placeholder="Enter founded name/group is here..." required="" name="founded" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="managing_director" :value="__('Managing Director')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="managing_director" type="text"
                                        placeholder="Enter managing director name..." required=""
                                        name="managing_director" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="parent_organization" :value="__('Parent Organization')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="parent_organization" type="text"
                                        placeholder="Enter parent organization name..." required=""
                                        name="parent_organization" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="minimum_invest" :value="__('Minimum Invest Amount')" />
                                    <span class="text-danger">(*)</span>
                                    <x-text-input class="form-control" id="minimum_invest" type="number"
                                        placeholder="Enter your minimum invest amount..." required=""
                                        name="minimum_invest" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="company_about" :value="__('Company About')" />
                                    <span class="text-danger">(*)</span>
                                    <textarea class="form-control" id="company_about" required="" name="company_about"></textarea>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="status" :value="__('Select IPO')" />
                                <span class="text-danger">(*)</span>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="#">Select IPO</option>
                                    <option value="upcoming_ipo">Upcoming IPO</option>
                                    <option value="closing_ipo">Closing IPO</option>
                                    <option value="listing_ipo">Listing IPO</option>
                                    <option value="ongoing_ipo">Ongoing IPO</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="cutt_off_date" :value="__('Cutt Off Date')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="cutt_off_date" type="date" required=""
                                    name="cutt_off_date" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="minimum_application_amount" :value="__('Minimum Application Amount')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="minimum_application_amount" type="number"
                                    placeholder="Enter your minimum application amount here..." required=""
                                    name="minimum_application_amount" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="total_share" :value="__('Total Share')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="total_share" type="number"
                                    placeholder="Enter your total share here..." required="" name="total_share" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="eps" :value="__('EPS')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="eps" type="number" step="0.01"
                                    min="0" onchange="formatNumberInput(this)" value="0.00"
                                    placeholder="Enter your eps here..." name="eps" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="nav" :value="__('NAV')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="nav" type="number" step="0.01"
                                    min="0" onchange="formatNumberInput(this)" value="0.00"
                                    placeholder="Enter your nav here..." name="nav" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="rate" :value="__('Rate')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="rate" type="number"
                                    placeholder="Enter your rate here..." required="" name="rate" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="type" :value="__('Type')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="type" type="text"
                                    placeholder="Enter your type here..." required="" name="type" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="start_date" :value="__('Start Date')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="start_date" type="date" required=""
                                    name="start_date" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="end_date" :value="__('End Date')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="end_date" type="date" required=""
                                    name="end_date" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="listed_on" :value="__('Listed On')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="listed_on" type="text"
                                    placeholder="Enter your listed on here..." required="" name="listed_on" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="list_price" :value="__('List Price')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="list_price" type="number"
                                    placeholder="Enter your list price here..." required="" name="list_price" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="list_gains" :value="__('List Gains')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="list_gains" type="number"
                                    placeholder="Enter your list gains here..." required="" name="list_gains" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="offer_price" :value="__('Offer Price')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="offer_price" type="number" step="0.01"
                                    min="0" onchange="formatNumberInput(this)" value="0.00"
                                    placeholder="Enter your oFfer price here..." required="" name="offer_price" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="cupon_rate" :value="__('Cupon Rate')" />
                                <span class="text-danger">(*)</span>
                                <x-text-input class="form-control" id="cupon_rate" type="number"
                                    placeholder="Enter your cupon rate here..." required="" name="cupon_rate" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <x-input-label class="form-label" for="key_highlights" :value="__('Key Highlights')" />
                                <span class="text-danger">(*)</span>
                                <textarea class="form-control" id="key_highlights" required="" name="key_highlights"></textarea>
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
        //number-inputValue
        function formatNumberInput(input) {
            var value = input.value;
            var formattedValue = parseFloat(value).toFixed(2);
            input.value = formattedValue;
        }
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/froala-editor@3.2.7"></script> --}}
    <script>
        var editor = new FroalaEditor('#key_highlights', {
            pluginsEnable: ['insertUnorderedList', 'fullscreen', 'bold', 'italic', 'underline', 'strikeThrough',
                'subscript', 'superscript', 'fontFamily', 'fontSize', 'color', 'align', 'outdent', 'indent',
                'quote', 'insertLink',
                'insertImage', 'insertTable', 'insertHR', 'undo', 'redo'
            ],
            height: '70px',
        });
        var editor = new FroalaEditor('#company_about', {
            pluginsEnable: ['insertUnorderedList', 'fullscreen', 'bold', 'italic', 'underline', 'strikeThrough',
                'subscript', 'superscript', 'fontFamily', 'fontSize', 'color', 'align', 'outdent', 'indent',
                'quote', 'insertLink',
                'insertImage', 'insertTable', 'insertHR', 'undo', 'redo'
            ],
            height: '70px',
        });
    </script>
@endpush
