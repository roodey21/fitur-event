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
    public function index()
    {
        $data['data'] = User::where(['users.id' => Auth::user()->id]);
        return view('profile.index', $data);
    }
    public function edit()
    {
        $data = Inkubator::where(["user_id" => Auth::user()->id])->first();
        return view('profile.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $attr = $request->all();
        // dd($attr);
        $inkubator = Inkubator::where('user_id', Auth::user()->id)->first();
        
        $inkubator->update($attr);

        return "success update your profile";
        // return redirect()->to('/inkubator/profile');
    }
}
