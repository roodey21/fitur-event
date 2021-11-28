<div>
    {{-- Be like water. --}}
    <section class="breadcrumbs"></section>
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
