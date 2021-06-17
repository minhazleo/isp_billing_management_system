@extends('layouts.app')

@section('content')
<div class="row mb-30">
    <div class="col-md mb-20 mb-md-0">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">17</div>
                    <div class="font-14 text-secondary weight-500">Total packages</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-gift"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md mb-20 mb-md-0">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">15</div>
                    <div class="font-14 text-secondary weight-500">PPoE packages</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#ffd400"><i class="icon-copy dw dw-diagram"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">2</div>
                    <div class="font-14 text-secondary weight-500">HotSpot packages</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#09cc06"><i class="icon-copy dw dw-wifi1"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-box">
    <div class="modal fade" id="new-package" tabindex="-1" role="dialog" aria-labelledby="createPackageModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createPackageModal">Add new package</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('create.package') }}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label class="col-5 col-form-label pb-0" for="profile_name">Name <small>(profile name)</small></label>
                            <div class="col-7">
                                <input type="text" class="form-control @error('profile_name') is-invalid @enderror" id="profile_name" name="profile_name" value="{{ old('profile_name') }}" required>
                                @error('profile_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-5 col-form-label pb-0" for="package_name">Title <small>(package name)</small></label>
                            <div class="col-7">
                                <input type="text" class="form-control @error('package_name') is-invalid @enderror" id="package_name" name="package_name" value="{{ old('package_name') }}" required>
                                @error('package_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-5 col-form-label pb-0" for="upload_speed">Upload speed <small>(RX)</small></label>
                            <div class="col-7">
                                <input type="number" class="form-control @error('upload_speed') is-invalid @enderror" id="upload_speed" name="upload_speed" value="{{ old('upload_speed') }}" required>
                                @error('upload_speed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-5 col-form-label pb-0" for="download_speed">Download speed <small>(TX)</small></label>
                            <div class="col-7">
                                <input type="number" class="form-control @error('download_speed') is-invalid @enderror" id="download_speed" name="download_speed" value="{{ old('download_speed') }}" required>
                                @error('download_speed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-5 col-form-label pb-0">Type</label>
                            <div class="col-7">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="ppoe" name="connection_type" value="PPoE" class="custom-control-input @error('connection_type') is-invalid @enderror" required>
                                    <label class="custom-control-label" for="ppoe">PPoE</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="hotspot" name="connection_type" value="HotSpot" class="custom-control-input @error('connection_type') is-invalid @enderror" required>
                                    <label class="custom-control-label" for="hotspot">HotSpot</label>
                                </div>
                                @error('connection_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-5 col-form-label pb-0" for="price">Price</label>
                            <div class="col-7">
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr class="mt-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="button" class="btn btn-secondary m-0" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info m-0"><i class="icon-copy dw dw-diskette1"></i> Create New</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header pd-20 mb-4 d-flex justify-content-between align-items-center">
        <h4 class="text-blue h4 m-0"><i class="icon-copy fa fa-gift mr-2" aria-hidden="true"></i>Package List</h4>
        <button type="button" class="btn btn-sm btn-dark rounded-lg m-0" data-toggle="modal" data-target="#new-package">
            <i class="icon-copy dw dw-add"></i> New Package
        </button>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap" id="packages-data-table">
            <thead>
                <tr>
                    <th class="table-plus">Name</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Speed</th>
                    <th>User Price</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                    <tr>
                        <td class="table-plus">{{ $package->name }}</td>
                        <td>{{ $package->title }}</td>
                        <td>{{ $package->type }}</td>
                        <td>{{ $package->download }} Mbps</td>
                        <td>৳ {{ $package->price }}</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
@endsection
