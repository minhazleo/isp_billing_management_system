@extends('layouts.app')

@section('content')
<div class="card-box">
    <div class="modal fade" id="new-income" tabindex="-1" role="dialog" aria-labelledby="createIncomeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createIncomeModal">Add new income</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('new.income') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="type">Type*</label>
                            <select class="form-control selectpicker @error('type') is-invalid @enderror" data-style="btn-outline-secondary text-dark" title="Choose..." id="type" name="type" required>
                                <option value="Customer Service">Customer Service</option>
                                <option value="Installation">Installation</option>
                                <option value="Product Selling">Product Selling</option>
                                <option value="Monthly Payment">Monthly Payment</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Start of Newly added Payment Type--}}
                        <div class="form-group">
                            <label for="payment_type">Payment Type*</label>
                            <select class="form-control selectpicker @error('payment_type') is-invalid @enderror" data-style="btn-outline-secondary text-dark" title="Choose..." id="payment_type" name="payment_type" required>
                                <option value="Bkash">Bkash</option>
                                <option value="Rocket">Rocket</option>
                                <option value="Nagad">Nagad</option>
                                <option value="Bank">Bank</option>
                            </select>
                            @error('payment_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="date">Date*</label>
                            <input type="text" class="form-control date-picker @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" required autocomplete="off">
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount*</label>
                            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" required>
                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="invoice">Invoice</label>
                            <input type="text" class="form-control @error('invoice') is-invalid @enderror" id="invoice" name="invoice" value="{{ old('invoice') }}">
                            @error('invoice')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <input type="text" class="form-control @error('note') is-invalid @enderror" id="note" name="note" value="{{ old('note') }}">
                            @error('note')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div><h6><span class="badge badge-light text-danger">* Required field</span></h6></div>

                        <hr class="mt-1">
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
        <h4 class="text-blue h4 m-0"><i class="icon-copy dw dw-analytics-21 mr-2"></i>Income List</h4>
        <button type="button" class="btn btn-sm btn-success rounded-lg m-0" data-toggle="modal" data-target="#new-income">
            <i class="icon-copy dw dw-add-file1"></i> New Income
        </button>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap" id="income-data-table">
            <thead>
                <tr>
                    <th class="table-plus">Amount</th>
                    <th>Type</th>
                    <th>Payment Type</th>
                    <th>Invoice</th>
                    <th>Date</th>
                    <th>Note</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incomes as $income)
                    <tr>
                        <td class="table-plus">{{ $income->price }}</td>
                        <td>{{ $income->type }}</td>
                        <td>{{ $income->payment_type }}</td>
                        <td>{{ $income->invoice }}</td>
                        <td>{{ $income->date }}</td>
                        <td>{{ $income->note }}</td>
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
