<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="container">
        <div class="section-title pb-5">
            <h2>Event</h2>
            <h3>Fatured <span>Event</span></h3>
            <p>Join our featured upcoming event to catch up with investor, startup, or talent.</p>
        </div>
        {{-- ini adalah bagian dari list event --}}
        <div class="row">
            <div class="col-lg-3">
                {{-- <div class="shadow p-2 mb-2 bg-white rounded"><button type="button" class="btn btn-outline-secondary btn-lg btn-block btn-sm ">All Event</button></div>
                    <div class="shadow p-2 mb-2 bg-white rounded"><button type="button" class="btn btn-outline-secondary btn-lg btn-block btn-sm ">Event Hari ini</button></div>
                    <div class="shadow p-2 mb-2 bg-white rounded"><button type="button" class="btn btn-outline-secondary btn-lg btn-block btn-sm "></button></div>
                    <div class="shadow p-2 mb-2 bg-white rounded"><button type="button" class="btn btn-outline-secondary btn-lg btn-block btn-sm "></button></div> --}}
                <button class="btn btn-sm btn-success" wire:click="besok">cek</button>
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
                    {{-- <option value="today">minggu ini</option>
        <option value="today">minggu depan</option> --}}
                    <option value="month">Bulan ini</option>
                    <option value="nextmonth">Bulan depan</option>
                </select>
                <div class="col-md-3">
                    <label for="search">search</label>
                    <input type="search" wire:model="search" id="search">
                </div>
                <label for="type">Event Status</label>
                <select wire:model="status" id="type">
                    <option value="">choose your Event</option>
                    <option value="online">online</option>
                    <option value="offline">offline</option>
                </select>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    @foreach ($event as $itemevent)
                    <div class="card">
                        <img src="{{asset('storage/'.$itemevent->foto)}}" class="card-img-top"
                            alt="{{$itemevent->title}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$itemevent->title}}</h5>
                            <p class="card-text">{!!$itemevent->description!!}</p>
                            <p class="card-text">{{$itemevent->priority->name}}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{$itemevent->start_date->diffForHumans()}}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
