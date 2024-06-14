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
    <script>
        $(document).ready(function() {
            $('.users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.user.data') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    }, // Access related model data
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });

        function hapus(id) {
            console.log('mboh');
            event.preventDefault();
            // var id = $(this).data('id');
            swal({
                    title: "Apakah Anda Yakin?",
                    text: "Data Riwayat Pekerjaan akan dihapus!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                })
                .then((confirm) => {
                    console.log(confirm);
                    if (confirm.value) {
                        try {
                            $('#form-delete-user-' + id).submit();
                            console.log('success');
                            console.log(id);
                        } catch (error) {
                            console.log('failed');
                        }
                    }
                });
        }

        // function hapus(id) {
        //     event.preventDefault();
        //     swal({
        //             title: "Are you sure?",
        //             text: "Selected file will be deleted permanently!",
        //             type: "warning",
        //             showCancelButton: true,
        //             confirmButtonText: 'Delete',
        //             // buttons: true,
        //             // dangerMode: true,
        //         })
        //         .then((confirm) => {
        //             // console.log(confirm);
        //             if (confirm.value) {
        //                 $('#deleteform-' + id).submit();
        //             }
        //         });
        // }
    </script>
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Users</h3>
                    {{-- <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery required).</p> --}}
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User</li>
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
                        Data User
                    </h5>
                    <a href="{{ route('admin.user.create') }}" class="btn btn-success">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table users-table" id="users-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->

    </div>
@endsection
