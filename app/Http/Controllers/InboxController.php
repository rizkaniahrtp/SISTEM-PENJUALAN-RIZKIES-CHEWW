<?php

namespace App\Http\Controllers;

use App\Models\inbox;
use App\Models\User;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('keywords');
        if ($query){
            $inbox = inbox::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('nama','LIKE','%'.$query.'%')
                ->orWhere('status', 'LIKE', '%'.$query.'%');
            })->latest()->paginate(5);

            $inbox->appends(['keywords'=> $query]);
        } else {
            $inbox = inbox::latest()->paginate(5);
        }

        // $inbox = Inbox::latest()->paginate(5);
        return view('admin.inbox.index', compact('inbox'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',      
        ]);

        Inbox::create([
            'nama'=> $request->nama,
            'email'=> $request->email,
            'pesan'=> $request->pesan,
            'status'=> 'baru',
        ]);

        return back()->with('success', 'Pesan Anda berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(inbox $inbox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(inbox $inbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, inbox $inbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $inbox = Inbox::findOrFail($id);
        $inbox->delete();
        return redirect('/inbox')->with('success', 'Data berhasil dihapus');
    }

    public function update_status(Request $request, $id)
    {
        $inbox = Inbox::findOrFail($id);      
        $inbox->update([
            'status' => $request->status
        ]);
        
        $inbox->save();
        return redirect('/inbox')->with('success', 'Status Berhasil Diupdate!');
    }
}
