@extends('layouts.app')

@section('content')
<div class="main-content pt-4">
    {{-- <div class="breadcrumb">
        <h1>User Profile</h1>
        <ul>
            <li><a href="">Pages</a></li>
            <li>User Profile</li>
        </ul>
    </div> --}}
    @role('inkubator')
    <div class="separator-breadcrumb border-top"></div>
    <div class="card user-profile o-hidden mb-4">
        <div class="header-cover" style="background-image: url('{{ asset("theme/images/photo-wide-2.jpg")}}')"></div>
        <div class="user-info">
            <img class="profile-picture avatar-lg" src="{{asset('img/profile/inkubator/'. $data->photo)}}" alt="" />
            <p class="m-0 text-24">{{ $data->nama }}</p>
            <p class="text-muted m-0">Digital Marketer</p>
        </div>
        <div class="card-body">
            <div class="tab-content" id="profileTabContent">
                <div id="about">
                    <h4>Personal Information</h4>
                    <p>
                        {!! $data->description !!}
                    </p>
                    <hr />
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Globe text-16 mr-1"></i> Lives In</p><span>{{ $data->alamat }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Email</p><span>example@ui-lib.com</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 mr-1"></i> Website</p><span>{{ $data->kontak }}</span>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <a href="{{ route("inkubator.profile.edit") }}" class="btn btn-success"><span class="px-3">Ubah Info</span></a>
                </div>
            </div>
        </div>
    </div>
    @endrole
    @role('mentor')
    <div class="card user-profile o-hidden mb-4">
        <div class="header-cover" style="background-image: url('{{ asset("theme/images/photo-wide-2.jpg")}}')"></div>
        <div class="user-info">
            <img class="profile-picture avatar-lg" src="{{ asset("/img/profile/mentor/" . $data->photo) }}" alt="" />
            <p class="m-0 text-24">{{ $data->nama }}</p>
            <p class="text-muted m-0">Digital Marketer</p>
        </div>
        <div class="card-body">
            <div class="tab-content" id="profileTabContent">
                <div id="about">
                    <h4>Personal Information</h4>
                    <p>
                        {!! $data->description !!}
                    </p>
                    <hr />
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Globe text-16 mr-1"></i> Lives In</p><span>{{ $data->alamat }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Email</p><span>example@ui-lib.com</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 mr-1"></i> Website</p><span>{{ $data->kontak }}</span>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <a href="{{ route("mentor.profile.edit") }}" class="btn btn-success"><span class="px-3">Ubah Info</span></a>
                </div>
            </div>
        </div>
    </div>
    @endrole
    @role('tenant')
    <div class="card user-profile mb-4">
        <div class="user-info"><img class="profile-picture avatar-lg" src="{{ asset("/img/profile/tenant/" . $data->photo) }}" alt="" />
            <p class="m-0 text-24">{{ $data->nama }}</p>
            <p class="text-muted m-0">Digital Marketer</p>
        </div>
        <div class="card-body">
            <div class="tab-content" id="profileTabContent">
                <div id="about">
                    <h4>Personal Information</h4>
                    <p>
                        {!! $data->description !!}
                    </p>
                    <hr />
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Globe text-16 mr-1"></i> Lives In</p><span>{{ $data->alamat }}</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Email</p><span>example@ui-lib.com</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 mr-1"></i> Website</p><span>{{ $data->kontak }}</span>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <a href="{{ route("tenant.profile.edit") }}" class="btn btn-success"><span class="px-3">Ubah Info</span></a>
                </div>
            </div>
        </div>
    </div>
    @endrole
</div>
@endsection

@section('css')
<link href="{{ asset('theme/css/plugins/toastr.css')}}" rel="stylesheet" />    
@endsection

@section('js')
<script src="{{ asset('theme/js/plugins/toastr.min.js')}}"></script>
<script src="{{ asset('theme/js/scripts/toastr.script.min.js')}}"></script>


<script>

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

</script>
@endsection
