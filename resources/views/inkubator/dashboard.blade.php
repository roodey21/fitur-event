@extends('layouts.app')

@section('breadcrumb')
<div class="breadcrumb">
	<h1 class="mr-2">Dashboard Inkubator</h1>
</div>
@endsection
@section('content')
<div class="separator-breadcrumb border-top"></div>
<div class="row">
	<div class="col-lg-6 col-md-12">
		<!-- CARD ICON-->
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="card card-icon mb-4">
					<div class="card-body text-center"><i class="i-Data-Upload"></i>
						<p class="text-muted mt-2 mb-2">Total Event</p>
						<p class="text-primary text-24 line-height-1 m-0">{{$event->count()}}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="card card-icon mb-4">
					<div class="card-body text-center"><i class="i-Add-User"></i>
						<p class="text-muted mt-2 mb-2">Event Published</p>
						<p class="text-primary text-24 line-height-1 m-0">{{$event->where('publish', 1)->count()}}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="card card-icon mb-4">
					<div class="card-body text-center"><i class="i-Money-2"></i>
						<p class="text-muted mt-2 mb-2">Event Draft</p>
						<p class="text-primary text-24 line-height-1 m-0">{{$event->where('publish', 2)->count()}}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="card card-icon mb-4">
					<div class="card-body text-center"><i class="i-Money-2"></i>
						<p class="text-muted mt-2 mb-2">Event Finished</p>
						<p class="text-primary text-24 line-height-1 m-0">4021</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="card card-icon mb-4">
					<div class="card-body text-center"><i class="i-Money-2"></i>
						<p class="text-muted mt-2 mb-2">Total Peserta</p>
						<p class="text-primary text-24 line-height-1 m-0">4021</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="card card-icon mb-4">
					<div class="card-body text-center"><i class="i-Money-2"></i>
						<p class="text-muted mt-2 mb-2">Event Draft</p>
						<p class="text-primary text-24 line-height-1 m-0">4021</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6 col-md-12">
		<div class="row">
			<div class="col-md-12">
				<div class="card mb-4">
					<div class="card-body">
						<div class="card-title"> Event Statistic chart</div>
						<div id="basicColumn-chart"></div>
					</div>
				</div>
			</div>
		</div>
</div>
@endsection

@section('js')
	<script src="{{ asset('theme/js/scripts/apexChart.script.min.js')}}"></script>
	<script src="{{ asset('theme/js/scripts/apexcharts.dataseries.js')}}"></script>
	<script src="{{ asset('theme/js/scripts/apexColumnChart.script.min.js')}}"></script>

	<script></script>
@endsection
