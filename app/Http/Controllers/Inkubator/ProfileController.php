<?php

namespace App\Http\Controllers\Inkubator;

use Auth;
use File;
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
        if ($data){
            return view('profile.index', compact('data'));
        } else {
            return view('profile.create');
        }
    }

    public function create()
    {
       return view('profile.create');
    }

    public function store(Request $request)
    {
        $tujuan_upload = 'img/profile/inkubator/';
        // jika sudah ada data foto pengguna dan ingin menggantinya
            $file = $request->photo;
            $filename = time() . \Str::slug($request->get('nama')) . '.' . $file->getClientOriginalExtension();
            $file->move($tujuan_upload, $filename);

        Inkubator::updateOrCreate(
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
        return redirect()->to('/inkubator/profile')->with($notification);
    }

    public function edit()
    {
        $data = Inkubator::where(["user_id" => Auth::user()->id])->first();
        return view('profile.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $inkubator = Inkubator::where('user_id', Auth::user()->id)->first();

        $fileName = $inkubator->photo;

        if ($request->has('photo')) {
            \File::delete('img/profile/inkubator/' . $inkubator->photo);
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->move('img/profile/inkubator/', $fileName);
        } else {
            $fileName = $inkubator->photo;
        }

        Inkubator::updateOrCreate(
            ['user_id'  =>  Auth::user()->id],
            [
                'nama' =>  $request->nama,
                'alamat' =>  $request->alamat,
                'kontak' =>  $request->kontak,
                'photo' =>  $fileName,
                'description' =>  $request->description,
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
