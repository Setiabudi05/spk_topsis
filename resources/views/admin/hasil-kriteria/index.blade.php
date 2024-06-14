@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/scss/pages/datatables.scss') }}">
@endpush
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.min.js"></script>
    {{-- <script src="{{ asset('assets/admin/static/js/pages/datatables.js') }}"></script> --}}
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Kriteria</h3>
                    {{-- <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery required).</p> --}}
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kriteria</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Data Kriteria
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table kriterias-table" id="kriterias-table">
                            <thead>
                                <tr>
                                    <th>Peringkat</th>
                                    <th>Nama</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hasils as $h)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $h['name'] }}</td>
                                        <td>{{ $h['hasil'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->

    </div>
@endsection
