@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<h1>{{ $event->title }}</h1>
				<small>{{ $event->created_at->format('d M Y | h:i') }}</small>
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
</div>
@endsection
@section('js')
@endsection
