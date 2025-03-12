@extends('admin.app')

@section('content')
    <div class="container-fluid">
        @if (Auth::user()->role == 'admin')
            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <div class="card border-0 zoom-in bg-danger-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-mailbox.svg"
                                    width="50" height="50" class="mb-3" alt="modernize-img">
                                <p class="fw-semibold fs-3 text-danger mb-1">Projects</p>
                                <h5 class="fw-semibold text-danger mb-0">356</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-mailbox.svg"
                                    width="50" height="50" class="mb-3" alt="modernize-img">
                                <p class="fw-semibold fs-3 text-warning mb-1">Projects</p>
                                <h5 class="fw-semibold text-warning mb-0">356</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-mailbox.svg"
                                    width="50" height="50" class="mb-3" alt="modernize-img">
                                <p class="fw-semibold fs-3 text-info mb-1">Projects</p>
                                <h5 class="fw-semibold text-info mb-0">356</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="card border-0 zoom-in bg-success-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-mailbox.svg"
                                    width="50" height="50" class="mb-3" alt="modernize-img">
                                <p class="fw-semibold fs-3 text-success mb-1">Total Finished</p>
                                <h5 class="fw-semibold text-success mb-0">123</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (Auth::user()->role == 'mechanic')
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 zoom-in bg-danger-subtle shadow-none position-relative">
                        <div
                            class="card-body d-flex flex-column flex-sm-row align-items-center justify-content-between text-center text-sm-start">
                            <div class="order-2 order-sm-1">
                                <h4 class="fw-semibold">Selamat datang, {{ auth()->user()->name }}!</h4>
                                <p class="mb-3">
                                    Kamu memiliki <strong>xxx</strong> pekerjaan yang akan segera dimulai
                                    dalam beberapa hari ke depan.
                                    Jangan sampai terlewatkan untuk mengerjakannya tepat waktu dan tetap produktif!
                                </p>
                            </div>
                            <div class="order-1 order-sm-2 mb-3 mb-sm-0">
                                <svg fill="#af2c2c" height="200px" width="200px" version="1.1" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 512 512" xml:space="preserve" stroke="#af2c2c">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <g>
                                                <path
                                                    d="M509.898,383.317l-30.799-52.992c25.466-66.561,23.689-61.81,24.001-62.978c1.219-3.271,1.324-6.911,0.188-10.317 l0.04,0.013l-0.22-0.584l-32.707-86.889c-3.521-9.353-13.957-14.081-23.31-10.56l-30.2,11.368 c-7.353,2.768-11.825,9.81-11.702,17.238l30.546-16.078l-36.311,33.133c-15.958-3.983-22.944-5.726-38.768-9.677 c-0.224-3.191-1.597-6.308-4.12-8.663c-5.294-4.938-13.589-4.652-18.529,0.643c-5.746,6.159-43.948,47.108-49.687,53.259 l-47.068-84.051c-3.904-6.973-11.294-11.304-19.285-11.304H64.321c-10.296,0-19.374,7.298-21.586,17.353L19.666,264.49v51.819 C8.391,318.973,0,329.093,0,341.18c0,14.119,11.445,25.564,25.564,25.564h18.895c0-30.784,25.045-55.829,55.829-55.829 c30.784,0,55.829,25.045,55.829,55.829h105.96c0-30.784,25.045-55.829,55.829-55.829c30.784,0,55.829,25.045,55.829,55.829 c1.352,0,8.854,0,9.718,0c14.119,0,25.564-11.445,25.564-25.564c0-11.13-7.115-20.594-17.043-24.103v-12.263 c0-22.271-18.054-40.325-40.325-40.325h-49.746l-0.133-0.237c4.8-5.146,43.964-47.125,43.964-47.125s1.291,1.108,54.154,14.302 c0.006,0.001,0.01,0.001,0.016,0.002c4.215,1.048,8.693-0.137,11.826-2.996l40.096-36.588l-29.806,43.522l15.564,41.347 l-18.751,12.249c-4.699,3.069-7.373,8.437-6.992,14.036l6.038,88.801c0.579,8.514,7.941,15,16.527,14.422 c8.545-0.581,15.002-7.98,14.422-16.526l-5.422-79.734l13.691-8.943l-9.62,25.145c-1.675,4.379-1.28,9.282,1.077,13.336 l34.524,59.403c4.311,7.417,13.81,9.914,21.202,5.616C511.687,400.216,514.201,390.723,509.898,383.317z M120.707,243.374H50.096 l16.252-73.872h54.359V243.374z M194.189,286.149h-26.386c-4.959,0-8.98-4.021-8.98-8.98c0-4.959,4.02-8.98,8.98-8.98h26.386 c4.959,0,8.98,4.021,8.98,8.98C203.169,282.128,199.148,286.149,194.189,286.149z M146.927,243.374v-73.872h73.563l41.369,73.872 H146.927z">
                                                </path>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <circle cx="419.602" cy="132.162" r="26.787"></circle>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M100.288,327.752c-21.535,0-38.993,17.457-38.993,38.993c0,21.534,17.457,38.991,38.993,38.991 c21.535,0,38.993-17.457,38.993-38.991C139.28,345.209,121.823,327.752,100.288,327.752z M100.288,382.538 c-8.723,0-15.794-7.071-15.794-15.794s7.071-15.794,15.794-15.794c8.723,0,15.794,7.071,15.794,15.794 S109.011,382.538,100.288,382.538z">
                                                </path>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M317.907,327.752c-21.535,0-38.993,17.457-38.993,38.993c0,21.534,17.457,38.991,38.993,38.991 s38.993-17.457,38.993-38.991C356.899,345.209,339.441,327.752,317.907,327.752z M317.907,382.538 c-8.723,0-15.794-7.071-15.794-15.794s7.071-15.794,15.794-15.794s15.794,7.071,15.794,15.794S326.63,382.538,317.907,382.538z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body shadow-lg">
                            <h4 class="fw-semibold mb-4">Pekerjaan yang akan segera dimulai</h4>
                            <div class="table-responsive mb-4 border rounded-1">
                                <table class="table text-nowrap mb-0 align-middle">
                                    <thead class="text-dark fs-4">
                                        <tr>
                                            <th class="fw-4 fw-semibold- mb-0">No</th>
                                            <th class="fw-4 fw-semibold- mb-0">Pelanggan</th>
                                            <th class="fw-4 fw-semibold- mb-0">Alamat</th>
                                            <th class="fw-4 fw-semibold- mb-0">Jenis</th>
                                            <th class="fw-4 fw-semibold- mb-0">Jadwal Kunjungan</th>
                                            <th class="fw-4 fw-semibold- mb-0">Status</th>
                                            <th class="fw-4 fw-semibold- mb-0">Action</th>
                                        </tr>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->customer->name }}</td>
                                                <td>{{ $row->customer->city }}</td>
                                                <td>{{ $row->service_type }}</td>
                                                <td>{{ \Carbon\Carbon::parse($row->schedule_date)->format('d M Y') }}</td>
                                                <td>{{ $row->status }}</td>
                                                <td><a href="{{ route('admin.service.detail', $row->service_id) }}"
                                                        class="btn btn-primary">Detail</a></td>
                                            </tr>
                                        @endforeach
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endsection

    @push('scripts')
        <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script>
        <script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
    @endpush
