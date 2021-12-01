<div>
    {{-- Be like water. --}}
    <section class="breadcrumbs"></section>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <img class="card-img-top" src="{{asset('storage/'.$eventid->foto)}}" alt="Card image cap">
                <h3>
                    {{ $eventid->title }}
                </h3>
                <span><a href="">Tipe Event</a></span>
                <hr>
                <div class="text">
                    <div class="row">
                        <div class="col-6">
                            <h6>Tanggal & Waktu</h6>
                            <span>
                                1 Des 2021
                            </span>
                        </div>
                        <div class="col-6">
                            <h6>
                                Lokasi
                            </h6>
                            <span>
                                Lokasi online
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="d-flex flex-wrap">
            <div class="card" style="width: 15rem;">
                <img class="card-img-top" src="{{asset('storage/'.$eventid->foto)}}" alt="Card image cap">
                <div class="card-body">
                    {{-- <a href=""class="card-title"{{$eventid->title}}></a> --}}
                    {{-- <h5 href="{{route('event.details', $eventid->id)}}" class="card-title">
                    {{$eventid->title}}</h5> --}}
                    <p class="card-title">{{$eventid->title}}</p>
                    <p class="card-text">{!!$eventid->description!!}</p>
                    <p class="card-text">{{$eventid->priority->name}}</p>
                    <small class="text-muted">{{$eventid->start_date->diffForHumans()}}</small>
                </div>
            </div>
        </div>
    </div>
</div>
