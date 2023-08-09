@extends('layouts.dashboard.master')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatable-extension.css') }}">
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'List of Media')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Media</li>
        <li class="breadcrumb-item">List of Media</li>
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h6>Partner List</h6>
                            <div>
                                @if (session()->has('create'))
                                    <div class="alert alert-success my-2">
                                        {{ session('create') }}
                                    </div>
                                @endif
                            </div>
                            <table class="table table-bordered display" id="basic-1"
                                style="font-size:12px;text-align:center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Partner With Us</th>
                                        <th>Division</th>
                                        <th>District</th>
                                        <th>Thana/Upazila</th>
                                        <th>Union</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($partners as $partner)
                                        <tr>
                                            <td>{{ $partner->id }}</td>
                                            <td>{{ $partner->name }}</td>
                                            <td>{{ $partner->email }}</td>
                                            <td>{{ $partner->phoneNumber }}</td>
                                            <td>
                                                <div class="collapse-content" id="collapseContent{{ $partner->id }}">
                                                    {!! $partner->reason !!}
                                                </div>
                                                <div class="collapse-link pt-2"
                                                    onclick="toggleCollapse({{ $partner->id }})">
                                                    <span id="collapseLinkText{{ $partner->id }}">See More</span>
                                                </div>
                                            </td>
                                            <td>{{ $partner->division->name }}
                                                <br>{{ $partner->division->bn_name }}
                                            </td>
                                            <td>{{ $partner->district->name }}
                                                <br> {{ $partner->district->bn_name }}
                                            </td>
                                            <td>{{ $partner->upazila->name }}
                                                <br>{{ $partner->upazila->bn_name }}
                                            </td>
                                            <td>{{ $partner->union->name }}
                                                <br>{{ $partner->union->bn_name }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="my-2">
                                {{ $partners->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function toggleCollapse(id) {
            const contentDiv = document.getElementById(`collapseContent${id}`);
            const linkTextSpan = document.getElementById(`collapseLinkText${id}`);

            if (contentDiv.style.maxHeight) {
                // Collapse the content
                contentDiv.style.maxHeight = null;
                linkTextSpan.textContent = "See More";
            } else {
                // Expand the content
                contentDiv.style.maxHeight = contentDiv.scrollHeight + "px";
                linkTextSpan.textContent = "See Less";
            }
        }
    </script>
@endpush
