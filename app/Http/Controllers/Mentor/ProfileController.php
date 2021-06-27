<?php

namespace App\Http\Controllers\Mentor;

use Auth;
use App\Mentor;
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
        $data = Mentor::where(["user_id" => Auth::user()->id])->first();
        return view('profile.index', compact('data'));
    }

    public function edit()
    {
        $data = Mentor::where(["user_id" => Auth::user()->id])->first();
        return view('profile.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $inkubator = Mentor::where('user_id', Auth::user()->id)->first();
        $tujuan_upload = 'img/profile/mentor/';
        // jika sudah ada data foto pengguna dan ingin menggantinya
        if ($inkubator->photo && $request->file('photo')) {
            \File::delete($tujuan_upload . $inkubator->photo);
            $file = $request->photo;
            $filename = time() . \Str::slug($request->get('nama')) . '.' . $file->getClientOriginalExtension();
            $file->move($tujuan_upload, $filename);
        } else {
            $filename = $inkubator->photo;
        }

        Mentor::updateOrCreate(
            ['user_id'  =>  Auth::user()->id],
            [
                'nama' =>  $request->nama,
                'alamat' =>  $request->alamat,
                'kontak' =>  $request->kontak,
                'photo' =>  $filename,
                'description' =>  $request->description,
                'status' =>  '0',
            ],
        );
        
        $notification = array(
            'message' => 'Profile Berhasil Diupdate',
            'alert-type' => 'success'
        );

        // return "success update your profile";
        return redirect()->to('/mentor/profile')->with($notification);
    }
}
