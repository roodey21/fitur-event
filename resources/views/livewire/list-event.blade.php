{{-- tambahin ini bang biar nggak kepotong bagian atasnya --}}
<div>
    <section class="breadcrumbs"></section>
    {{-- sama div dikasih class mt-4 biar ada sedikit space antar section --}}
    <div class="mt-3">
        {{-- If your happiness depends on money, you will never be happy with yourself. --}}
        {{-- <div class="span" style=""></div> --}}
        <div class="container">
            <div class="section-title pb-5">
                <h2>Event</h2>
                <h3>Featured <span>Event</span></h3>
                <p>Join our featured upcoming event to catch up with investor, startup, or talent.</p>
            </div>
            {{-- ini adalah bagian dari list event --}}
            <div class="row">
                <div class="col-lg-3">
                    <div class="shadow p-2 mb-2 bg-white rounded"></div>
                    <div class="shadow p-2 mb-2 bg-white rounded"><button type="button"
                            class="btn btn-outline-secondary btn-lg btn-block btn-sm ">Event Hari ini</button></div>
                    <div class="shadow p-2 mb-2 bg-white rounded"><button type="button"
                            class="btn btn-outline-secondary btn-lg btn-block btn-sm "></button></div>
                    <div class="shadow p-2 mb-2 bg-white rounded"><button type="button"
                            class="btn btn-outline-secondary btn-lg btn-block btn-sm "></button></div>
                    <label for="category">category Event</label>
                    <select wire:model="filter" id="category">
                        <option value="">default</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <label for="">Waktu Event</label>
                    <select class="shadow p-2 mb-2 bg-white rounded" wire:model="waktu" id="">
                        <option value="">All event</option>
                        <option value="today">Hari ini</option>
                        <option value="tomorrow">besok</option>
                        <option value="today">akhir pekan</option>
                        <option value="today">minggu ini</option>
                        <option value="today">minggu depan</option>
                        <option value="month">Bulan ini</option>
                        <option value="nextmonth">Bulan depan</option>
                    </select>
                    <label for="type">Event Status</label>
                    <select wire:model="status" id="type">
                        <option value="">choose your Event</option>
                        <option value="online">online</option>
                        <option value="offline">offline</option>
                    </select>
                    <label for="search">search</label>
                    <input type="search" wire:model.debounce.500ms="search" id="search">
                    @if (strlen($search)>2)
                    <div class="absolute rounded">
                        <div wire:loading wire:target="search" class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        @if ($searchResult->count() > 0)
                        <ul class="list-unstyled">
                            @foreach ($searchResult as $result)
                            <li class="media">
                                <img src="{{asset('storage/'.$result['foto'])}}" style="width: 5rem;" class="mr-3"
                                    alt="...">
                                <div class="media-body">
                                    <a href="{{route('event.details', $result->id)}}" rel="noreferrer noopener">{{$result->title}}</a>
                                </div>
                            </li>
                            {{-- </ul> --}}
                            {{-- <li>
                                <a href="{{route('event.details', $result->id)}}">{{$result->title}}</a>
                            <img src="{{asset('storage/'.$result['foto'])}}" class="rounded-sm float-left"
                                alt="{{$result->title}}">
                            </li> --}}
                            @endforeach
                        </ul>
                        @else
                        <div class="px-3 py-4">No result {{$search}}</div>
                        @endif
                    </div>
                    @endif
                </div>
                <div class="col-lg-9">
                    <div class="d-flex flex-wrap">
                        @if ($event->count()>0)
                        @foreach ($event as $itemevent)
                        <div class="card" style="width: 15rem;">
                            <img class="card-img-top" src="{{asset('storage/'.$itemevent->foto)}}" alt="Card image cap">
                            <div class="card-body">
                                {{-- <a href=""class="card-title"{{$itemevent->title}}></a> --}}
                                {{-- <h5 href="{{route('event.details', $itemevent->id)}}" class="card-title">
                                {{$itemevent->title}}</h5> --}}
                                <a href="{{route('event.details', $itemevent->id)}}" class="card-title"
                                    target="_blank" rel="noreferrer noopener">{{$itemevent->title}}</a>
                                <p class="card-text">{!!$itemevent->description!!}</p>
                                <p class="card-text">{{$itemevent->priority->name}}</p>
                                <small class="text-muted">{{$itemevent->start_date->diffForHumans()}}</small>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="p-3 mb-2 bg-secondary text-white">No data</div>
                        <img src="{{asset('frontend2\img\team\null.png')}}" alt="No Data">
                        @endif
                    </div>
                </div>
                @if ($totalRecord >= $get)
                <button wire:click="loadMore" class="btn btn-sm btn-success">Load More</button>
                @endif
            </div>
            {{-- <div wire:loading wire:target="waktu" id="preloader"></div>
            <div wire:loading wire:target="status" id="preloader"></div> --}}
        </div>
    </div>
</div>
