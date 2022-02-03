@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="/inkubator/event/{{ $event->slug }}/edit" method="post" autocomplete="off" enctype="multipart/form-data">
            @method('patch')
            @csrf
          <div class="form-group">
              <div class="col d-flex justify-content-center">
                {{-- <div class="drop-zone">
                  <span class="drop-zone__prompt"><img src="{{asset("storage/". $event->foto)}}"></span>
                  <input type="file" name="foto" id="exampleInputFile" for="exampleInputFile"
                      class="drop-zone__input">
                </div> --}}
                <div class="drop-zone" >
                    <span class="drop-zone__prompt" ><img src="{{asset("storage/". $event->foto)}}"></span>
                    <input type="file" name="foto" id="exampleInputFile" for="exampleInputFile" class="drop-zone__input" value="{{$event->foto}}">
                </div>
            </div>
          </div>
          <div class="dropzone" id="dropzone">

          </div>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="title" value="{{ old('title') ?? $event->title }}">
          </div>
          <div class="form-group">
            <label for="event">Event</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') ?? $event->description }}</textarea>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="tgl_mulai">Tanggal Mulai :</label>
              <div class="input-group">
                <input type="date" name="start_date" class="form-control" value="{{ $event->start_date->toDateString() }}">
                <input type="time" name="start_time" class="form-control" value="{{ $event->start_time->toTimeString() }}">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="tgl_selesai">Tanggal Selesai</label>
              <div class="input-group">
                <input type="date" name="end_date" class="form-control" value="{{ $event->end_date->toDateString() }}">
                <input type="time" name="end_time" class="form-control" value="{{ $event->end_time->toTimeString() }}">
              </div>
            </div>
          </div>
          <div class="row">
              <div class="form-group col-md-6">
                  <label for="type">Jenis Event</label>
                  <select name="type" id="type" class="form-control">
                      <option value="offline"  {{ $event->type == 'offline' ? ' selected' : '' }}>Offline</option>
                      <option value="offline" {{ $event->type == 'online' ? ' selected' : '' }}>Online</option>
                  </select>
              </div>
              <div class="form-group col-md-6">
                <label for="location" id="locationLabel">Lokasi Event</label>
                <div class="input-group">
                    <input name="location" placeholder="lokasi event" class="form-control" required value="{{ $event->location }}">
                </div>
              </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
                <label for="priority">Priority</label>
                <select class="form-control" name="priority_id" id="priority_id">
                <option value="0">--!!--</option>
                @foreach ($priority as $prio)
                    <option value="{{ $prio->id }}" {{ $event->priority_id == $prio->id ? ' selected' : '' }}>{{ $prio->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="publish">Publish</label>
                <select name="publish" class="form-control" id="publish">
                <option value="1" {{ $event->publish == 1 ? ' selected ' : '' }}>Publish</option>
                <option value="0" {{ $event->publish == 0 ? ' selected ' : '' }}>Draft</option>
                </select>
            </div>
          </div>
          <br>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
    </div>
</div>
@endsection

 @section('css')
 <style>
 .drop-zone {
        max-width: 400px;
        /* width: 100%; */
        height: 400px;
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
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');

    // $('#type').change(function() {
    //     var type = $(this).val();
    //     if(type == 'online') {
    //         $("#locationLabel").text("Link Event");
    //         // $('input[name="location"]').prop("disabled", true);
    //         // var title = "Link Event";
    //     }
    //     else if(type == 'offline') {
    //         $("#locationLabel").text("Detail Alamat");
    //         // $('input[name="location"]').prop("disabled", false);
    //         // var title = "Detail Alamat";
    //     }
    // });

    Dropzone.options.dropzone =
        {
            maxFilesize: 10,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 60000,
            success: function (file, response) {
                console.log(response);
            },
            error: function (file, response) {
                return false;
            }
        };
</script>
@endsection
