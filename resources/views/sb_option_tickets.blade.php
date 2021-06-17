@extends('layouts.app')

@section('content')
<div class="card-box">
    <div class="card-header pd-20 mb-4">
        <h4 class="text-blue h4 m-0"><i class="icon-copy fa fa-ticket mr-2" aria-hidden="true"></i>Tickets</h4>
    </div>
    <div class="pb-20">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Comments</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- <th scope="row">1</th> --}}
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
