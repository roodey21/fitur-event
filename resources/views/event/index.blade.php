@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        {{-- Tambah event --}}
        <div class="card mb-4">
            <div class="card-header container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Event</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        @role('inkubator')
                        <a href="{{route('inkubator.event-calendar')}}" data-toggle="tooltip" data-placement="top"
                            title="Calendar"><button class="btn btn-primary custom-btn btn-sm"><i
                                    class="i-Calendar-4"></i></button></a>
                        @endrole
                        @role('mentor')
                        <a href="{{route('mentor.event-calendar')}}" data-toggle="tooltip" data-placement="top"
                            title="Calendar"><button class="btn btn-primary custom-btn btn-sm"><i
                                    class="i-Calendar-4"></i></button></a>
                        @endrole
                        @role('tenant')
                        <a href="{{route('tenant.event-calendar')}}" data-toggle="tooltip" data-placement="top"
                            title="Calendar"><button class="btn btn-primary custom-btn btn-sm"><i
                                    class="i-Calendar-4"></i></button></a>
                        @endrole
                    </div>
                </div>
            </div>
            @role('inkubator')
            <div class="card-body">
                <div class="create_event_wrap">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-primary btn-block" data-toggle="modal"
                            data-target="#inputModal">Buat Event</button>
                    </div>
                </div>
            </div>
            @endrole
        </div>
        {{-- Tambah event end --}}
        {{-- Menu Filter --}}
        @role(['inkubator', 'mentor'])
        <div class="card mb-4">
            <div class="card-header container-fluid">
                <div class="row">
                    <div class="col">
                        <h3>Filter</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="search">Pencarian</label>
                    <div class="input-group">
                        <input type="text" name="titles" class="form-control" placeholder="search"
                            value="{{ $title != null ? $title : null }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="daterange">Rentang tanggal</label>
                    <input type="text" name="daterange" class="form-control" placeholder="set tanggal" @if($exp !='' )
                        value="{!! \Carbon\Carbon::parse($exp['0'])->format('d M Y') !!} - {!! \Carbon\Carbon::parse($exp['1'])->format('d M Y') !!}"
                        @endif>
                </div>
                <div class="form-group">
                    <label for="priority">Priority</label>
                    @foreach ($priority as $item)
                    <label class="checkbox checkbox-success">
                        <input type="checkbox" name="priority" value="{{ $item->id }}" @if (in_array($item->id,
                        explode(',', request()->input('filter.priority'))))
                        checked
                        @endif
                        /><span>{{ $item->name }}</span><span class="checkmark"></span>
                    </label>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="publish">Status</label>
                    <label class="checkbox checkbox-primary">
                        <input type="checkbox" value="1" name="publish" @if (in_array('1', explode(',',
                            request()->input('filter.publish'))))
                        checked
                        @endif
                        /><span>Published</span><span class="checkmark"></span>
                    </label>
                    <label class="checkbox checkbox-warning">
                        <input type="checkbox" value="0" name="publish" @if (in_array('0', explode(',',
                            request()->input('filter.publish'))))
                        checked
                        @endif
                        /><span>Draft</span><span class="checkmark"></span>
                    </label>
                </div>
                <div class="form-group">
                    <button id="filter" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </div>
        @endrole
    </div>
    <div class="col-md-9">
        <div id="task-manager-list">
            <!--  content area -->
            <div class="content">
                <!--  task manager table -->
                <div class="card" id="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered custom-sm-width table-striped" id="names"
                                style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Event Name</th>
                                        <th scope="col">Priority</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Tanggal Mulai</th>
                                        <th scope="col">Tanggal Selesai</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Latest Update</th>
                                        @role('inkubator')
                                        <th scope="col">Action</th>
                                        @endrole
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- --------------------------- table row -------------------------------------------->
                                    @foreach ($event as $key => $item)
                                    <tr>
                                        <th class="head-width" scope="row">{{ $event->firstItem() + $key }}</th>
                                        <td class="collection-item">
                                            @role('inkubator')
                                            <div class="font-weight-bold"><a
                                                    href="/inkubator/event/{{ $item->slug }}">{{ $item->title }}</a>
                                            </div>
                                            @endrole
                                            @role('mentor')
                                            <div class="font-weight-bold"><a
                                                    href="/mentor/event/{{ $item->slug }}">{{ $item->title }}</a></div>
                                            @endrole
                                            @role('tenant')
                                            <div class="font-weight-bold"><a
                                                    href="/tenant/event/{{ $item->slug }}">{{ $item->title }}</a></div>
                                            @endrole
                                            <div class="text-muted"></div>
                                        </td>
                                        @role(['mentor', 'inkubator'])
                                        <td class="custom-align">
                                            <div class="btn-group">
                                                @if ( $item->priority->id == 1 )
                                                <button class="btn btn-primary custom-btn btn-sm" type="button"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    {{ $item->priority->name }}
                                                </button>
                                                @elseif( $item->priority->id == 2 )
                                                <button class="btn btn-danger custom-btn btn-sm" type="button"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    {{ $item->priority->name }}
                                                </button>
                                                @elseif( $item->priority->id == 3 )
                                                <button class="btn btn-warning custom-btn btn-sm" type="button"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    {{ $item->priority->name }}
                                                </button>
                                                @elseif( $item->priority->id == 4 )
                                                <button class="btn btn-warning custom-btn btn-sm" type="button"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    {{ $item->priority->name }}
                                                </button>
                                                @else
                                                <button class="btn btn-info custom-btn btn-sm" type="button"
                                                    aria-haspopup="true" aria-expanded="false">
                                                </button>
                                                @endif
                                            </div>
                                        </td>
                                        @endrole
                                        <td class="custom-align">
                                            <div class="btn-group">
                                                @if ( $item->type == 'online' )
                                                <button class="btn btn-primary custom-btn btn-sm" type="button">
                                                    Online
                                                </button>
                                                @else
                                                <button class="btn btn-secondary custom-btn btn-sm" type="button">
                                                    Offline
                                                </button>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="custom-align">
                                            <div class="d-inline-flex align-items-center calendar align-middle"><i
                                                    class="i-Calendar-4"></i><span>{{ $item->start_date->format("d M Y") }}</span>
                                            </div><br>
                                            <div class="d-inline-flex align-items-center calendar align-middle"><i
                                                    class="i-Clock"></i><span>{{ $item->start_time->format("H:i") }}</span>
                                            </div>
                                        </td>
                                        <td class="custom-align">
                                            <div class="d-inline-flex align-items-center calendar align-middle"><i
                                                    class="i-Calendar-4"></i><span>{{ $item->end_date->format("d M Y") }}</span>
                                            </div><br>
                                            <div class="d-inline-flex align-items-center calendar align-middle"><i
                                                    class="i-Clock"></i><span>{{ $item->end_time->format("H:i") }}</span>
                                            </div>
                                        </td>
                                        <td class="custom-align">
                                            @if ($item->publish == 2)
                                            <button class="btn btn-sm btn-primary">Finished</button>
                                            @elseif ($item->publish == 1)
                                            <button class="btn btn-sm btn-primary">Published</button>
                                            @elseif ($item->publish == 0)
                                            <button class="btn btn-sm btn-primary">Draft</button>
                                            @endif
                                            {{-- {!! $item->publish == 1 ? '<button class="btn btn-sm btn-primary">Published</button>' : '<button class="btn btn-sm btn-warning">Draft</button>' !!} --}}
                                        </td>
                                        <td class="custom-align">
                                            <div class="d-inline-flex align-items-center calendar align-middle"><i
                                                    class="i-Calendar-4"></i><span></span></div>
                                        </td>
                                        @role('inkubator')
                                        <td><a class="ul-link-action text-success"
                                                href="/inkubator/event/{{ $item->slug }}/edit" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="i-Edit"></i></a><a
                                                class="ul-link-action text-danger mr-1 hapus"
                                                href="/inkubator/event/{{ $item->slug }}/delete" data-toggle="tooltip"
                                                data-placement="top" title="Want To Delete !!!"><i
                                                    class="i-Eraser-2"></i></a>
                                            @endrole
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--  end of task manager table -->
                        </div>
                    </div>
                    <!--  end of content area -->
                </div>
            </div>
        </div>
    </div>

    @role('inkubator')
    <!-- Modal -->
    <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Buat Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form input modal -->
                    <form action={{ route('inkubator.event.store') }} method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col d-flex justify-content-center">
                                <div class="drop-zone">
                                    <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                    <input type="file" name="foto" id="exampleInputFile" for="exampleInputFile"
                                        class="drop-zone__input" required>
                                        @error('foto')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="title" required>
                            @error('title')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="wrapper">
                            <img id="output_image" class="img-fluid">
                        </div>
                        <div class="form-group">
                            <label for="description">Event</label>
                            <textarea name="description" id="description" required class="form-control"></textarea>
                            @error('description')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tgl_mulai">Tanggal Mulai :</label>
                                <div class="input-group">
                                    <input type="date" name="start_date" class="form-control" id="start_date" required>
                                    <input type="time" name="start_time" class="form-control" id="start_time" required>
                                </div>
                                @error('start_date')
                                <div class="mt-2 text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                @error('start_time')
                                <div class="mt-2 text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tgl_selesai">Tanggal Selesai</label>
                                <div class="input-group">
                                    <input type="date" name="end_date" class="form-control" id="end_date" required>
                                    <input type="time" name="end_time" class="form-control" id="end_time" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="type">Tipe Event</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="offline">offline</option>
                                    <option value="online">online</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="location" id="locationLabel">Lokasi Event</label>
                                <div class="input-group">
                                    <input name="location" placeholder="lokasi event" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="priority">Priority</label>
                                <select class="form-control" name="priority_id" id="priority_id">
                                    @foreach ($priority as $prio)
                                    <option value="{{ $prio->id }}">{{ $prio->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="publish">Publish</label>
                                <select name="publish" class="form-control" id="publish">
                                    <option value="2">Finished</option>
                                    <option value="1">Publish</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
    @endrole
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/datatables.min.css')}}" />
    <link href="{{ asset('theme/css/plugins/toastr.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/sweetalert2.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        #wrapper {
            text-align: center;
            margin: 0 auto;
            padding: 0px;
            width: 995px;
        }

        #output_image {
            max-width: 300px;
        }

    .drop-zone {
        /* max-width: 400px; */
        width: 300px;
        height: 300px;
        padding: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-family: "Quicksand", sans-serif;
        font-weight: 500;
        font-size: 20px;
        cursor: pointer;
        color: #cccccc;
        border: 4px dashed #663399;
        border-radius: 10px;
      }

      .drop-zone--over {
        border-style: solid;
      }

      .drop-zone__input {
        display: none;
      }

      .drop-zone__thumb {
        width: 80%;
        height: 100%;
        border-radius: 10px;
        overflow: hidden;
        background-color: #cccccc;
        background-size: cover;
        position: relative;
      }

      .drop-zone__thumb::after {
        content: attr(data-label);
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 5px 0;
        color: #ffffff;
        background: rgba(0, 0, 0, 0.75);
        font-size: 14px;
        text-align: center;
      }

    </style>
    @endsection

    @section('js')
    <script src="{{ asset('theme/js/plugins/datatables.min.js')}}"></script>
    <script src="{{ asset('theme/js/scripts/datatables.script.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script src="{{ asset('theme/js/plugins/toastr.min.js')}}"></script>
    <script src="{{ asset('theme/js/scripts/toastr.script.min.js')}}"></script>
    <script src="{{ asset('theme/js/plugins/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('theme/js/scripts/sweetalert2.script.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(function () {
        @if(Session::has('errors'))
            $('#inputModal').modal('show');
        @endif

        $('#inputModal').appendTo("body")

        $('#names').DataTable(
            {
                "pagingType": "numbers",
                @role('tenant')
                "searching": true,
                @endrole
                @role(['mentor', 'inkubator'])
                "searching": false,
                @endrole
                "scrollX": true
            }
        );

        $('.hapus').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
            title: 'Apa Anda Yakin Menghapus ?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0CC27E',
                cancelButtonColor: '#FF586B',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                confirmButtonClass: 'btn btn-success mr-5',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });

        CKEDITOR.replace('description');

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $('#type').change(function() {
            var type = $(this).val();
            if(type == 'online') {
                $("#locationLabel").text("Link Event");
                // $('input[name="location"]').prop("disabled", true);
                // var title = "Link Event";
            }
            else if(type == 'offline') {
                $("#locationLabel").text("Detail Alamat");
                // $('input[name="location"]').prop("disabled", false);
                // var title = "Detail Alamat";
            }
        });
    });

    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'right',
            autoUpdateInput: false,
            @role(['inkubator', 'mentor'])
            @if($exp != null)
                startDate: '{!! \Carbon\Carbon::parse($exp['0'])->format('m d Y') !!}',
                endDate: '{!! \Carbon\Carbon::parse($exp['1'])->format('m d Y') !!}',
            @endif
            @endrole
            locale: {
            cancelLabel: 'Clear'
            },
        }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
        $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD MMM YYYY') + ' - ' + picker.endDate.format('DD MMM YYYY'));
        });
        $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
    function getIds(checkboxName) {
        let checkBoxes = document.getElementsByName(checkboxName);
        let ids = Array.prototype.slice.call(checkBoxes)
                        .filter(ch => ch.checked==true)
                        .map(ch => ch.value);
        return ids;
    }
    function filterResults () {
        let priorityIds = getIds("priority");
        let title = $('input[name="titles"]').val();
        let publishStats = getIds("publish");
        let start = $('input[name="daterange"]').val();
        let href = 'event?';
        if(priorityIds.length) {
            href += 'filter[priority]=' + priorityIds;
        }
        if(publishStats.length) {
            href += '&filter[publish]=' + publishStats;
        }
        if(title !== ""){
            href += '&filter[title]=' + title;
        }
        if(start !== ""){
            let startDate = $('input[name="daterange"]').data('daterangepicker').startDate.format('YYYY-MM-DD');
            let endDate = $('input[name="daterange"]').data('daterangepicker').endDate.format('YYYY-MM-DD');
            href += '&filter[between]=' + startDate + ',' + endDate;
        }
        console.log(href);
        document.location.href=href;
    }
    document.getElementById("filter").addEventListener("click", filterResults);
    toastr.options = {
        "debug": false,
        //   "positionClass": "toast-bottom-full-width",
        "onclick": null,
        "showMethod": "slideDown",
        "hideMethod": "slideUp",
        "timeOut": 2000,
        "extendedTimeOut": 1000
    }

    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif

    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    const dropZoneElement = inputElement.closest(".drop-zone");

    dropZoneElement.addEventListener("click", (e) => {
      inputElement.click();
    });

    inputElement.addEventListener("change", (e) => {
      if (inputElement.files.length) {
        updateThumbnail(dropZoneElement, inputElement.files[0]);
      }
    });

    dropZoneElement.addEventListener("dragover", (e) => {
      e.preventDefault();
      dropZoneElement.classList.add("drop-zone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
      dropZoneElement.addEventListener(type, (e) => {
        dropZoneElement.classList.remove("drop-zone--over");
      });
    });

    dropZoneElement.addEventListener("drop", (e) => {
      e.preventDefault();

      if (e.dataTransfer.files.length) {
        inputElement.files = e.dataTransfer.files;
        updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
      }

      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  /**
   * Updates the thumbnail on a drop zone element.
   *
   * @param {HTMLElement} dropZoneElement
   * @param {File} file
   */
  function updateThumbnail(dropZoneElement, file) {
    let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

    // First time - remove the prompt
    if (dropZoneElement.querySelector(".drop-zone__prompt")) {
      dropZoneElement.querySelector(".drop-zone__prompt").remove();
    }

    // First time - there is no thumbnail element, so lets create it
    if (!thumbnailElement) {
      thumbnailElement = document.createElement("div");
      thumbnailElement.classList.add("drop-zone__thumb");
      dropZoneElement.appendChild(thumbnailElement);
    }

    thumbnailElement.dataset.label = file.name;

    // Show thumbnail for image files
    if (file.type.startsWith("image/")) {
      const reader = new FileReader();

      reader.readAsDataURL(file);
      reader.onload = () => {
        thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
      };
    } else {
      thumbnailElement.style.backgroundImage = null;
    }
  }
    </script>
    @endsection
