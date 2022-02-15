<? 
namespace App\Traits;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

trait ChangePasswordTrait{
    public function editPassword(Request $request){
        $request->validate([
                'password' => 'required|confirmed|min:8',
                'old_password'=> 'required'
        ]);
        $old_password = request('old_password');
        $current_password = auth()->user()->password;
        if (Hash::check($old_password,$current_password)) {
            # code...
            $data = User::findOrFail(auth()->user()->id);
            $data->update([
                'password'=> bcrypt(request('password'))
            ]);
            return redirect()->back()->with('success','Password Berhasil di ubah');
        }else{
            return back()->withErrors(['old_password'=>'Pastikan password anda Benar']);
        }
    }
}