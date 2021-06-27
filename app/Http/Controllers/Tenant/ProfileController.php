<?php

namespace App\Http\Controllers\Tenant;

use Auth;
use App\Tenant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Tenant::where(["user_id" => Auth::user()->id])->first();
        return view('profile.index', compact('data'));
    }

    public function edit()
    {
        $data = Tenant::where(["user_id" => Auth::user()->id])->first();
        return view('profile.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $inkubator = Tenant::where('user_id', Auth::user()->id)->first();
        $tujuan_upload = 'img/profile/tenant/';
        // jika sudah ada data foto pengguna dan ingin menggantinya
        if ($inkubator->photo && $request->file('photo')) {
            \File::delete($tujuan_upload . $inkubator->photo);
            $file = $request->photo;
            $filename = time() . \Str::slug($request->get('nama')) . '.' . $file->getClientOriginalExtension();
            $file->move($tujuan_upload, $filename);
        } else {
            $filename = $inkubator->photo;
        }

        Tenant::updateOrCreate(
            ['user_id'  =>  Auth::user()->id],
            [
                'title' =>  $request->title,
                'subtitle' =>  $request->subtitle,
                'description' =>  $request->description,
                'photo' =>  $filename,
                // 'alamat' =>  $request->alamat,
                // 'kontak' =>  $request->kontak,
                'status' =>  '0',
            ],
        );
        
        $notification = array(
            'message' => 'Profile Berhasil Diupdate',
            'alert-type' => 'success'
        );

        // return "success update your profile";
        return redirect()->to('/tenant/profile')->with($notification);
    }
}
