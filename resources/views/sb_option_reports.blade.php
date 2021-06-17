@extends('layouts.app')

@section('content')
<div class="card-box">
    <div class="card-header pd-20 mb-4">
        <h4 class="text-blue h4 m-0"><i class="icon-copy dw dw-clipboard1 mr-2"></i>Reports</h4>
    </div>
    <div class="card-body pt-0">
        <div class="modal fade" id="profit_n_loss-report" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <p class="h4">Profit & Loss Report</p>
                            <p class="mb-30">Date: 12 June, 2021</p>
                        </div>
                        <hr class="mt-30">
                        <p class="h6 text-uppercase mb-3"><u>Income:</u></p>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0 text-capitalize">User payment</p>
                            <p class="mb-0">৳ 474780.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0 text-capitalize">Resesller payment</p>
                            <p class="mb-0">৳ 114160.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0 text-capitalize">Other income</p>
                            <p class="mb-0">৳ 33628.54</p>
                        </div>
                        <hr class="mb-2">
                        <div class="d-flex justify-content-between">
                            <p class="mb-0 text-capitalize"><strong>Total income</strong></p>
                            <p class="mb-0">৳ 622568.54</p>
                        </div>
                        <hr class="mt-2">
                        <p class="h6 text-uppercase mb-3"><u>Expenses:</u></p>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0 text-capitalize">Office expense</p>
                            <p class="mb-0">৳ 57814.46</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0 text-capitalize">Salary</p>
                            <p class="mb-0">৳ 4938635.00</p>
                        </div>
                        <hr class="mb-2">
                        <div class="d-flex justify-content-between">
                            <p class="mb-0 text-capitalize"><strong>Total Expense</strong></p>
                            <p class="mb-0">৳ 4996449.46</p>
                        </div>
                        <hr class="mt-2 mb-1">
                        <hr class="mt-0 mb-2">
                        <div class="d-flex justify-content-between">
                            <p class="mb-0 text-capitalize"><strong>Profit / Loss</strong></p>
                            <p class="mb-0">৳ -4373880.92</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-right m-0" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="user-report" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <p class="h4">User Report</p>
                            <p class="mb-30">Date: 12 June, 2021</p>
                        </div>
                        <hr class="mt-30">
                        <table class="data-table table stripe hover nowrap table-responsive" id="user_report-data-table">
                            <thead>
                                <tr>
                                    <th class="table-plus">Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Address</th>
                                    <th>Post Code</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-plus">Gloria F. Mead</td>
                                    <td>damy@email.com</td>
                                    <td>111 111-1111</td>
                                    <td>Sagittarius</td>
                                    <td>2829 Trainer Avenue Peoria, IL 61602 </td>
                                    <td>1647</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">Andrea J. Cagle</td>
                                    <td>damy@email.com</td>
                                    <td>111 111-1111</td>
                                    <td>Gemini</td>
                                    <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                                    <td>1647</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">Andrea J. Cagle</td>
                                    <td>damy@email.com</td>
                                    <td>111 111-1111</td>
                                    <td>Gemini</td>
                                    <td>2829 Trainer Avenue Peoria, IL 61602 </td>
                                    <td>1647</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">Andrea J. Cagle</td>
                                    <td>damy@email.com</td>
                                    <td>111 111-1111</td>
                                    <td>Sagittarius</td>
                                    <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                                    <td>1647</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">Andrea J. Cagle</td>
                                    <td>damy@email.com</td>
                                    <td>111 111-1111</td>
                                    <td>Gemini</td>
                                    <td>2829 Trainer Avenue Peoria, IL 61602 </td>
                                    <td>1647</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">Andrea J. Cagle</td>
                                    <td>damy@email.com</td>
                                    <td>111 111-1111</td>
                                    <td>Sagittarius</td>
                                    <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                                    <td>1647</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">Andrea J. Cagle</td>
                                    <td>damy@email.com</td>
                                    <td>111 111-1111</td>
                                    <td>Gemini</td>
                                    <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                                    <td>1647</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">Andrea J. Cagle</td>
                                    <td>damy@email.com</td>
                                    <td>111 111-1111</td>
                                    <td>Sagittarius</td>
                                    <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                                    <td>1647</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">Andrea J. Cagle</td>
                                    <td>damy@email.com</td>
                                    <td>111 111-1111</td>
                                    <td>Sagittarius</td>
                                    <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                                    <td>1647</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">Andrea J. Cagle</td>
                                    <td>damy@email.com</td>
                                    <td>111 111-1111</td>
                                    <td>Gemini</td>
                                    <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                                    <td>1647</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">Andrea J. Cagle</td>
                                    <td>damy@email.com</td>
                                    <td>111 111-1111</td>
                                    <td>Gemini</td>
                                    <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                                    <td>1647</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">Andrea J. Cagle</td>
                                    <td>damy@email.com</td>
                                    <td>111 111-1111</td>
                                    <td>Gemini</td>
                                    <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                                    <td>1647</td>
                                    <td>Active</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-right m-0" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-30 mb-md-0">
                <p class="h5 mb-0"><i class="icon-copy dw dw-notepad"></i> General report</p>
                <hr class="mt-1">

                <div class="row d-flex align-items-end mb-30">
                    <div class="col-1"><i class="icon-copy dw dw-analytics-21 fa-3x"></i></div>
                    <div class="col-11">
                        <p class="h5 mb-0"><a href="#profit_n_loss-report" data-toggle="modal" class="btn btn-link m-0 p-0">Profit & Loss <i class="icon-copy dw dw-link1"></i></a></p>
                        <p class="mb-0">Shows money you earned and money you spent to see how much you profited</p>
                    </div>
                </div>
                <div class="row d-flex align-items-end mb-30">
                    <div class="col-1"><i class="icon-copy dw dw-user-1 fa-3x"></i></div>
                    <div class="col-11">
                        <p class="h5 mb-0"><a href="#user-report" data-toggle="modal" class="btn btn-link m-0 p-0">User report <i class="icon-copy dw dw-link1"></i></a></p>
                        <p class="mb-0">Detail report on each user and their profile (both ISP & Reseller users)</p>
                    </div>
                </div>
                <div class="row d-flex align-items-end">
                    <div class="col-1"><i class="icon-copy dw dw-invoice-1 fa-3x"></i></div>
                    <div class="col-11">
                        <p class="h5 mb-0"><a href="#mikrotik_log-report" data-toggle="modal" class="btn btn-link m-0 p-0">Mikrotik log <i class="icon-copy dw dw-link1"></i></a></p>
                        <p class="mb-0">This report includes all the log generated by Mikrotik</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <p class="h5 mb-0"><i class="icon-copy dw dw-notepad-2"></i> Custom report</p>
                <hr class="mt-1">

                <form action="#" method="post">
                    <div class="form-group">
                        <label>Select report</label>
                        <select class="form-control selectpicker @error('report_type') is-invalid @enderror" data-style="btn-outline-secondary" title="Choose..." id="report_type" name="report_type" required>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        @error('report_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Report period</label>
                        <input type="text" class="form-control datetimepicker-range @error('report_period') is-invalid @enderror" id="report_period" name="report_period" placeholder="Select From & Till Date" value="{{ old('report_period') }}" required>
                        @error('report_period')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary float-right"><span class="icon-copy ti-printer"></span> Generate</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
