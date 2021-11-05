<div class="row">
    @forelse ($data as $event)
    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
        <img src="{{ asset('storage/'.$event->foto) }}" alt="" class="card-img-top responsive" style="height: 120px">
    </div>
    <div class="col-lg-9 col-md-9">
        <h6>
            <a>{{ Str::upper($event->title)  }}</a>
        </h6>
        <p class="card-text">
            <i class="icofont-clock-time mr-2"></i><small class="">Waktu :
                {{ $event->start_date->format('d M Y') }} -
                {{ $event->end_date->format('d M Y') }}</small>
        </p>
        <p class="card-text">
            <i class="icofont-location-pin mr-2"></i><small class="">Lokasi :
                {{ $event->type == 'offline' ? $event->location : 'online' }}</small>
        </p>
        <br>
        <button type="button" wire:click="getModal({{$event->id}})" class="btn btn-primary" data-toggle="modal"
            data-target="#exampleModalCenter">
            details event all
        </button>
    </div>
    @empty
    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member">
            <div class="member-img">
                <img src="{{asset('frontend2/img/team/112233.png')}}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    @endforelse
    <div class="modal fade" wire:ignore.self id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card mb-3">
                        <img src="{{ asset('storage/'.$image) }}" class="card-img-top responsive" alt="{{$title}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$title}}</h5>
                            <p class="card-text">{!!$description!!}</p>
                            <p class="card-text"><small class="text-muted">{{$created}}</small></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center pt-5">
        <button class="btn btn-primary" wire:click="addEvent" {{$mati}}>Load More<i
                class="icofont-arrow-right"></i></button>
    </div>
</div>
