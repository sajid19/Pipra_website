@extends('administrative.layouts.master')
@section('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard-css/dashboard-css.css') }}">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        margin-top: 20px;
        /* background-color: #d3d7ff !important; */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 2rem;
        font-weight: bold;
        color: black;
    }
</style>
@endsection
@section('content')
<div class="dash container">
    <div class="user-intro">
        <h2>Welcome Back!</h1>
            <h4>{{ auth()->user()->name }}</h3>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Views</h5>
                    <p class="card-text">{{ $totalViews }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div id="container" style="height: 400px; width: auto; background:transparent"></div>
    </div>
</div>
@endsection
@section('page-js')
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script>
    var categories = @json($categories);
    var seriesData = @json($seriesData);
    var text = "Viewer count Linechart of {{date('M, Y')}}"
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            marginBottom: 80
        },
        title: {
            text: text
        },
        xAxis: {
            categories: categories,
            labels: {
                rotation: 90
            }
        },

        series: [{
            name: 'View Count',
            data: seriesData
        }]
    });
</script>
@endsection