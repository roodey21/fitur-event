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
    <div class="card user-profile mb-4">
        <div class="user-info"><img class="profile-picture avatar-lg" src="{{ asset('theme/images/photo-long-4.jpg')}}" alt="" />
            <p class="m-0 text-24">Timothy Carlson</p>
            <p class="text-muted m-0">Digital Marketer</p>
        </div>
        <div class="card-body">
            <div class="tab-content" id="profileTabContent">
                <div id="about">
                    <h4>Personal Information</h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, commodi quam! Provident quis voluptate asperiores ullam, quidem odio pariatur. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem, nulla eos?
                        Cum non ex voluptate corporis id asperiores doloribus dignissimos blanditiis iusto qui repellendus deleniti aliquam, vel quae eligendi explicabo.
                    </p>
                    <hr />
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Globe text-16 mr-1"></i> Lives In</p><span>Dhaka, DB</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Email</p><span>example@ui-lib.com</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 mr-1"></i> Website</p><span>www.ui-lib.com</span>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <button class="btn btn-success btn-sm btn-block">Ubah Info</button>
                </div>
            </div>
        </div>
    </div><!-- end of main-content -->
</div>
@endsection