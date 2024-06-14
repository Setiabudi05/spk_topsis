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
                    <h3>Edit User</h3>
                    {{-- <p class="text-subtitle text-muted">
                        Complete the form with powerful validation library such as Parsley.
                    </p> --}}
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                            <a href="{{ route('admin.user.index') }}" class="btn btn-success">Back</a>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('admin.user.update', Crypt::encrypt($users->id)) }}" method="POST" data-parsley-validate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="name-column" class="form-label">Name</label>
                                                <input type="text" id="name-column" class="form-control" name="name" placeholder="Name" value="{{ $users->name }}" data-parsley-required="true" />
                                            </div>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="email-column" class="form-label">Email</label>
                                                <input type="email" id="email-column" class="form-control" name="email" placeholder="Email" value="{{ $users->email }}" data-parsley-required="true"
                                                       disabled />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h6>Optional!</h6>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="password-column" class="form-label">Password</label>
                                                <input type="text" id="password-column" class="form-control" name="password" placeholder="Password" />
                                            </div>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="confirm_password-column" class="form-label">Confirm Password</label>
                                                <input type="text" id="confirm_password-column" class="form-control" name="confirm_password" placeholder="Confirm Password" />
                                            </div>
                                            @error('confirm_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group mandatory">
                                                <label for="role-column" class="form-label">Role</label>
                                                <select class="form-select" id="role-column" name="role" required>
                                                    <option value="">Silahkan Pilih Role</option>
                                                    @foreach ($roles as $r)
                                                        <option value="{{ $r->name }}" {{ $users->hasRole($r->name) == true ? 'selected' : '' }}>{{ $r->name }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                            @error('confirm_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    {{-- {{ $users->email_verified_at }} --}}
                                                    @if ($users->hasVerifiedEmail())
                                                        <input type="checkbox" id="checkbox5" class="form-check-input" checked disabled />
                                                    @else
                                                        <input type="checkbox" id="checkbox5" name="verified" class="form-check-input" />
                                                    @endif
                                                    <label for="checkbox5" class="form-check-label form-label">Verified Email</label>
                                                </div>
                                            </div>
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
