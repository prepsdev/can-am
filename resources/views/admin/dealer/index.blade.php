@extends('admin.app')

@section('content')
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Dealer</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none">Data</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Dealer</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('images/backgrounds/ChatBc.png') }}" alt="modernize-img"
                                class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content searchable-container list">

            <div class="col-md-12 col-xl-12 text-start d-flex justify-content-md-start justify-content-center my-3 mt-md-0">
                <a href="{{ route('admin.dealer.create') }}"class="btn btn-primary d-flex align-items-center">
                    <i class="ti ti-building text-white me-1 fs-5"></i> Add Data
                </a>
            </div>
            <div class="card card-body shadow-lg">
                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap" id="dataTable">
                        <thead class="header-item">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.dealer.getData') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'city',
                        name: 'city'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
    <script>
        function deleteDealer(id) {
            if (confirm("Are you sure you want to delete this dealer?")) {
                $.ajax({
                    url: "' . route('admin.dealer.delete', '') . '/" + id,
                    type: "DELETE",
                    data: {
                        _token: "' . csrf_token() . '"
                    },
                    success: function(response) {
                        alert("Dealer deleted successfully!");
                        location.reload();
                    },
                    error: function(response) {
                        alert("An error occurred while deleting the dealer.");
                    }
                });
            }
        }
    </script>
@endpush
