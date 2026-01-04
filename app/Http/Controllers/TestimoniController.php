<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\testimoni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('keywords');
        if ($query){
            $testimoni = Testimoni::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('rating','LIKE','%'.$query.'%')
                ->orWhere('status', 'LIKE', '%'.$query.'%')
                ->orWhereHas('user', function ($keywords) use ($query) {
                    $keywords->where ('nama_user', 'LIKE', '%'.$query.'%');
                })
                ->orWhereHas('produk', function ($keywords) use ($query) {
                    $keywords->where ('nama_produk', 'LIKE', '%'.$query.'%');
                });
            })->latest()->paginate(5);

            $testimoni->appends(['keywords'=> $query]);
        } else {
            $testimoni = Testimoni::with('user', 'produk')->latest()->paginate(5);
        }

        // $testimoni = Testimoni::with('user', 'produk')->latest()->paginate(5);
        return view('admin.testimoni.index', compact('testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        $user = User::all();
        $produk = Produk::all();
        return view('admin.testimoni.tambah', compact('user','produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=> 'required',
            'produk_id' => 'required',
            'pesan'=> 'required',
            'gambar'=> 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'rating'=> 'required',
            'status'=> 'required',
        ]);

        $nama_gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . "-" . $gambar->getClientOriginalName();
            $gambar -> move(public_path('image/testimoni'), $nama_gambar);
        }

        Testimoni::create([
            'user_id'=> $request->user_id,
            'produk_id'=> $request->produk_id,
            'pesan'=> $request->pesan,
            'gambar'=> $nama_gambar,
            'rating'=> $request->rating,
            'status'=> $request->status,
        ]);

        return redirect('/testimoni')->with('success','Data berhasil ditambahkan!');
    }

    public function store_pengunjung(Request $request)
    {
        $request->validate([
            'rating'=> 'required',
            'pesan'=> 'required',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . "-" . $gambar->getClientOriginalName();
            $gambar->move(public_path('image/testimoni'), $nama_gambar);
        }

        Testimoni::create([
            'user_id' => Auth::id(),
            'produk_id' => $request->produk_id,
            'pesan'=> $request->pesan,
            'rating'=> $request->rating,
            'status' => 'menunggu',
            'gambar' => $nama_gambar,
        ]);

        return back()->with('success','Terima Kasih!! Ulasan anda telah terkirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(testimoni $testimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $user = User::all();
        $produk = Produk::all();
        return view('admin.testimoni.edit', compact('testimoni','user', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'=> 'required',
            'produk_id'=> 'required',
            'pesan'=> 'required',
            'gambar'=> 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'rating'=> 'required',
            'status'=> 'required',
        ]);

        $testimoni = Testimoni::findOrFail($id);
        $testimoni->user_id = $request->user_id;
        $testimoni->produk_id = $request->produk_id;
        $testimoni->pesan = $request->pesan;
        $testimoni->rating = $request->rating;
        $testimoni->status = $request->status;

        if($request->hasFile('gambar')){
            $path_lama = public_path('image/testimoni/' . $testimoni->gambar);
            if (file_exists($path_lama)) {
                @unlink($path_lama);
            }   
            $gambar = $request->file('gambar');  
            $nama_gambar = time() . "-" . $gambar->getClientOriginalName();
            $gambar-> move(public_path('image/testimoni'), $nama_gambar);
            
            $testimoni->gambar = $nama_gambar;
        }
        $testimoni->save();
        
        return back()->with('success','Data berhasil diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();
        return redirect('/testimoni')->with('success','Data berhasil dihapus!');
    }

     public function update_status(Request $request, $id)
    {
        $testimoni = testimoni::findOrFail($id);
        $testimoni->update([
            'status' => $request->status
        ]);
        
        $testimoni->save();

        return redirect('/testimoni')->with('success', 'Status Berhasil Diupdate!');
    }
}
