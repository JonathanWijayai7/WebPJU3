<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AutorisasiController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('otorisasi.index', compact('users'));
    }

    public function create()
    {
        return view('otorisasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'level' => 'required',
            'ftprofil' => 'required|image',
        ]);

        // Validate and store the user data
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->level = $request->input('level');

        if ($request->hasFile('ftprofil')) {
            $image = $request->file('ftprofil');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image'), $imageName);
            $user->ftprofil = $imageName;
        }
    
        $user->save();
    
        return redirect()->route('otorisasi')->with('message', 'Data berhasil ditambahkan');
    }

    public function edit(User $user, $id)
    {
        $user = User::find($id);
        return view('otorisasi.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user data
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->level = $request->input('level');

        if ($request->hasFile('ftprofil')) {
            // Unlink the previous file
            if (file_exists(public_path('image/' . $user->ftprofil))) {
                unlink(public_path('image/' . $user->ftprofil));
            }
    
            $file = $request->file('ftprofil');
            $filename = date('Ymd'). '-' .time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('image'), $filename);
            $user->ftprofil = $filename;
        }
        $user->save();
        return redirect()->route('otorisasi');
    }

    public function destroy(User $user, $id)
    {
        $users = User::where('users.id', $id)->first();
        if (file_exists(public_path('image/' . $users->ftprofil))) {
            unlink(public_path('image/' . $users->ftprofil));
        }
        $users->delete();
        return redirect()->route('otorisasi');
    }

}
