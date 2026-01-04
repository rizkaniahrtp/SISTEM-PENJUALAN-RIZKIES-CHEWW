<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('keywords');
        if ($query){
            $user = User::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('nama_user','LIKE','%'.$query.'%')
                            ->orWhere('peran','LIKE','%'.$query.'%')
                            ->orWhere('email','LIKE','%'.$query.'%')
                            ->orWhere('alamat','LIKE','%'.$query.'%');
            })->latest()->paginate(5);

            $user->appends(['keywords'=> $query]);
        } else {
            $user = User::latest()->paginate(5);
        }

        // $user = User::latest()->paginate(5);
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        return view('admin.user.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|numeric',
            'password' => 'required',
            'peran' => 'required',
            'foto_profil' => 'required|required|image|mimes:jpg,png,jpeg',
            'alamat' => 'required',
        ]);

        $foto = $request->file('foto_profil');
        $nama_foto = time() . "-" . $foto->getClientOriginalName();
        $foto -> move(public_path('image/user'), $nama_foto);

        User::create([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => bcrypt($request->password),
            'peran' => $request->peran,
            'foto_profil' => $nama_foto,
            'alamat' => $request->alamat,
        ]);

        return redirect('/user')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_user' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'peran' => 'required',
            'alamat' => 'required',
            'password' => 'nullable',
            'foto_profil' => 'nullable'
        ]);

        $user = User::findOrFail($id);

        $data = [
            'nama_user' => $request->nama_user,
            'email'     => $request->email,
            'no_hp'     => $request->no_hp,
            'peran'     => $request->peran,
            'alamat'    => $request->alamat,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if($request->hasFile('foto_profil')){
            $path_lama = public_path('image/user/' . $user->foto_profil);
            if (file_exists($path_lama)) {
                @unlink($path_lama);
            }   
            $foto = $request->file('foto_profil');  
            $nama_foto = time() . "-" . $foto->getClientOriginalName();
            $foto-> move(public_path('image/user'), $nama_foto);
            
            $data['foto_profil'] = $nama_foto;
        }

        $updateStatus = $user->update($data);

        if ($updateStatus) {
            return redirect('/user')->with('success', 'Data Berhasil Diupdate!');
        } else {
            return redirect('/user')->with('error', 'Gagal update ke Database');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);

        $filePath = public_path('image/user/'.$user->foto_profil);
        if(file_exists($filePath) && is_file($filePath)){
            @unlink($filePath);
        }

        $user->delete();

        return redirect('/user')->with('success','Data berhasil dihapus!');   
    }
}
