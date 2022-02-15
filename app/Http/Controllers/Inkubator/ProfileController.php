<?php

namespace App\Http\Controllers\Inkubator;

use Illuminate\Support\Facades\Auth;
use App\Inkubator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $inkubator = Inkubator::where('user_id', Auth::user()->id)->first();

        $fileName = $inkubator->photo;

        if ($request->has('photo')) {
            storage::delete('img/profile/inkubator/' . $inkubator->photo);
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
