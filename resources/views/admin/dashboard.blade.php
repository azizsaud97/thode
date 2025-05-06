@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> لوحة تحكم المشرف</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
            </ul>
        </div>

        <!-- Dashboard Summary Cards -->
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                        <h4>عدد المالكين</h4>
                        <p><b>{{ $totalOwners }}</b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-microchip fa-3x"></i>
                    <div class="info">
                        <h4>إجمالي الأجهزة</h4>
                        <p><b>{{ $totalDevices }}</b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon"><i class="icon fa fa-paw fa-3x"></i>
                    <div class="info">
                        <h4>إجمالي عدد الإبل</h4>
                        <p><b>{{ $totalCamels }}</b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-small danger coloured-icon"><i class="icon fa fa-heartbeat fa-3x"></i>
                    <div class="info">
                        <h4>السجلات الصحية</h4>
                        <p><b>{{ $totalHealthRecords }}</b></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Line Chart Section -->
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card shadow-lg p-4">
                    <h4 class="text-center text-primary font-weight-bold">نمو عدد المالكين والإبل بمرور الوقت</h4>
                    <div id="owner-camel-growth-chart"></div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('js')
    <!-- ApexCharts Library -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ownerGrowthData = @json($ownerGrowth);
            var camelGrowthData = @json($camelGrowth);

            var months = ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'];

            var ownerCounts = ownerGrowthData.map(item => item.count);
            var camelCounts = camelGrowthData.map(item => item.count);
            var labels = ownerGrowthData.map(item => months[item.month - 1] + ' ' + item.year);

            var options = {
                series: [
                    {
                        name: "عدد المالكين",
                        data: ownerCounts
                    },
                    {
                        name: "عدد الإبل",
                        data: camelCounts
                    }
                ],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                title: {
                    text: 'نمو المالكين والإبل بمرور الوقت',
                    align: 'center'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        opacity: 0.5
                    }
                },
                xaxis: {
                    categories: labels
                }
            };

            var chart = new ApexCharts(document.querySelector("#owner-camel-growth-chart"), options);
            chart.render();
        });
    </script>
@endpush
