@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card-box">
            <div class="card-header pd-20 mb-4">
                <h4 class="text-blue h4 m-0"><i class="icon-copy fa fa-sliders mr-2" aria-hidden="true"></i>Settings</h4>
            </div>
            <div class="card-body pt-0">
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-md">
                            <p class="h5 mb-0"><i class="icon-copy dw dw-chip-1"></i> Mikrotik</p>
                            <hr class="mt-1">

                            <div class="form-group row">
                                <label class="col-3 col-form-label pb-0" for="ip_address">IP address</label>
                                <div class="col-9">
                                    <input type="text" class="form-control @error('ip_address') is-invalid @enderror" id="ip_address" name="ip_address" value="{{ old('ip_address') }}" required>
                                </div>
                                @error('ip_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label pb-0" for="username">Username</label>
                                <div class="col-9">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required>
                                </div>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label pb-0" for="password">Password</label>
                                <div class="col-9">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" required>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4"><i class="icon-copy dw dw-diskette1"></i> Update Information</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
