@extends('layouts.dashboard.master')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatable-extension.css') }}">
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'Single IPO')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">IPO</li>
        <li class="breadcrumb-item">
            {{ $ipo->company_name }}
        </li>
    @endcomponent
    <div class="container w-75">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10">
                            <h4 class="mb-4">{{ $ipo->company_name }}</h4>
                            <p>Platform: {{ $ipo->company_platform }}</p>
                        </div>
                        <div class="col-sm-2">
                            <p class="fs-4 fw-bold text-danger">{{ $ipo->minimum_invest }}
                                <span class="d-block text-dark" style="font-size:12px">Minimum Investment</span>
                            </p>
                        </div>
                        {{-- <div class="col-sm-2">
                                <a href="{{route('ipo.edit',['id'=>$ipo->id])}}" class="btn btn-outline-secondary my-4 mx-auto" >Edit</a>
                            </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <p>IPO Listing Details</p>
                    <div class="row-sm-12">
                        <div class="table-responsive">
                            <table class="table table-striped display" id="basic-1"
                                style="font-size:12px;text-align:left">
                                <thead>
                                    <tr class="tr-head">
                                        <th>List On</th>
                                        <th>List Price</th>
                                        <th>Offer Price</th>
                                        <th>List Gains</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $ipo->listed_on }}</td>
                                        <td>{{ $ipo->list_price }}</td>
                                        <td>{{ $ipo->offer_price }}</td>
                                        <td>{{ $ipo->list_gains }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>IPO Details</p>
                    <div class="row-sm-6">
                        <div class="table-responsive">
                            <table class="table table-striped display" id="basic-1"
                                style="font-size:12px;text-align:left">
                                <thead>
                                    <tr class="tr-head">
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Cutt-Off Date </th>
                                        <th>Minimum Application Amount</th>
                                        <th>Total Share</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $ipo->start_date }}</td>
                                        <td>{{ $ipo->end_date }}</td>
                                        <td>{{ $ipo->cutt_off_date }}</td>
                                        <td>{{ $ipo->minimum_application_amount }}</td>
                                        <td>{{ $ipo->total_share }}</td>
                                    </tr>
                                </tbody>
                        </div>
                    </div>
                    <div class="row-sm-6">
                        <div class="table-responsive">
                            <thead>
                                <tr class="tr-head">
                                    <th>NAV</th>
                                    <th>EPS</th>
                                    <th>Rate</th>
                                    <th>Cupon Rate</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $ipo->nav }}</td>
                                    <td>{{ $ipo->eps }}</td>
                                    <td>{{ $ipo->rate }}</td>
                                    <td>{{ $ipo->cupon_rate }}</td>
                                    <td>{{ $ipo->type }}</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-2 my-2">
                    <div class="row">
                        <div class="col">
                            <h6>Founded</h6>
                            <p>{{ $ipo->founded }}</p>
                        </div>
                        <div class="col">
                            <h6>Parent Organization</h6>
                            <p>{{ $ipo->parent_organization }}</p>
                        </div>
                        <div class="col">
                            <h6>Managing Director</h6>
                            <p>{{ $ipo->managing_director }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row-sm-6">
                        <div class="company-about">
                            <h6>Company About</h6>
                            <p>{!! $ipo->company_about !!}</p>
                        </div>
                    </div>
                    <div class="row-sm-6">
                        <div class="key-highlights">
                            <h6>Key Highlights</h6>
                            <p>{!! $ipo->key_highlights !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
