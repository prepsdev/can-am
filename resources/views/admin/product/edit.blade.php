@extends('admin.app')

@section('content')
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Edit Data</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none">Data</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none">Vehicle</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Edit</li>
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
        <div class="card">
            <div class="card-body shadow-lg">
                <form action="{{ route('admin.product.update', $data->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Product Type</label>
                                <select name="type" class="form-control">
                                    <option value="">Select Product Type</option>
                                    <option value="Oli Mesin" {{ $data->type == 'Oli Mesin' ? 'selected' : '' }}>Oli Mesin
                                    </option>
                                    <option value="Oli Gardan" {{ $data->type == 'Oli Gardan' ? 'selected' : '' }}>Oli
                                        Gardan
                                    </option>
                                    <option value="Oli Gear Box" {{ $data->type == 'Oli Gear Box' ? 'selected' : '' }}>Oli
                                        Gear Box</option>
                                    <option value="Break Cleaner" {{ $data->type == 'Break Cleaner' ? 'selected' : '' }}>
                                        Break Cleaner</option>
                                    <option value="Carbu Cleaner" {{ $data->type == 'Carbu Cleaner' ? 'selected' : '' }}>
                                        Carbu Cleaner</option>
                                    <option value="Crush Washer" {{ $data->type == 'Crush Washer' ? 'selected' : '' }}>Crush
                                        Washer</option>
                                    <option value="Busi" {{ $data->type == 'Busi' ? 'selected' : '' }}>Busi</option>
                                    <option value="O Ring Filter" {{ $data->type == 'O Ring Filter' ? 'selected' : '' }}>
                                        O Ring Filter</option>
                                    <option value="Filter Oli" {{ $data->type == 'Filter Oli' ? 'selected' : '' }}>Filter
                                        Oli
                                    </option>
                                    <option value="Aksesoris" {{ $data->type == 'Aksesoris' ? 'selected' : '' }}>Aksesoris
                                    </option>
                                </select>
                                @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Product Code</label>
                                <input type="text" name="code" class="form-control" placeholder="Enter Product Code"
                                    value="{{ $data->code }}" autocomplete="off">
                                @error('code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Product Name"
                                    value="{{ $data->name }}" autocomplete="off">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" name="price" class="form-control" placeholder="Enter Price"
                                    value="{{ 'Rp ' . number_format($data->price, 0, ',', '.') }}" autocomplete="off"
                                    id="price" oninput="formatPrice(this)">
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-md-flex align-items-center">
                                <div class="ms-auto mt-3 mt-md-0">
                                    <button type="submit" class="btn btn-primary hstack gap-6">
                                        <i class="ti ti-send fs-4"></i>
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
@endpush
@push('scripts')
    <script>
        function formatPrice(input) {
            let value = input.value.replace(/\D/g, ""); // Hapus semua non-digit
            let formattedValue = new Intl.NumberFormat('id-ID').format(value); // Format dengan titik (.)
            input.value = 'Rp ' + formattedValue;
        }
    </script>
@endpush
