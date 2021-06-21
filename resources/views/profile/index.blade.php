@extends('layouts.app')

@section('content')
<div class="main-content pt-4">
    <div class="breadcrumb">
        <h1>User Profile</h1>
        <ul>
            <li><a href="">Pages</a></li>
            <li>User Profile</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="card user-profile o-hidden mb-4">
        <div class="header-cover" style="background-image: url('../../dist-assets/images/photo-wide-4.jpg')"></div>
        <div class="user-info"><img class="profile-picture avatar-lg mb-2" src="{{ asset('theme/images/siskubis.png')}}" alt="" />
            <p class="m-0 text-24">Timothy Carlson</p>
            <p class="text-muted m-0">Digital Marketer</p>
        </div>
        <div class="card-body">
            <h4>About</h4>
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
                                <p class="text-primary mb-1"><i class="i-Calendar text-16 mr-1"></i> Birth Date</p><span>1 Jan, 1994</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Edit-Map text-16 mr-1"></i> Birth Place</p><span>Dhaka, DB</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Globe text-16 mr-1"></i> Lives In</p><span>Dhaka, DB</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Gender</p><span>1 Jan, 1994</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Email</p><span>example@ui-lib.com</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 mr-1"></i> Website</p><span>www.ui-lib.com</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Face-Style-4 text-16 mr-1"></i> Profession</p><span>Digital Marketer</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Professor text-16 mr-1"></i> Experience</p><span>8 Years</span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Home1 text-16 mr-1"></i> School</p><span>School of Digital Marketing</span>
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