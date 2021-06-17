@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="row row-cols-1 row-cols-md-3">
        <div class="col mb-20 mb-md-0">
            <div class="card-box pd-20" data-bgcolor="#265ed7">
                <div class="d-flex justify-content-between pb-20 text-white">
                    <div class="icon h1 text-white">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="font-14 text-right">
                        <div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
                        <div class="font-12">Since last month</div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end">
                    <div class="text-white">
                        <div class="font-14">Total client</div>
                        <div class="font-24 weight-500">18</div>
                    </div>
                    <div class="max-width-150">
                        <div class="chart-tile" id="management-chart"></div>
                    </div>
                </div>
                <a href="#" class="btn btn-link text-white mx-0 mb-0 mt-2 p-0"><i class="icon-copy dw dw-fast-forward-1"></i> Go to user management</a>
            </div>
        </div>
        <div class="col mb-20 mb-md-0">
            <div class="card-box pd-20" data-bgcolor="#455a64">
                <div class="d-flex justify-content-between pb-20 text-white">
                    <div class="icon h1 text-white">
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    </div>
                    <div class="font-14 text-right">
                        <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                        <div class="font-12">Since last month</div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end">
                    <div class="text-white">
                        <div class="font-14">Total billed amount</div>
                        <div class="font-24 weight-500">$186</div>
                    </div>
                    <div class="max-width-150">
                        <div class="chart-tile" id="income-chart"></div>
                    </div>
                </div>
                <a href="#" class="btn btn-link text-white mx-0 mb-0 mt-2 p-0"><i class="icon-copy dw dw-fast-forward-1"></i> Go to user billing</a>
            </div>
        </div>
        <div class="col">
            <div class="card-box pd-20" data-bgcolor="#218838">
                <div class="d-flex justify-content-between pb-20 text-white">
                    <div class="icon h1 text-white">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <div class="font-14 text-right">
                        <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                        <div class="font-12">Since last month</div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end">
                    <div class="text-white">
                        <div class="font-14">Total payment received</div>
                        <div class="font-24 weight-500">$47780.00</div>
                    </div>
                    <div class="max-width-150">
                        <div class="chart-tile" id="expense-chart"></div>
                    </div>
                </div>
                <a href="#" class="btn btn-link text-white mx-0 mb-0 mt-2 p-0"><i class="icon-copy dw dw-fast-forward-1"></i> Go to user payment</a>
            </div>
        </div>
    </div>
</div>
<div class="card-box">
    <div class="modal fade" id="new-client" tabindex="-1" role="dialog" aria-labelledby="createClientModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createClientModal">Add new client</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('create.client') }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md">
                                <p class="h5 mb-0"><i class="icon-copy dw dw-agenda1"></i> Account information</p>
                                <hr class="mt-1">

                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="name">Full Name*</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="email">E-mail Address*</label>
                                    <div class="col-8">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="password">Password*</label>
                                    <div class="col-8">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" minlength="8" value="{{ old('password') }}" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="password-confirm">Confirm Password*</label>
                                    <div class="col-8">
                                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="package">Select package*</label>
                                    <div class="col-8">
                                        <select class="form-control selectpicker @error('package') is-invalid @enderror" data-style="btn-outline-secondary" title="Choose..." id="package" name="package" required>
                                            @foreach ($packages as $package)
                                                <option value="{{ $package->id }}">{{ $package->name . ' (' . $package->title . ')' }}</option>
                                            @endforeach
                                        </select>
                                        @error('package')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0">Status</label>
                                    <div class="col-8">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="active" name="account_status" class="custom-control-input @error('account_status') is-invalid @enderror" value="{{ old('account_status') ?? 'active' }}" @if(old('account_status') == 'active') checked @endif required>
                                            <label class="custom-control-label" for="active">Active</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="inactive" name="account_status" class="custom-control-input @error('account_status') is-invalid @enderror" value="{{ old('account_status') ?? 'inactive' }}" @if(old('account_status') == 'inactive') checked @endif required>
                                            <label class="custom-control-label" for="inactive">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <p class="h5 mb-0"><i class="icon-copy dw dw-name"></i> Profile information</p>
                                <hr class="mt-1">

                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="company_name">Company name</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name') }}">
                                        @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="phone">Phone</label>
                                    <div class="col-8">
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="address">Address</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="country">Country</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country') }}">
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="zip_code">Zip code</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" id="zip_code" name="zip_code" value="{{ old('zip_code') }}">
                                        @error('zip_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <h4 class="text-blue h4 m-0"><i class="icon-copy fa fa-user mr-2" aria-hidden="true"></i>Client List</h4>
        <button type="button" class="btn btn-sm btn-dark rounded-lg m-0" data-toggle="modal" data-target="#new-client">
            <i class="icon-copy dw dw-add-user"></i> New Client
        </button>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap" id="clients-data-table">
            <thead>
                <tr>
                    <th class="table-plus">Name</th>
                    <th>Status</th>
                    <th>Package</th>
                    <th>Due</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="table-plus">{{ $user->name }}</td>
                        <td>@if($user->active) Active @else Inactive @endif</td>
                        <td>{{ $user->package_name . ' (' . $user->package_title . ')' }}</td>
                        <td>500</td>
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
<script>
    var options3 = {
        series: [{
            name: 'Week',
            data: [{
                x: 'Monday',
                y: 10
            }, {
                x: 'Tuesday',
                y: 8
            }, {
                x: 'Wednesday',
                y: 15
            }, {
                x: 'Thursday',
                y: 12
            }, {
                x: 'Friday',
                y: 20
            }, {
                x: 'Saturday',
                y: 14
            }, {
                x: 'Sunday',
                y: 7
            }],
        }],
        colors: ['#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'],
        chart: {
            height: 70,
            type: 'bar',
            toolbar: {
                show: false,
            },
            sparkline: {
                enabled: true
            },
        },
        plotOptions: {
            bar: {
                columnWidth: '25px',
                distributed: true,
                endingShape: 'rounded',
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            type: 'category',
            lines: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
            labels: {
                show: false,
            },
        },
        yaxis: [{
            y: 0,
            offsetX: 0,
            offsetY: 0,
            labels: {
                show: false,
            },
            padding: {
                left: 0,
                right: 0
            },
        }],
    };
    // Load all tile
    $("document").ready(function() {
        $(".chart-tile").each(function() {
            new ApexCharts(document.querySelector("#" + $(this).attr("id")), options3).render();
        });
    });
</script>
@endsection
