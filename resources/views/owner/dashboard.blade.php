@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> لوحة تحكم المالك</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
            </ul>
        </div>

        <!-- Dashboard Summary Cards -->
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-paw fa-3x"></i>
                    <div class="info">
                        <h4>إجمالي عدد الإبل</h4>
                        <p><b>{{ $totalCamels }}</b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="widget-small danger coloured-icon"><i class="icon fa fa-exclamation-triangle fa-3x"></i>
                    <div class="info">
                        <h4>الحالات الصحية الحرجة</h4>
                        <p><b>{{ $totalHealthAlerts }}</b></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Line Chart Section -->
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card shadow-lg p-4">
                    <h4 class="text-center text-primary font-weight-bold">نمو الإبل والحالات الصحية بمرور الوقت</h4>
                    <div id="camel-growth-chart"></div>
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
            var camelGrowthData = @json($camelGrowth);
            var healthReportsData = @json($healthReports);

            var months = ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'];

            var camelCounts = camelGrowthData.map(item => item.count);
            var healthCounts = healthReportsData.map(item => item.count);
            var labels = camelGrowthData.map(item => months[item.month - 1] + ' ' + item.year);

            var options = {
                series: [
                    {
                        name: "عدد الإبل",
                        data: camelCounts
                    },
                    {
                        name: "الحالات الصحية",
                        data: healthCounts
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
                    text: 'عدد الإبل والحالات الصحية',
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

            var chart = new ApexCharts(document.querySelector("#camel-growth-chart"), options);
            chart.render();
        });
    </script>
@endpush
