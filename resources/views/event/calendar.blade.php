@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-3">
		<div class="card mb-4">
			<div class="card-header container-fluid">
			  <div class="row">
				<div class="col-md-8">
				  <h3>Event</h3>
				</div>
				<div class="col text-right">
				 @role('inkubator')
				 <a href="{{route('inkubator.event-list')}}" data-toggle="tooltip" data-placement="top" title="List"><button class="btn btn-primary custom-btn btn-sm"><i class="i-Receipt"></i></button></a>
				 @endrole
				 @role('tenant')
				 <a href="{{route('tenant.event-list')}}"><button class="btn btn-primary custom-btn btn-sm"><i class="i-Receipt"></i></button></a>
				 @endrole
				 @role('mentor')
				 <a href="{{route('mentor.event-list')}}"><button class="btn btn-primary custom-btn btn-sm"><i class="i-Receipt"></i></button></a>
				 @endrole
				</div>
			  </div>
			</div>
			@role('inkubator')
			<div class="card-body">
				<div class="create_event_wrap">
					<ul class="list-group" id="external-events">
            <li class="list-group-item bg-secondary fc-event">
							ALL
						</li>
						<li class="list-group-item bg-primary fc-event">
							Proposal
						</li>
						<li class="list-group-item bg-danger fc-event">
							Pra Start Up
						</li>
						<li class="list-group-item bg-warning fc-event">
							Start Up
						</li>
						<li class="list-group-item bg-success fc-event">
							Scale Up
						</li>
					</ul>
					<p>
            Seret Kategori diatas ke tanggal yang diinginkan untuk menambakan event baru
					</p>
				</div>
			</div>
			@endrole
		</div>
	</div>
	<div class="col-md-9">
		<div class="response"></div>
		<div class="card mb-4 o-hidden">
			<div class="card-body">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
</div>
@role('inkubator')
<!-- Modal -->
<div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <form action={{ route('inkubator.event.store') }} method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="title" required>
                        @error('title')
                            <div class="mt-2 text-danger">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="foto">File</label>
                      <div class="input-group mb-3">
                          <div class="drop-zone">
                              <input type="file" name="foto" id="exampleInputFile" for="exampleInputFile"
                                  class="drop-zone__input">
                          </div>
                      </div>
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
                              <option value="0">ALL</option>
                                @foreach ($priority as $prio)
                                    <option value="{{ $prio->id }}">{{ $prio->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="publish">Publish</label>
                            <select name="publish" class="form-control" id="publish">
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
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/calendar/fullcalendar.min.css')}}" />
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
      max-width: 800px;
      width: 100%;
      height: 200px;
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

    th, td {
        overflow:hidden; white-space:nowrap
      }


  </style>
@endsection
@section('js')
<script src="{{ asset('theme/js/plugins/calendar/jquery-ui.min.js')}}"></script>
<script src="{{ asset('theme/js/plugins/calendar/moment.min.js')}}"></script>
<script src="{{ asset('theme/js/plugins/calendar/fullcalendar.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<script>
$(document).ready(function () {
    // Open Modal when validation errors 
    @if(Session::has('errors'))
    $('#inputModal').modal('show');
    @endif

    // For initiate Ckeditor
    CKEDITOR.replace('description');

    /* initialize the external events
    			-----------------------------------------------------------------*/
    function initEvent() {
        $('#external-events .fc-event').each(function () {
            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()),
                // use the element's text as the event title
                color: $(this).css('background-color'),
                stick: true, // maintain when user navigates (see docs on the renderEvent method)
                @role('inkubator')
                url: null //"{{ route('inkubator.event.create') }}",
                @endrole
            }); // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,
                // will cause the event to go back to its
                revertDuration: 0 // original position after the drag

            });
        });
    }



    initEvent();
    /* initialize the calendar
    -----------------------------------------------------------------*/

    var newDate = new Date(),
        date = newDate.getDate(),
        month = newDate.getMonth(),
        year = newDate.getFullYear();

    $('#calendar').fullCalendar({

        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month, dayGridMonth'
        },
        themeSystem: "bootstrap4",
        droppable: true,
        editable: true,
        eventLimit: true,
        // allow "more" link when too many events
        drop: function (date, jsEvent, ui) {
            // 
        },
        events: [
            @foreach($event as $e) {
                id: "{{ $e->id }}",
                title: "{{ $e->title }}",
                start: "{{ $e->start_date }}",
                end: "{{ $e->end_date }}",
                @if($e -> priority_id == null)
                color: "#52495a",
                @endif
                @if($e -> priority_id == 1)
                color: "#4caf50",
                @endif
                @if($e -> priority_id == 2)
                color: "#663399",
                @endif
                @if($e -> priority_id == 3)
                color: "#ffc107",
                @endif
                @if($e -> priority_id == 4)
                color: "#f44336",
                @endif
                url: "{{ $e->slug }}",
            },
            @endforeach
        ],
        eventClick: function (event) {

            var priority_id = 1;
            if (event.title == "ALL") {
                priority_id = 0;
            }
            if (event.title == "Proposal") {
                priority_id = 1;
            }
            if (event.title == "Pra Start Up") {
                priority_id = 2;
            }
            if (event.title == "Start Up") {
                priority_id = 3;
            }
            if (event.title == "Scale Up") {
                priority_id = 4;
            }

            if (event.url == null) {
                $('#start_date').val(event.start.format());

                if (event.end == null) {
                    $('#end_date').val(event.start.format());
                } else {
                    $('#end_date').val(event.end.subtract(1, "days").format());
                }
                $('#priority_id').val(priority_id);
                $('#inputModal').modal('show');
            }
        }
    });

    $('#type').change(function () {
        var type = $(this).val();
        if (type == 'online') {
            $("#locationLabel").text("Link Event");
            // $('input[name="location"]').prop("disabled", true);
            // var title = "Link Event";
        } else if (type == 'offline') {
            $("#locationLabel").text("Detail Alamat");
            // $('input[name="location"]').prop("disabled", false);
            // var title = "Detail Alamat";
        }
    });

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
}); 
</script>
@endsection
