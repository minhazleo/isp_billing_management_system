@extends('layouts.app')

@section('content')
<div class="row mb-30">
    <div class="col-md mb-20 mb-md-0">
        <div class="card-box">
            <div class="card-header">
                <div class="card-title text-info m-0">Salary history</div>
            </div>
            <div class="card-body">
                <div class="input-group mb-0">
                    <input type="text" class="form-control datetimepicker-range @error('salary_history') is-invalid @enderror" id="salary_history" name="salary_history" placeholder="Select From & Till Date" aria-describedby="salary-history" value="{{ old('salary_history') }}" required autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-outline-info" type="button" id="salary-history"><i class="icon-copy dw dw-search2"></i> Search</button>
                    </div>
                    @error('salary_history')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card-box">
            <div class="card-header">
                <div class="card-title text-success m-0">Generate staff salary</div>
            </div>
            <div class="card-body">
                <div class="input-group mb-0">
                    <input type="text" class="form-control datetimepicker-range @error('generate_salary') is-invalid @enderror" id="generate_salary" name="generate_salary" placeholder="Select From & Till Date" aria-describedby="generate-salary" value="{{ old('generate_salary') }}" required autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button" id="generate-salary"><span class="icon-copy ti-printer"></span> Generate</button>
                    </div>
                    @error('generate_salary')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-box">
    <div class="modal fade" id="new-employee" tabindex="-1" role="dialog" aria-labelledby="createEmployeeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createEmployeeModal">Add new employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('create.employee') }}" method="post">
                        @csrf

                        <p class="h5 mb-0"><i class="icon-copy dw dw-agenda1"></i> Account information</p>
                        <hr class="mt-1">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="name">Full Name</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="off">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="name">Password</label>
                                    <div class="col-8">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" minlength="8" value="{{ old('password') }}" required autocomplete="off">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="account_role">Select role</label>
                                    <div class="col-8">
                                        <select class="form-control selectpicker @error('account_role') is-invalid @enderror" data-style="btn-outline-secondary" title="Choose..." id="account_role" name="account_role" required>
                                            <option value="Manager" @if(old('account_role') == 'Manager') selected @endif>Manager</option>
                                            <option value="Technician" @if(old('account_role') == 'Technician') selected @endif>Technician</option>
                                        </select>
                                        @error('account_role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="name">E-mail Address</label>
                                    <div class="col-8">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="off">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="password-confirm">Confirm Password</label>
                                    <div class="col-8">
                                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="salary">Salary</label>
                                    <div class="col-8">
                                        <input type="number" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" value="{{ old('salary') }}" required autocomplete="off">
                                        @error('salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
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
                        </div>
                        
                        <p class="h5 mb-0"><i class="icon-copy dw dw-name"></i> Profile information</p>
                        <hr class="mt-1">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="phone">Phone</label>
                                    <div class="col-8">
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required autocomplete="off">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="country">Country</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country') }}" required autocomplete="off">
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="address">Address</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required autocomplete="off">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label pb-0" for="zip_code">Zip code</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" required autocomplete="off">
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
        <h4 class="text-blue h4 m-0"><i class="icon-copy fa fa-user-o mr-2" aria-hidden="true"></i>Staff List</h4>
        <button type="button" class="btn btn-sm btn-dark rounded-lg m-0" data-toggle="modal" data-target="#new-employee">
            <i class="icon-copy dw dw-add-user"></i> New Employee
        </button>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap" id="employee-data-table">
            <thead>
                <tr>
                    <th class="table-plus">Name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Salary</th>
                    <th>Status</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="table-plus">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->salary }}</td>
                        <td>{{ $user->active }}</td>
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
