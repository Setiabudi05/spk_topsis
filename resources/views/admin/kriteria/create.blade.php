@extends('layouts.master')

@push('css')
@endpush
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <script src="{{ asset('assets/admin/static/js/pages/parsley.js') }}"></script>
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Create Kriteria</h3>
                    {{-- <p class="text-subtitle text-muted">
                        Complete the form with powerful validation library such as Parsley.
                    </p> --}}
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.kriteria.index') }}">Kriteria</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h4 class="card-title">Multiple Column</h4> --}}
                            <a href="{{ route('admin.kriteria.index') }}" class="btn btn-success">Back</a>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('admin.kriteria.store') }}" method="POST" data-parsley-validate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="kode-column" class="form-label">Kode</label>
                                                <input type="text" id="kode-column" class="form-control @error('kode') is-invalid @enderror" name="kode" placeholder="Kode"
                                                       value="{{ old('kode') }}" data-parsley-required="true" />
                                            </div>
                                            @error('kode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nama-column" class="form-label">Nama</label>
                                                <input type="text" id="nama-column" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama"
                                                       value="{{ old('nama') }}" data-parsley-required="true" />
                                            </div>
                                            @error('nama')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="sys_name-column" class="form-label">Sys Name (tidak boleh ada spasi dan huruf kapital!!)</label>
                                                <input type="text" id="sys_name-column" class="form-control @error('sys_name') is-invalid @enderror" name="sys_name" placeholder="Sys_name"
                                                       value="{{ old('sys_name') }}" data-parsley-required="true" />
                                            </div>
                                            @error('sys_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="bobot-column" class="form-label">Bobot</label>
                                                <input type="text" id="bobot-column" class="form-control @error('bobot') is-invalid @enderror" name="bobot" placeholder="Bobot"
                                                       value="{{ old('bobot') }}" data-parsley-required="true" />
                                            </div>
                                            @error('bobot')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group mandatory">
                                                <label for="jenis-column" class="form-label">Jenis</label>
                                                <select class="form-select" id="jenis-column" name="jenis" required>
                                                    <option value="">Silahkan Pilih Jenis</option>
                                                    <option value="Benefit" class="text-success fw-bold">Benefit</option>
                                                    <option value="Cost" class="text-success fw-bold">Cost</option>
                                                </select>
                                            </fieldset>
                                            @error('jenis')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
    </div>
@endsection
