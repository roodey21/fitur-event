@extends('layouts.app')

@section('css')

<style>
.drop-zone {
    max-width: 200px;
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
    width: 100%;
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

@section('content')
<div class="main-content pt-4">
    <div class="breadcrumb">
        <h1>User Profile</h1>
        <ul>
            {{-- <li><a href="">Pages</a></li> --}}
            <li>Edit Profile</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    @role('inkubator')
    <form action="{{ route('inkubator.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">Edit Foto</div>
                        <hr>
                            <label for="foto">File</label>
                            <div class="col">
                                <div class="drop-zone" >
									<span class="drop-zone__prompt" ><img src="{{asset('img/profile/inkubator/'. $data->photo)}}"></span>
									<input type="file" name="photo" id="exampleInputFile" for="exampleInputFile" class="drop-zone__input" vlaue="{{asset('img/profile/inkubator/'. $data->photo)}}">
								</div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">Edit Profil</div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="nama">Nama</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="nama" type="text" placeholder="nama" value="{{ $data->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="alamat">Alamat</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="alamat" type="text" placeholder="alamat" value="{{ $data->alamat }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="kontak">Kontak</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="kontak" type="text" placeholder="kontak" value="{{ $data->kontak }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="deskripsi">Deskripsi</label>
                            <div class="col-sm-8">
                                <textarea name="description" id="deskripsi" cols="30" rows="10">{{ $data->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary btn-lg">Simpan Perubahan</button>
        </div>
    </form>
    @endrole
    @role('mentor')
    <form action="{{ route('mentor.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">Edit Profil</div>
                        <hr>
                        <div class="form-group">
                            <label for="foto">File</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="photo">Choose file</label>
                                    <input class="custom-file-input" type="file"  name="photo" onchange="preview_image(event)" accept="image/*" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">Edit Profil</div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="nama">Nama</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="nama" type="text" placeholder="nama" value="{{ $data->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="alamat">Alamat</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="alamat" type="text" placeholder="alamat" value="{{ $data->alamat }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="kontak">Kontak</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="kontak" type="text" placeholder="kontak" value="{{ $data->kontak }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="deskripsi">Deskripsi</label>
                            <div class="col-sm-8">
                                <textarea name="description" id="deskripsi" cols="30" rows="10">{{ $data->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">simpan</button>
    </form>
    @endrole
    @role('tenant')
    <form action="{{ route('tenant.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">Edit Profil</div>
                        <hr>
                        <div class="form-group">
                            <label for="foto">File</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="photo">Choose file</label>
                                    <input class="custom-file-input" type="file"  name="photo" onchange="preview_image(event)" accept="image/*" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">Edit Profil</div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="title">Title</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="title" type="text" placeholder="title" value="{{ $data->title }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="subtitle">Subtitle</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="subtitle" type="text" placeholder="subtitle" value="{{ $data->subtitle }}">
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="alamat">Alamat</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="alamat" type="text" placeholder="alamat" value="{{ $data->alamat }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="kontak">Kontak</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="kontak" type="text" placeholder="kontak" value="{{ $data->kontak }}">
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="deskripsi">Deskripsi</label>
                            <div class="col-sm-8">
                                <textarea name="description" id="deskripsi" cols="30" rows="10">{{ $data->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">simpan</button>
    </form>
    @endrole
    <!-- end of main-content -->
</div>
@endsection

@section('js')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    function preview_image(event) 
    {
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('output_image');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
    }

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