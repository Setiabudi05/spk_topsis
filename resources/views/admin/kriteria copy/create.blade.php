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
                                            <fieldset class="form-group mandatory">
                                                <label for="user-column" class="form-label">User</label>
                                                <select class="form-select" id="user-column" name="user_id" required>
                                                    <option value="">Silahkan Pilih User</option>
                                                    @foreach ($users as $i)
                                                        @if ($i->kriteria)
                                                            <option value="{{ $i->id }}" class="text-success fw-bold">{{ $i->name }}</option>
                                                        @else
                                                            <option value="{{ $i->id }}">{{ $i->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                            @error('user_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group mandatory">
                                                <label for="pendidikan-column" class="form-label">Pendidikan</label>
                                                <select class="form-select" id="pendidikan-column" name="pendidikan" required>
                                                    <option value="">Silahkan Pilih Pendidikan</option>
                                                    <option value="1">Magister Komputer</option>
                                                    <option value="0.75">Sarjana Komputer</option>
                                                    <option value="0.5">Magister Non Komputer </option>
                                                    <option value="0.25">Sarjana Non Komputer</option>
                                                </select>
                                            </fieldset>
                                            @error('pendidikan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group mandatory">
                                                <label for="sertifikat-column" class="form-label">Sertifikat Keahlian</label>
                                                <select class="form-select" id="sertifikat-column" name="sertifikat" required>
                                                    <option value="">Silahkan Pilih Sertifikat Keahlian</option>
                                                    <option value="1">Sangat Buruk</option>
                                                    <option value="2">Buruk</option>
                                                    <option value="3">Cukup</option>
                                                    <option value="4">Baik</option>
                                                    <option value="5">Sangat Baik</option>
                                                </select>
                                            </fieldset>
                                            @error('sertifikat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group mandatory">
                                                <label for="kemampuan-column" class="form-label">Kemampuan Jaringan</label>
                                                <select class="form-select" id="kemampuan-column" name="kemampuan" required>
                                                    <option value="">Silahkan Pilih Kemampuan Jaringan</option>
                                                    <option value="1">Sangat Buruk</option>
                                                    <option value="2">Buruk</option>
                                                    <option value="3">Cukup</option>
                                                    <option value="4">Baik</option>
                                                    <option value="5">Sangat Baik</option>
                                                </select>
                                            </fieldset>
                                            @error('kemampuan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group mandatory">
                                                <label for="penggunaan_teknologi-column" class="form-label">Penggunaan Teknologi Jaringan</label>
                                                <select class="form-select" id="penggunaan_teknologi-column" name="penggunaan_teknologi" required>
                                                    <option value="">Silahkan Pilih Penggunaan Teknologi Jaringan</option>
                                                    <option value="1">Sangat Buruk</option>
                                                    <option value="2">Buruk</option>
                                                    <option value="3">Cukup</option>
                                                    <option value="4">Baik</option>
                                                    <option value="5">Sangat Baik</option>
                                                </select>
                                            </fieldset>
                                            @error('penggunaan_teknologi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group mandatory">
                                                <label for="penggunaan_tools-column" class="form-label">Penggunaan Tools Jaringan</label>
                                                <select class="form-select" id="penggunaan_tools-column" name="penggunaan_tools" required>
                                                    <option value="">Silahkan Pilih Penggunaan Tools Jaringan</option>
                                                    <option value="1">Sangat Buruk</option>
                                                    <option value="2">Buruk</option>
                                                    <option value="3">Cukup</option>
                                                    <option value="4">Baik</option>
                                                    <option value="5">Sangat Baik</option>
                                                </select>
                                            </fieldset>
                                            @error('penggunaan_tools')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group mandatory">
                                                <label for="infrakstruktur-column" class="form-label">Infrakstruktur Jaringan</label>
                                                <select class="form-select" id="infrakstruktur-column" name="infrakstruktur" required>
                                                    <option value="">Silahkan Pilih Infrakstruktur Jaringan</option>
                                                    <option value="1">Sangat Buruk</option>
                                                    <option value="2">Buruk</option>
                                                    <option value="3">Cukup</option>
                                                    <option value="4">Baik</option>
                                                    <option value="5">Sangat Baik</option>
                                                </select>
                                            </fieldset>
                                            @error('infrakstruktur')
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
