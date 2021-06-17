@extends('layouts.app')

@section('content')
<div class="card-box">
    <div class="modal fade" id="new-reseller" tabindex="-1" role="dialog" aria-labelledby="createResellerModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createResellerModal">Add new reseller</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('create.reseller') }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md">
                                <p class="h5 mb-0"><i class="icon-copy dw dw-agenda1"></i> Account information</p>
                                <hr class="mt-1">

                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="name">Full Name</label>
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
                                    <label class="col-4 col-form-label pb-0" for="name">E-mail Address</label>
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
                                    <label class="col-4 col-form-label pb-0" for="name">Password</label>
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
                                    <label class="col-4 col-form-label pb-0" for="password-confirm">Confirm Password</label>
                                    <div class="col-8">
                                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
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
                                    <label class="col-4 col-form-label pb-0" for="company_name">Company name (optional)</label>
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
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
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
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
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
                                        <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country') }}" required>
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
                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" required>
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
        <h4 class="text-blue h4 m-0"><i class="icon-copy fa fa-user-secret mr-2" aria-hidden="true"></i>Reseller List</h4>
        <button type="button" class="btn btn-sm btn-dark rounded-lg m-0" data-toggle="modal" data-target="#new-reseller">
            <i class="icon-copy dw dw-add-user"></i> New Reseller
        </button>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap" id="resellers-data-table">
            <thead>
                <tr>
                    <th class="table-plus">Name</th>
                    <th>Company</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Due</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="table-plus">{{ $user->name }}</td>
                        <td>{{ $user->company_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>15000</td>
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
