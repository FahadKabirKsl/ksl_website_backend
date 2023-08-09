@extends('layouts.dashboard.master')
@push('css')
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'List of IPO')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">IPO</li>
        <li class="breadcrumb-item">List of IPO</li>
    @endcomponent
    <div class="container w-75">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body" style="border: none">
                        <div class="table-responsive">
                            <div class="row-sm-3">
                                <div class="mb-4">
                                    @if (session()->has('create'))
                                        <div class="alert alert-success">
                                            {{ session('create')['company_name'] }} -
                                            <strong>{{ session('create')['status'] }}</strong> -
                                            {{ session('create')['message'] }}
                                        </div>
                                    @elseif (session()->has('update'))
                                        <div class="alert alert-secondary">
                                            {{ session('update')['company_name'] }} -
                                            <strong>{{ session('update')['status'] }}</strong> -
                                            {{ session('update')['message'] }}
                                        </div>
                                    @elseif (session()->has('delete'))
                                        <div class="alert alert-danger">
                                            {{ session('delete')['message'] }}
                                        </div>
                                    @endif
                                </div>
                                <table class="table display" id="basic-1" style="font-size:12px;text-align:left">
                                    <thead>
                                        <p class="fw-bold fs-6">Upcoming IPOs</p>
                                        <tr class="tr-head">
                                            <th>Company Name</th>
                                            <th>Cutt Off Date</th>
                                            <th>Minimum Application Amount</th>
                                            <th>Total Share</th>
                                            <th>EPS</th>
                                            <th>NAV</th>
                                            <th>Rate</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($upcoming_ipo as $ipo)
                                            <tr class="clickable-row"
                                                onclick="window.location='{{ route('ipo.single_ipo_index', ['id' => $ipo->id, 'company_name' => $ipo->company_name]) }}';">
                                                <td>{{ $ipo->company_name }}</td>
                                                <td>{{ $ipo->cutt_off_date }}</td>
                                                <td>{{ $ipo->minimum_application_amount }}</td>
                                                <td>{{ $ipo->total_share }}</td>
                                                <td>{{ $ipo->eps }}</td>
                                                <td>{{ $ipo->nav }}</td>
                                                <td>{{ $ipo->rate }}</td>
                                                <td>{{ $ipo->type }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div>
                                                            <a href="{{ route('ipo.single_ipo_index', ['id' => $ipo->id, 'company_name' => $ipo->company_name]) }}"
                                                                class="btn btn-outline-primary">Open</a>
                                                        </div>
                                                        <div style="margin-left:5px">
                                                            <a href="{{ route('ipo.edit', ['id' => $ipo->id]) }}"
                                                                class="btn btn-outline-secondary">Edit</a>
                                                        </div>
                                                        <div style="margin-left:5px">
                                                            <form action="{{ route('ipo.destroy', ['id' => $ipo->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-outline-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{ $upcoming_ipo->links() }} --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="border: none">
                        <div class="table-responsive">
                            <div class="row-sm-3">
                                <table class="table display" id="basic-1" style="font-size:12px;text-align:left">
                                    <thead>
                                        <p class="fw-bold fs-6">Ongoing IPOs</p>
                                        <tr class="tr-head">
                                            <th>Company Name</th>
                                            <th>Cutt Off Date</th>
                                            <th>Minimum Application Amount</th>
                                            <th>Total Share</th>
                                            <th>EPS</th>
                                            <th>NAV</th>
                                            <th>Rate</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ongoing_ipo as $ipo)
                                            <tr class="clickable-row"
                                                onclick="window.location='{{ route('ipo.single_ipo_index', ['id' => $ipo->id, 'company_name' => $ipo->company_name]) }}';">
                                                <td>{{ $ipo->company_name }}</td>
                                                <td>{{ $ipo->cutt_off_date }}</td>
                                                <td>{{ $ipo->minimum_application_amount }}</td>
                                                <td>{{ $ipo->total_share }}</td>
                                                <td>{{ $ipo->eps }}</td>
                                                <td>{{ $ipo->nav }}</td>
                                                <td>{{ $ipo->rate }}</td>
                                                <td>{{ $ipo->type }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div>
                                                            <a href="{{ route('ipo.single_ipo_index', ['id' => $ipo->id, 'company_name' => $ipo->company_name]) }}"
                                                                class="btn btn-outline-primary">Open</a>
                                                        </div>
                                                        <div style="margin-left:5px">
                                                            <a href="{{ route('ipo.edit', ['id' => $ipo->id]) }}"
                                                                class="btn btn-outline-secondary">Edit</a>
                                                        </div>
                                                        <div style="margin-left:5px">
                                                            <form action="{{ route('ipo.destroy', ['id' => $ipo->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-outline-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{ $ongoing_ipo->links() }} --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="border: none">
                        <div class="table-responsive">
                            <div class="row-sm-3">
                                <table class="table display" id="basic-1" style="font-size:12px;text-align:left">
                                    <thead>
                                        <p class="fw-bold fs-6">Listing IPOs</p>
                                        <tr class="tr-head">
                                            <th>Company Name</th>
                                            <th>Cutt Off Date</th>
                                            <th>Minimum Application Amount</th>
                                            <th>Total Share</th>
                                            <th>EPS</th>
                                            <th>NAV</th>
                                            <th>Rate</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listing_ipo as $ipo)
                                            <tr class="clickable-row"
                                                onclick="window.location='{{ route('ipo.single_ipo_index', ['id' => $ipo->id, 'company_name' => $ipo->company_name]) }}';">
                                                <td>{{ $ipo->company_name }}</td>
                                                <td>{{ $ipo->cutt_off_date }}</td>
                                                <td>{{ $ipo->minimum_application_amount }}</td>
                                                <td>{{ $ipo->total_share }}</td>
                                                <td>{{ $ipo->eps }}</td>
                                                <td>{{ $ipo->nav }}</td>
                                                <td>{{ $ipo->rate }}</td>
                                                <td>{{ $ipo->type }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div>
                                                            <a href="{{ route('ipo.single_ipo_index', ['id' => $ipo->id, 'company_name' => $ipo->company_name]) }}"
                                                                class="btn btn-outline-primary">Open</a>
                                                        </div>
                                                        <div style="margin-left:5px">
                                                            <a href="{{ route('ipo.edit', ['id' => $ipo->id]) }}"
                                                                class="btn btn-outline-secondary">Edit</a>
                                                        </div>
                                                        <div style="margin-left:5px">
                                                            <form action="{{ route('ipo.destroy', ['id' => $ipo->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-outline-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{ $listing_ipo->links() }} --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="border: none">
                        <div class="table-responsive">
                            <div class="row-sm-3">
                                <table class="table display" id="basic-1" style="font-size:12px;text-align:left">
                                    <thead>
                                        <p class="fw-bold fs-6">Closing IPOs</p>
                                        <tr class="tr-head">
                                            <th>Company Name</th>
                                            <th>Cutt Off Date</th>
                                            <th>Minimum Application Amount</th>
                                            <th>Total Share</th>
                                            <th>EPS</th>
                                            <th>NAV</th>
                                            <th>Rate</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($closing_ipo as $ipo)
                                            <tr class="clickable-row"
                                                onclick="window.location='{{ route('ipo.single_ipo_index', ['id' => $ipo->id, 'company_name' => $ipo->company_name]) }}';">
                                                <td>{{ $ipo->company_name }}</td>
                                                <td>{{ $ipo->cutt_off_date }}</td>
                                                <td>{{ $ipo->minimum_application_amount }}</td>
                                                <td>{{ $ipo->total_share }}</td>
                                                <td>{{ $ipo->eps }}</td>
                                                <td>{{ $ipo->nav }}</td>
                                                <td>{{ $ipo->rate }}</td>
                                                <td>{{ $ipo->type }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div>
                                                            <a href="{{ route('ipo.single_ipo_index', ['id' => $ipo->id, 'company_name' => $ipo->company_name]) }}"
                                                                class="btn btn-outline-primary">Open</a>
                                                        </div>
                                                        <div style="margin-left:5px">
                                                            <a href="{{ route('ipo.edit', ['id' => $ipo->id]) }}"
                                                                class="btn btn-outline-secondary">Edit</a>
                                                        </div>
                                                        <div style="margin-left:5px">
                                                            <form action="{{ route('ipo.destroy', ['id' => $ipo->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-outline-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{ $closing_ipo->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
