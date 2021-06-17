@extends('layouts.app')

@section('content')
<div class="row row-cols-1 row-cols-md-3 mb-30">
    <div class="col mb-20 mb-md-0">
        <div class="card-box pd-20" data-bgcolor="#265ed7">
            <p class="h5 text-white mb-4">UNPAID AMOUNT</p>
            <div class="d-flex justify-content-between align-items-center text-light">
                <div>From users</div>
                <div>$ 474780</div>
            </div>
            <div class="d-flex justify-content-between align-items-center text-light">
                <div>From resellers</div>
                <div>$ 116160</div>
            </div>
        </div>
    </div>
    <div class="col mb-20 mb-md-0">
        <div class="card-box pd-20" data-bgcolor="#455a64">
            <p class="h5 text-white mb-4">PROFIT & LOSS</p>
            <div class="d-flex justify-content-between align-items-center text-light">
                <div>Last month</div>
                <div>$ 974515.78</div>
            </div>
            <div class="d-flex justify-content-between align-items-center text-light">
                <div>This year</div>
                <div>$ 4792458</div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card-box pd-20" data-bgcolor="#218838">
            <p class="h5 text-white mb-4">INCOME & EXPENSE</p>
            <div class="d-flex justify-content-between align-items-center text-light">
                <div>Income this year</div>
                <div>$ 85977</div>
            </div>
            <div class="d-flex justify-content-between align-items-center text-light">
                <div>Expense this year</div>
                <div>$ 4878435</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md mb-20 mb-md-0">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">$ 7200.00</div>
                    <div class="font-14 text-secondary weight-500">Total Income (This year)</div>
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
                    <div class="weight-700 font-24 text-dark">$ 850.00</div>
                    <div class="font-14 text-secondary weight-500">Bills / Office Expense (This year)</div>
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
                    <div class="weight-700 font-24 text-dark">$ 1670.00</div>
                    <div class="font-14 text-secondary weight-500">Staff Salary (This year)</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#09cc06"><i class="icon-copy dw dw-wifi1"></i></div>
                </div>
            </div>
        </div>
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
