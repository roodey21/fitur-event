<?php

namespace App\Http\Controllers\Inkubator;

use Auth;
use App\User;
use App\Inkubator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Inkubator $inkubator)
    {
        $data = Inkubator::where(["user_id" => Auth::user()->id])->first();
        return view('profile.index', compact('data'));
    }
    public function edit()
    {
        $data = Inkubator::where(["user_id" => Auth::user()->id])->first();
        return view('profile.edit', compact('data'));
    }
    public function update(Request $request)
    {
        // $attr = $request->all();
        // dd($attr);
        $inkubator = Inkubator::where('user_id', Auth::user()->id)->first();
        $tujuan_upload = 'img/profile/inkubator/';

        if ($inkubator) {
            // jika sudah ada data foto pengguna dan ingin menggantinya
            if ($inkubator->photo && $request->file('photo')) {
                \File::delete($tujuan_upload . $inkubator->photo);
                $file = $request->photo;
                $filename = time() . \Str::slug($request->get('nama')) . '.' . $file->getClientOriginalExtension();
                $file->move($tujuan_upload, $filename);
            } else {
                $filename = $inkubator->photo;
            }
        } else {
            $file = $request->photo;
            $filename = time() . \Str::slug($request->get('nama')) . '.' . $file->getClientOriginalExtension();
            $file->move($tujuan_upload, $filename);
        }

        Inkubator::updateOrCreate(
            ['user_id'  =>  Auth::user()->id],
            [
                'nama' =>  $request->nama,
                'alamat' =>  $request->alamat,
                'kontak' =>  $request->kontak,
                'photo' =>  $filename,
                'deskripsi' =>  $request->description,
                'status' =>  '0',
            ],
        );

        $notification = array(
            'message' => 'Profile Berhasil Diupdate',
            'alert-type' => 'success'
        );

        // return "success update your profile";
        return redirect()->to('/inkubator/profile')->with($notification);
    }
}
