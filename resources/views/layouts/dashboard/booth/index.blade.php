@extends('layouts.dashboard.master')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatable-extension.css') }}">
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'List of Digital Booth')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Digital Booth</li>
        <li class="breadcrumb-item">List of Digital Booth</li>
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div>
                                @if (session()->has('create'))
                                    <div class="alert alert-success">
                                        {{ session('create') }}
                                    </div>
                                @endif
                                @if (session()->has('update'))
                                    <div class="alert alert-success">
                                        {{ session('update') }}
                                    </div>
                                @endif
                                @if (session()->has('delete'))
                                    <div class="alert alert-danger">
                                        {{ session('delete') }}
                                    </div>
                                @endif
                            </div>
                            <table class="table text-center display" id="basic-1">
                                <thead style="font-size:12px;text-align:center">
                                    <tr>
                                        <th>Digital Booth Name</th>
                                        <th>Digital Booth Address</th>
                                        <th>Digital Booth Helpline</th>
                                        <th>Digital Booth Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:12px;text-align:center">
                                    @foreach ($booths as $booth)
                                        <tr>
                                            <td>{{ $booth->booth_name }}</td>
                                            <td>{{ $booth->booth_address }}</td>
                                            <td>{{ $booth->booth_helpline }}</td>
                                            <td>{{ $booth->booth_email }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div>
                                                        <a href="{{ route('booth.edit', ['id' => $booth->id]) }}" class="btn btn-outline-primary">Edit</a>
                                                    </div>
                                                    <div style="margin-left:5px">
                                                        <form action="{{ route('booth.destroy', ['id' => $booth->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>                                              
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div>
                                {{ $booth->links() }}
                            </div> --}}
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