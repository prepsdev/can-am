@extends('admin.app')

@section('content')
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Detail {{ $curr }}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none">Data</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none">Service</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Detail</li>
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
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header bg-info-subtle">
                        <h4 class="fw-semibold mb-0">Add Service</h4>
                    </div>
                    <div class="card-body shadow-lg">
                        @if ($service->status != 'Finished')
                            <form action="{{ route('admin.service.storeDetail', request()->segment(4)) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Select Vehicle</label>
                                            <select name="vehicle_id" class="form-control">
                                                <option value="">Select Vehicle</option>
                                                @foreach ($vehicles as $vehicle)
                                                    <option value="{{ $vehicle->id }}">{{ $vehicle->type }} -
                                                        {{ $vehicle->vin }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('vehicle_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Oli Mesin</label>
                                            <select name="oli_mesin" class="form-control">
                                                <option value="">-</option>
                                                @foreach ($oli_mesin as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Oli Gardan</label>
                                            <select name="oli_gardan" class="form-control">
                                                <option value="">-</option>
                                                @foreach ($oli_gardan as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Oli Gear Box</label>
                                            <select name="oli_gear_box" class="form-control">
                                                <option value="">-</option>
                                                @foreach ($oli_gear_box as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Break Cleaner</label>
                                            <select name="break_cleaner" class="form-control">
                                                <option value="">-</option>
                                                @foreach ($break_cleaner as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Carbu Cleaner</label>
                                            <select name="carbu_cleaner" class="form-control">
                                                <option value="">-</option>
                                                @foreach ($carbu_cleaner as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Crush Washer</label>
                                            <select name="crush_washer" class="form-control">
                                                <option value="">-</option>
                                                @foreach ($crush_washer as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Busi</label>
                                            <select name="busi" class="form-control">
                                                <option value="">-</option>
                                                @foreach ($busi as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">O Ring Filter</label>
                                            <select name="o_ring_filter" class="form-control">
                                                <option value="">-</option>
                                                @foreach ($o_ring_filter as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Filter Oli</label>
                                            <select name="filter_oli" class="form-control">
                                                <option value="">-</option>
                                                @foreach ($filter_oli as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-md-flex align-items-center">
                                            <div class="ms-auto mt-3 mt-md-0">
                                                <button type="submit" class="btn btn-primary hstack gap-6">
                                                    <i class="ti ti-send fs-4"></i>
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-danger" role="alert">
                                Service has been finished
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header bg-info-subtle">
                        <h4 class="fw-semibold mb-0">Detail Service</h4>
                    </div>
                    <div class="card-body shadow-lg">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">Service ID:</p>
                                <p class="text-muted">{{ $service->service_id }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">Service Type:</p>
                                <p class="text-muted">{{ $service->service_type }}</p>
                            </div>
                        </div>

                        <hr>

                        <h5 class="fw-semibold my-4">Customer Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">Customer Name:</p>
                                <p class="text-muted">{{ $service->customer->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">Phone:</p>
                                <p class="text-muted">{{ $service->customer->phone }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">City:</p>
                                <p class="text-muted">{{ $service->customer->city }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">Address:</p>
                                <p class="text-muted">{{ $service->customer->address }}</p>
                            </div>
                        </div>

                        <hr>

                        <h5 class="fw-semibold my-4">Service Details</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">Status:</p>
                                <p
                                    class="badge bg-{{ $service->status == 'Mechanic Unassigned' ? 'danger' : ($service->status == 'Waiting Mechanic' ? 'warning' : ($service->status == 'On Progress - On My Way' ? 'info' : ($service->status == 'On Progress - Arrived' ? 'info' : ($service->status == 'On Progress - Fixing' ? 'info' : ($service->status == 'On Progress - Final Check' ? 'info' : 'success'))))) }}">
                                    {{ ucfirst($service->status) }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">Scheduled At:</p>
                                <p class="text-muted">{{ $service->schedule_date->format('d M Y') }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">Created At:</p>
                                <p class="text-muted">{{ $service->created_at->format('d M Y H:i') }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">Action:</p>
                                @if (in_array($service->status, ['Waiting Mechanic', 'Mechanic Unassigned']) && auth()->user()->role == 'admin')
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#selectMechanicModal">
                                        <i class="ti ti-search"></i> Select Mechanic
                                    </button>
                                @endif
                                @if ($service->status == 'Waiting Mechanic' && auth()->user()->role == 'mechanic')
                                    <form id="onmyway-service-form"
                                        action="{{ route('admin.service.onmywayService', $service->service_id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        <button type="button" class="btn btn-primary" onclick="confirmOnmywayService()">
                                            <i class="ti ti-car"></i> On My Way
                                        </button>
                                    </form>
                                @endif
                                @if ($service->status == 'On Progress - On My Way' && auth()->user()->role == 'mechanic')
                                    <form id="estimate-service-form"
                                        action="{{ route('admin.service.estimateService', $service->service_id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        <button type="button" class="btn btn-primary"
                                            onclick="confirmEstimateService()">
                                            <i class="ti ti-car"></i> Arrived
                                        </button>
                                    </form>
                                @endif
                                @if ($service->status == 'On Progress - Arrived' && auth()->user()->role == 'mechanic')
                                    <form id="start-service-form"
                                        action="{{ route('admin.service.startService', $service->service_id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        <button type="button" class="btn btn-primary" onclick="confirmStartService()">
                                            <i class="ti ti-player-play"></i> Start Service
                                        </button>
                                    </form>
                                @endif
                                @if ($service->status == 'On Progress - Fixing' && auth()->user()->role == 'mechanic')
                                    <form id="final-service-form"
                                        action="{{ route('admin.service.finalService', $service->service_id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        <button type="button" class="btn btn-primary" onclick="confirmFinalService()">
                                            <i class="ti ti-cricle-dashed-check"></i> Final Checking
                                        </button>
                                    </form>
                                @endif
                                @if ($service->status == 'On Progress - Final Check' && auth()->user()->role == 'mechanic')
                                    <form id="finish-service-form"
                                        action="{{ route('admin.service.finishService', $service->service_id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        <button type="button" class="btn btn-primary" onclick="confirmFinishService()">
                                            <i class="ti ti-thumb-up"></i> Finish Service
                                        </button>
                                    </form>
                                @endif

                                <!-- Modal -->
                                <div class="modal fade" id="selectMechanicModal" tabindex="-1"
                                    aria-labelledby="selectMechanicModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="selectMechanicModalLabel">Select Mechanic</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                    action="{{ route('admin.service.selectMechanic', request()->segment(4)) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="mechanic" class="form-label">Mechanic</label>
                                                        <select name="mechanic_id" id="mechanic" class="form-control"
                                                            required>
                                                            @foreach ($mechanics as $mechanic)
                                                                <option value="{{ $mechanic->id }}">{{ $mechanic->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-info-subtle">
                        <h4 class="fw-semibold mb-0">Service Tracker</h4>
                    </div>
                    <div class="card-body shadow-lg">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">We are on our way:</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted">
                                    {{ $tracker->way ? $tracker->way->format('H:i') . ' WIB' : 'Belum dilakukan' }}</p>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">We are on estimate:</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted">
                                    {{ $tracker->estimate ? $tracker->estimate->format('H:i') . ' WIB' : 'Belum dilakukan' }}
                                </p>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">Work on progress:</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted">
                                    {{ $tracker->progress ? $tracker->progress->format('H:i') . ' WIB' : 'Belum dilakukan' }}
                                </p>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">Final Check:</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted">
                                    {{ $tracker->check ? $tracker->check->format('H:i') . ' WIB' : 'Belum dilakukan' }}</p>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="fw-bold mb-1">Finished:</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted">
                                    {{ $tracker->finish ? $tracker->finish->format('H:i') . ' WIB' : 'Belum dilakukan' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body shadow-lg">
                    <h4 class="fw-semibold mb-4">List Service</h4>
                    <div class="table-responsive mb-4 border rounded-1">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th></th>
                                    <th class="fs-4 fw-semibold mb-0">No</th>
                                    <th class="fs-4 fw-semibold mb-0">VIN</th>
                                    <th class="fs-4 fw-semibold mb-0">Vehicle Type</th>
                                    <th class="fs-4 fw-semibold mb-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicedetails as $index => $row)
                                    <tr data-bs-toggle="collapse" data-bs-target="#detail-{{ $index }}"
                                        aria-expanded="false" aria-controls="detail-{{ $index }}">
                                        <td>
                                            <button class="btn btn-sm btn-primary">
                                                <i class="ti ti-chevron-down"></i>
                                            </button>
                                        </td>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $row->vehicle->vin ?? 'N/A' }}</td>
                                        <td>{{ $row->vehicle->type ?? 'N/A' }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#addInformationModal-{{ $row->id }}">
                                                <i class="ti ti-info-circle"></i> Add Information
                                            </button>

                                            @if ($service->status != 'Finished')
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="confirmDelete({{ $row->id }})">
                                                    <i class="ti ti-trash"></i> Delete
                                                </button>
                                            @endif

                                            <form id="delete-form-{{ $row->id }}"
                                                action="{{ route('admin.service.deleteDetail', $row->id) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <div class="modal fade" id="addInformationModal-{{ $row->id }}"
                                                tabindex="-1"
                                                aria-labelledby="addInformationModalLabel-{{ $row->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="addInformationModalLabel-{{ $row->id }}">Add
                                                                Information -
                                                                {{ $row->vehicle->type }}({{ $row->vehicle->vin }})</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('admin.service.addInformation', $row->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="information"
                                                                        class="form-label">Information</label>
                                                                    <textarea name="information" id="information" class="form-control" rows="3" required>{{ $row->information }}</textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="collapse" id="detail-{{ $index }}">
                                        <td colspan="5">
                                            <div class="p-3">
                                                @if (
                                                    $row->oli_mesin ||
                                                        $row->oli_gardan ||
                                                        $row->oli_gear_box ||
                                                        $row->break_cleaner ||
                                                        $row->carbu_cleaner ||
                                                        $row->crush_washer ||
                                                        $row->busi ||
                                                        $row->o_ring_filter ||
                                                        $row->filter_oli)
                                                    @if ($row->oli_mesin)
                                                        <p><strong>Oli Mesin:</strong> {{ $row->oli_mesin }}</p>
                                                    @endif
                                                    @if ($row->oli_gardan)
                                                        <p><strong>Oli Gardan:</strong> {{ $row->oli_gardan }}</p>
                                                    @endif
                                                    @if ($row->oli_gear_box)
                                                        <p><strong>Oli Gear Box:</strong> {{ $row->oli_gear_box }}</p>
                                                    @endif
                                                    @if ($row->break_cleaner)
                                                        <p><strong>Break Cleaner:</strong> {{ $row->break_cleaner }}
                                                        </p>
                                                    @endif
                                                    @if ($row->carbu_cleaner)
                                                        <p><strong>Carbu Cleaner:</strong> {{ $row->carbu_cleaner }}
                                                        </p>
                                                    @endif
                                                    @if ($row->crush_washer)
                                                        <p><strong>Crush Washer:</strong> {{ $row->crush_washer }}</p>
                                                    @endif
                                                    @if ($row->busi)
                                                        <p><strong>Busi:</strong> {{ $row->busi }}</p>
                                                    @endif
                                                    @if ($row->o_ring_filter)
                                                        <p><strong>O Ring Filter:</strong> {{ $row->o_ring_filter }}
                                                        </p>
                                                    @endif
                                                    @if ($row->filter_oli)
                                                        <p><strong>Filter Oli:</strong> {{ $row->filter_oli }}</p>
                                                    @endif
                                                @else
                                                    <p>Tidak ada informasi tambahan produk</p>
                                                @endif
                                                <p><b>Informasi Tambahan:</b><br>{{ $row->information }}</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
    <script>
        function confirmOnmywayService() {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to start this service?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, start it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('onmyway-service-form').submit();
                }
            });
        }

        function confirmEstimateService() {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to mark this service as arrived?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, mark it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('estimate-service-form').submit();
                }
            });
        }

        function confirmStartService() {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to start this service?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, start it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('start-service-form').submit();
                }
            });
        }

        function confirmFinalService() {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to mark this service as final checking?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, mark it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('final-service-form').submit();
                }
            });
        }

        function confirmFinishService() {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to finish this service?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, finish it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('finish-service-form').submit();
                }
            });
        }
    </script>
@endpush
