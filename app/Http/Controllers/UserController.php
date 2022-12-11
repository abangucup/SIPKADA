<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.pengguna.index', compact(['users']));
    }

    public function create()
    {
        $kelurahans = Kelurahan::all();
        return view('admin.pengguna.create', compact(['kelurahans']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'kelurahan_id' => 'required'
        ]);

        $cek_username = User::where('username', $request->username)->first();
        if ($cek_username) {
            toast('Username ' . $request->username . ' Sudah Ada', 'info');
            return back();
        }

        $user = new User();
        $user->name = $request->name;
        $request->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->kelurahan_id = $request->kelurahan_id;
        $user->role = "kelurahan";
        $user->save();

        toast('Pengguna ' . $request->name . ' Berhasil Ditambahkan', 'success');
        return to_route('user.index');
    }

    public function edit(User $user)
    {
        $kelurahans = Kelurahan::all();
        return view('admin.pengguna.edit', compact('user', 'kelurahans'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'kelurahan_id' => 'required'
        ]);

        if ($request->username != $user->username) {
            $validate = Validator::make($request->all(), [
                'username' => 'required|unique:users',
            ]);

            if ($validate->fails()) {
                toast('Username ' . $request->username . ' Sudah Ada', 'info');
                return back();
            }
        }

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'kelurahan_id' => $request->kelurahan_id,
            'role' => $user->role
        ]);

        toast('Kelurahan ' . $user->nama . ' Berhasil DiEdit', 'success');
        return to_route('kelurahan.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        toast('Username ' . $user->username . ' Berhasil Dihapus', 'success');
        return back();
    }
}
