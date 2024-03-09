@extends('admin.layouts.layout')
@section('title',__('keyword.dashboard'))
@section('content')
{{-- <div class="row">
    <!-- order-card start -->
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-body">
                <h6 class="text-white">Orders Received</h6>
                <h2 class="text-end text-white"><i class="feather icon-shopping-cart float-start"></i><span>486</span></h2>
                <p class="m-b-0">Completed Orders<span class="float-end">351</span></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-body">
                <h6 class="text-white">Total Sales</h6>
                <h2 class="text-end text-white"><i class="feather icon-tag float-start"></i><span>1641</span>
                </h2>
                <p class="m-b-0">This Month<span class="float-end">213</span></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-body">
                <h6 class="text-white">Revenue</h6>
                <h2 class="text-end text-white"><i
                        class="feather icon-repeat float-start"></i><span>$42,562</span></h2>
                <p class="m-b-0">This Month<span class="float-end">$5,032</span></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-red order-card">
            <div class="card-body">
                <h6 class="text-white">Total Profit</h6>
                <h2 class="text-end text-white"><i
                        class="feather icon-award float-start"></i><span>$9,562</span></h2>
                <p class="m-b-0">This Month<span class="float-end">$542</span></p>
            </div>
        </div>
    </div>
    <!-- order-card end -->
</div> --}}
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('keyword.graduated-students-statistics') }}</h3>
            </div>
            <div class="card-body px-0 py-0">
                <div id="studnet-graduation-statistic" style="height:65vh"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        (function () {
            var options = {
                chart: {
                    height: 600,
                    type: 'bar',
                    zoom: {
                        enabled: true
                    },
                    toolbar: {
                        show: true,
                    }
                },

                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 3,
                    curve: 'straight',
                },
                xaxis: {
                    categories: {!!  json_encode($years, JSON_PRETTY_PRINT) !!},
                },
                colors: ["#4099ff"],
                series: [{
                    name: "{!! __('keyword.students') !!}",
                    data: {!!  json_encode($students, JSON_PRETTY_PRINT) !!}
                }],
                grid: {
                    row: {
                        colors: ['#f3f6ff', 'transparent'],
                        opacity: 0.5
                    }
                },
            }
            var chart = new ApexCharts(document.querySelector("#studnet-graduation-statistic"), options);
            chart.render();
        })();
    });
</script>
@endsection

