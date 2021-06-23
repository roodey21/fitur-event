@extends('layouts.app')

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
    <form action="{{ route('inkubator.update') }}" method="POST">
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
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                    <input class="custom-file-input" id="foto" type="file"  name="foto" onchange="preview_image(event)" accept="image/*" />
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
</script>
@endsection