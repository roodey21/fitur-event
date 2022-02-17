<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{$title ?? 'Detail Event | Siskubis Universitas Negeri Yogyakarta'}}</title>


    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Meta -->
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{$data->title}}" />
    <meta property="og:description" content="Lihat Selengkapnya......." />
    <meta property="og:image:secure_url" content="{{asset('storage/'.$data->foto)}}" />
    <meta property="og:image:type" content="image/" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="350" />
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="https://getstisla.com/dist/modules/chocolat/dist/css/chocolat.css"> --}}
    {{-- <script async defer src="https://getstisla.com/dist/modules/chocolat/dist/js/jquery.chocolat.min.js"></script> --}}
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <link rel="shortcut icon" href="http://siskubisdemo.com/theme/images/logo.png" type="image/png" />
</head>

<body class="layout-3">
    <div id="app">
        {{-- <div class="main-wrapper container">
        </div> --}}
        <section class="section container">
            <div class="section-body mt-5 container">
                <div class="col-12 col-sm-12 col-12">
                    <div class="card rounded-lg border border-secondary">
                        <div class="chocolat-parent">
                        
      
                            <figure>
                                <img src="{{asset('storage/'.$data->foto)}}" 
                                    alt="Responsive image" style="box-sizing: border-box;
                                    width: 100%;
                                    max-width: 100%;
                                    height: 60vh;
                                    object-fit: contain;
                                    object-position: center">
                            </figure>
                            
                           
                        </div>
                        <div class="container">
                            <div class="card-body">
                                <h3>{{$data->title}}</h3>
                                <div class="card-header-action">
                                    <div class="d-flex">
                                        <div class="mb-2 text-muted">Kategori :</div>
                                        &nbsp;
                                        <div class="mb-2 text-warning font-weight-bold">{{$data->priority->name ?? ''}}</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-sm-3 col-3">
                                        <h6 class="mb-2 font-weight-bold">Diselenggarakan Oleh</h6>
                                        <img alt="image" src="http://siskubisdemo.com/theme/images/logo.png"
                                            style="width: 80px" class="rounded-circle mr-1 mb-3">
                                        <p>Sistem Inkubasi Bisnis Universitas Negeri Yogyakarta</p>
                                    </div>
                                    <div class="col-12 col-sm-3 col-3">
                                        <h6 class="mb-3 font-weight-bold">Tanggal & Waktu</h6>
                                        <p><i class="far fa-calendar-alt " style="font-size: 17px"></i>&nbsp;
                                            {{ date('j M',strtotime($data->start_date)) }} -
                                            {{date('j M Y',strtotime($data->start_date))}}</p>
                                        <p><i class="far fa-clock " style="font-size: 17px"></i>&nbsp;
                                            {{date('H : i',strtotime($data->start_time))}} -
                                            {{date('H : i',strtotime($data->end_time))}}</p>
                                    </div>
                                    <div class="col-12 col-sm-3 col-3">
                                        <h6 class="mb-3 font-weight-bold">Lokasi</h6>
                                        @if ($data->type == 'offline')
                                            <p><i class="fas fa-map-marker-alt" style="font-size: 17px"></i>&nbsp;
                                            {{ $data->location}}</p>
                                        @else
                                        <p><i class="fas fa-map-marker-alt" style="font-size: 17px"></i>&nbsp;
                                            {{ $data->type}}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-sm-3 col-3 mb-3">
                                        <h6 class="mb-3 font-weight-bold">Bagikan</h6>
                                        <div class="d-flex">
                                            <button class="btn-sm btn btn-outline-success"
                                                onclick="copyToClipboard()"><i class="fas fa-link"></i> Copy
                                                Link</button> &nbsp; | &nbsp;
                                            <div id="fb-root"></div>
                                            <div class="fb-share-button" data-href="{{Request::url()}}"
                                                data-layout="button" style="font-size: 15px" data-size="large"><a
                                                    target="_blank"
                                                    href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8000%2Fevent-uny%2Fdetail%2F20&amp;src=sdkpreparse"
                                                    class="fb-xfbml-parse-ignore">facebook</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3 col-3">
                                        <h6 class="mb-2 font-weight-bold text-left">Deskripsi Event</h6>
                                        <p>
                                            <a class=" mt-2" data-toggle="collapse" href="#collapseExample"
                                                aria-expanded="false" aria-controls="collapseExample">
                                                Click Here !!!
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-3">

                                    <div class="container">
                                        <div class="collapse" id="collapseExample">
                                            <div class="">
                                                {!! $data->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- event rekomendasi --}}
                    <div class="mt-5 ">
                        <h6 class="mb-3 font-weight-bold">Rekomendasi untukmu</h6>
                        <div class="row">
                            {{-- <div class="col-12 col-sm-4 col-4"> --}}
                            @forelse ($relationalEvent as $berkaiten)
                             <div class="col-12 col-sm-3 col-3">
                                <div class="card shadow bg-white rounded-lg">
                                    {{-- <div class="mb-2 text-muted">Click the picture below to see the magic!</div> --}}
                                    <div class="chocolat-parent">
                                        {{-- <a href="{{asset('storage/'.$item->foto)}}" class="chocolat-image"
                                        title="{{$item->title}}"> --}}
                                        <div data-crop-image="">
                                            <img alt="image" src="{{asset('storage/'.$berkaiten->foto)}}"
                                                class="card-img-top"
                                                style="height:130px;object-fit:cover;object-position: center;">
                                        </div>
                                        {{-- </a> --}}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-dark ">{{ Str::limit($berkaiten->title, 40, '...') }}</p>
                                        <div class="card-header-action">
                                            <div class="mb-2 text-muted">{{ date('j M',strtotime($berkaiten->start_date)) }}
                                                -
                                                {{date('j M Y',strtotime($berkaiten->start_date))}}</div>
                                            <div class="mb-2 text-warning font-weight-bold">{{$berkaiten->priority->name ?? ''}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{route('event.details', $berkaiten->slug)}}" target="_blank"
                                                rel="noreferrer noopener"
                                                class="btn btn-outline-success btn-sm stretched-link"><i
                                                    class="fas fa-info-circle"></i>
                                                Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="mt-3 mb-5 ">
                        <h6 class="mb-3 font-weight-bold">Mungkin Kamu suka</h6>
                        <div class="row">
                            {{-- <div class="col-12 col-sm-4 col-4"> --}}
                            @forelse ($random as $item)
                            <div class="col-12 col-sm-3 col-3">
                                <div class="card shadow bg-white rounded-lg">
                                    {{-- <div class="mb-2 text-muted">Click the picture below to see the magic!</div> --}}
                                    <div class="chocolat-parent">
                                        {{-- <a href="{{asset('storage/'.$item->foto)}}" class="chocolat-image"
                                        title="{{$item->title}}"> --}}
                                        <div data-crop-image="">
                                            <img alt="image" src="{{asset('storage/'.$item->foto)}}"
                                                class="card-img-top"
                                                style="height:130px;object-fit:cover;object-position: center;">
                                        </div>
                                        {{-- </a> --}}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-dark ">{{ Str::limit($item->title, 40, '...') }}</p>
                                        <div class="card-header-action">
                                            <div class="mb-2 text-muted">{{ date('j M',strtotime($item->start_date)) }}
                                                -
                                                {{date('j M Y',strtotime($item->start_date))}}</div>
                                            <div class="mb-2 text-warning font-weight-bold">{{$item->priority->name ?? ''}}
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

                            @endforelse
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- General JS Scripts -->
    <script defer src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js">
    </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script defer src="{{asset('/assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script defer src="https://getstisla.com/dist/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script defer src="https://getstisla.com/dist/modules/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script defer src="{{asset('assets/js/scripts.js')}}"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script async defer type="text/javascript">
        function copyToClipboard(text) {
            var inputc = document.body.appendChild(document.createElement("input"));
            inputc.value = window.location.href;
            inputc.focus();
            inputc.select();
            document.execCommand('copy');
            inputc.parentNode.removeChild(inputc);
            window.scrollTo(0, 0);
            Swal.fire({
                // biar user tau 
                icon: 'success',
                title: 'Copied to Clipboard',
                showConfirmButton: false,
                timer: 2500
            })
        }

    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v12.0"
        nonce="p00wbdZC"></script>
</body>

</html>
