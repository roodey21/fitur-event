@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<h2>{{ ucfirst(trans($event->title)) }}</h2>
				<small>Created at : {{ $event->created_at->format('d M Y | h:i') }}</small>
				<h1 class="card-title text-danger font-weight-bold">
					{{ $event->tittle }}
				</h1>
				{{-- <small>{{ $berita->profil_user->nama }} - <b>SISKUBIS</b></small> --}}
				<figure>
				<img src="{{ asset("storage/" . $event->foto) }}" alt="{{ $event->slug }}" class="rounded mx-auto d-block" height="400px">
				</figure>
                <hr>
				<p class="text-justify">{!! $event->description !!}</p>
			</div>
		</div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <dl>
                    <dt>Tanggal mulai</dt>
                    <dd>{{ $event->start_date->format('d M Y') }}</dd>
                    <dt>Tanggal selesai</dt>
                    <dd>{{ $event->end_date->format('d M Y') }}</dd>
                    <dt>Waktu event</dt>
                    <dd>{{ $event->start_time->format('h:i') }} - {{ $event->end_time->format('h:i') }}</dd>
                    <dt>Tipe event</dt>
                    <dd>{{ $event->type }}</dd>
                    <dt>Lokasi event</dt>
                    <dd>{{ $event->location }}</dd>
                    <dt>Priority event</dt>
                    <dt><span class="badge {{ $event->priority_id == 1 ? 'badge-success':'' }}{{ $event->priority_id == 2 ? 'badge-primary':'' }}{{ $event->priority_id == 3 ? 'badge-warning':'' }}{{ $event->priority_id == 4 ? 'badge-danger':'' }}">{{ $event->priority->name  ?? 'Semua Priority'}}</span></dt>
                  </dl>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection
