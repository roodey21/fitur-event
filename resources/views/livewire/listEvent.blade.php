<div>
        <section class="section mt-5">
            <div class="container mt-5">
                <div class="section-header">
                    <h1>Event Siskubis</h1>
                    <div class="section-header-breadcrumb">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-3 col-3">
                        <div class="card card-info">
                            <div class="card-body">
                                <h4 class="text-dark">Filter</h4>
                                <hr class="bg-secoundary">
                                <div class="card shadow-sm rounded">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h4 style="font-size: 16px" class="text-dark">Priority</h4>
                                            <div class="card-header-action">
                                                <a data-collapse="#mycard-collapse1" class="btn"><i
                                                        class="fas fa-minus"></i></a>
                                                @if ($filter)
                                                <div data-dismiss="#mycard-dimiss1" role="button"
                                                    wire:click="resetFilter" class=" btn btn-outline-danger btn-sm "><i
                                                        class="far fa-times-circle"></i></div>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="card-text">
                                            @isset($filter)
                                            @switch($filter)
                                            @case(1)
                                            Proposal
                                            @break
                                            @case(2)
                                            Pra Start UP
                                            @break
                                            @case(3)
                                            Start Up
                                            @break
                                            @case(4)
                                            Scale Up
                                            @break
                                            @case(5)
                                            Semua Tenant
                                            @break
                                            @default
                                            @endswitch
                                            @endisset
                                        </p>
                                    </div>
                                    <div class="collapse" id="mycard-collapse1">
                                        <div class="form-group">
                                            <div class="container">
                                                @foreach ($category as $item)
                                                <label class="">
                                                    <input type="radio" wire:model.debounce.100ms="filter"
                                                        value="{{$item->id}}" class="selectgroup-input">
                                                    <span class="selectgroup-button">{{$item->name}}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!---------------------------------------->
                                <div class="card shadow-sm rounded">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h4 style="font-size: 16px" class="text-dark">waktu</h4>
                                            <div class="card-header-action">
                                                <a data-collapse="#mycard-collapse2" class="btn"><i
                                                        class="fas fa-minus"></i></a>
                                                @if ($waktu)
                                                <div data-dismiss="#mycard-dimiss1" role="button"
                                                    wire:click="resetWaktu" class=" btn btn-outline-danger btn-sm "><i
                                                        class="far fa-times-circle"></i></div>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="card-text">
                                            @isset($waktu)
                                            @switch($waktu)
                                            @case('all')
                                            Semua waktu
                                            @break
                                            @case('today')
                                            Hari ini
                                            @break
                                            @case('this-week')
                                            Minggu ini
                                            @break
                                            @case('next-week')
                                            Minggu depan
                                            @break
                                            @case('this-month')
                                            Bulan ini
                                            @break
                                            @case('next-month')
                                            Bulan depan
                                            @break
                                            @default
                                            @endswitch
                                            @endisset
                                        </p>
                                    </div>
                                    <div class="collapse" id="mycard-collapse2">
                                        <div class="form-group">
                                            <div class="container">
                                                <label class="">
                                                    <input type="radio" wire:model.debounce.100ms="waktu" value="all"
                                                        class="selectgroup-input">
                                                    <span class="selectgroup-button">Semua waktu</span>
                                                </label>
                                                <label class="">
                                                    <input type="radio" wire:model.debounce.100ms="waktu" value="today"
                                                        class="selectgroup-input" checked="">
                                                    <span class="selectgroup-button">Hari ini</span>
                                                </label>
                                                <label class="">
                                                    <input type="radio" wire:model.debounce.100ms="waktu"
                                                        value="this-week" class="selectgroup-input">
                                                    <span class="selectgroup-button">Minggu ini</span>
                                                </label>
                                                <label class="">
                                                    <input type="radio" wire:model.debounce.100ms="waktu"
                                                        value="next-week" class="selectgroup-input">
                                                    <span class="selectgroup-button">Minggu depan</span>
                                                </label>
                                                <label class="">
                                                    <input type="radio" wire:model.debounce.100ms="waktu"
                                                        value="this-month" class="selectgroup-input">
                                                    <span class="selectgroup-button">Bulan ini</span>
                                                </label>
                                                <label class="">
                                                    <input type="radio" wire:model.debounce.100ms="waktu"
                                                        value="next-month" class="selectgroup-input">
                                                    <span class="selectgroup-button">Bulan depan</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!---------------------------------------->
                                <div class="card shadow-sm rounded">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h4 style="font-size: 16px" class="text-dark">Lokasi</h4>
                                            <div class="card-header-action">
                                                <a data-collapse="#mycard-collapse3" class="btn"><i
                                                        class="fas fa-minus"></i></a>
                                                @if ($status)
                                                <div data-dismiss="#mycard-dimiss1" role="button"
                                                    wire:click="resetStatus" class=" btn btn-outline-danger btn-sm "><i
                                                        class="far fa-times-circle"></i></div>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="card-text">
                                            @isset($status)
                                            @switch($status)
                                            @case('online')
                                            Online
                                            @break
                                            @case('offline')
                                            Offline
                                            @break
                                            @default
                                            @endswitch
                                            @endisset
                                        </p>
                                    </div>
                                    <div class="collapse" id="mycard-collapse3">
                                        <div class="form-group">
                                            <div class="container">
                                                <label class="">
                                                    <input type="radio" wire:model.debounce.100ms="status"
                                                        value="all" class="selectgroup-input">
                                                    <span class="selectgroup-button">Semua Lokasi</span>
                                                </label>
                                                <label class="">
                                                    <input type="radio" wire:model.debounce.100ms="status"
                                                        value="online" class="selectgroup-input">
                                                    <span class="selectgroup-button">Online</span>
                                                </label>
                                                <label class="">
                                                    <input type="radio" wire:model.debounce.100ms="status"
                                                        value="offline" class="selectgroup-input">
                                                    <span class="selectgroup-button">Offline</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow-sm rounded">
                                    {{-- <input type="text" wire:model="slug" name="" id="">
                                    <button class="btn btn-sm btn-succeess" wire:click="slug()">cek slug</button> --}}
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h4 style="font-size: 16px" class="text-dark">Search</h4>
                                            <div class="card-header-action">
                                                <a data-collapse="#mycard-collapse4" class="btn"><i
                                                        class="fas fa-minus"></i></a>
                                                @if ($search)
                                                <div data-dismiss="#mycard-dimiss1" role="button"
                                                    wire:click="resetSearch" class=" btn btn-outline-danger btn-sm "><i
                                                        class="far fa-times-circle"></i></div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="container">
                                        <div class="form-group">
                                            <input class="form-control" type="search" wire:model.debounce.100ms="search"
                                                id="search" placeholder="Cari Event Seacara RealTime">
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-9 col-9">
                        <div class="row">
                            @forelse ($event as $item)
                            <div class="col-12 col-sm-3 col-3">
                                <div class="card shadow bg-white rounded-lg">
                                    
                                    <div class="chocolat-parent">
                                    
                                        <div data-crop-image="">
                                            <img alt="image" src="{{asset('storage/'.$item->foto)}}"
                                                class="card-img-top"
                                                style="width: 100%;
                                                height: 15vw;
                                                object-fit: cover;">
                                        </div>
                                      
                                    </div>
                                    <div class="card-body">
                                        <p class="text-dark ">{{ Str::limit($item->title, 40, '...') }}</p>
                                        <div class="card-header-action">
                                            <div class="mb-2 text-muted">{{ date('j M',strtotime($item->start_date)) }}
                                                -
                                                {{date('j M Y',strtotime($item->start_date))}}</div>
                                            <div class="mb-2 text-warning font-weight-bold">{{$item->priority->name ?? "Semua Priority"}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{route('event.details', $item->slug)}}" target="_blank"
                                                rel="noreferrer noopener"
                                                class="btn btn-outline-success btn-sm stretched-link"><i
                                                    class="fas fa-info-circle"></i>
                                                Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @empty
                            <div class="col-12 col-md-2 col-2"></div>
                            <div class="col-12 col-md-5 col-5">
                                <div class="container">

                                    <div class="d-flex justify-content-center">
                                        <div class="">
                                            <img class="img-fluid" style=";
                                                                        object-fit: cover;
                                                                        object-position: center;"
                                                src="{{asset('/assets/img/drawkit/drawkit-nature-man-colour.svg')}}"
                                                alt="image-fluid">
                                            <h2 class="mt-0 text-center">Event Not Found</h2>
                                            <p class="lead text-center">
                                                We couldn't find the event you were looking for. Please check the event
                                                again
                                                and try again
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-1 col-1"></div>
                            @endforelse
                        </div>
                    </div>
                    <div class="container">
                        <div class="text-center mt-4 ">
                            @if ($totalRecord >= $get && $cek == true)
                            <button wire:click="loadMore" class="btn btn-sm btn-outline-success">Muat Lebih
                                Banyak</button>
                            @endif
                        </div>
                        <div class="d-flex flex-row-reverse bd-highlight">
                            @if ($this->filter || $this->status || $this->waktu || Str::length( $this->search)>3)
                            {{ $event->onEachSide(2)->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    {{-- </div> --}}
</div>
