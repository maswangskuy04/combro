<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;


class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('admin.profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profile.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_lengkap' => 'required|string|max:55',
            'alamat' => 'nullable|string|max:250',
            'no_tlp' => 'required|string|max:15',
            'email' => 'required|string|email|max:55',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            // 'linkedin' => 'nullable|url',
            // 'instagram' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $path = $image->store('public/image');
            $name = basename($path);
        }

        Profile::create([
            'picture' => $name,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            // 'linkedin' => $request->linkedin,
            // 'instagram' => $request->instagram,
            'description' => $request->description,
        ]);
        return redirect()->route('profiles.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Display the specified resource.
     */
    public function destroy(string $id)
    {
        $profiles = Profile::withTrashed()->findOrFail($id);
        if ($profiles->picture) {
            storage::delete('public/image/' . $profiles->picture);
        }
        $profiles->forceDelete();
        return redirect()->route('profiles.index')->with('success', 'Delete berhasil');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profiles = Profile::findOrFail($id);
        return view('admin.profile.edit', compact('profiles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profiles = Profile::findOrFail($id);
        $request->validate([
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_lengkap' => 'required|string|max:55',
            'alamat' => 'nullable|string|max:250',
            'no_tlp' => 'required|string|max:15',
            'email' => 'required|string|email|max:55',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            // 'linkedin' => 'nullable|url',
            // 'instagram' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('picture')) {
            if ($profiles->picture) {
                Storage::delete('public/image/' . $profiles->picture);
            }
            $image = $request->file('picture');
            $path = $image->store('public/image');
            $name = basename($path);
            $profiles->picture = $name;
        }

        $profiles->nama_lengkap = $request->nama_lengkap;
        $profiles->alamat = $request->alamat;
        $profiles->no_tlp = $request->no_tlp;
        $profiles->email = $request->email;
        $profiles->facebook = $request->facebook;
        $profiles->twitter = $request->twitter;
        $profiles->save();
        return redirect()->route('profiles.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function backup()
    {
        $profiles = Profile::onlyTrashed()->get();
        return view('admin.profile.backup', ['profiles' => $profiles]);
    }

    public function softDelete(string $id)
    {
        $profiles = Profile::findOrFail($id);
        $profiles->delete();

        return redirect()->route('profiles.index')->with('success', 'Data berhasil didelete Sementara');
    }

    //public function backToData () {}

    public function updateStatus($id): JsonResponse
    {
        //Select Profile nya,baru di update menjadi 0:
        Profile::where('id', '!=', $id)->update(['status' => 0]);
        //Select Profile nya berdasarkan id lalu diupdate menjadi 1
        $profiles = Profile::findOrfail($id);
        $profiles->status = 1;
        $profiles->save();

        return response()->json(['success' => 'Status berhasil di perbarui.']);
    }
    public function recycle()
    {
        $profiles = Profile::onlyTrashed()->paginate(15);
        return view('admin.profile.recycle', compact('profiles'));
    }

    public function restore($id)
    {
        $profiles = Profile::withTrashed()->findOrFail($id);
        $profiles->restore();

        return redirect()->route('profiles.index')->with('success', 'Data berhasil di restore');
    }

    public function show(String $id)
    {
        $data = Profile::findOrFail($id);
        $idProfile = $data->id;
        $experiences = Experience::where('id_profile', $idProfile);

        $pdf = Pdf::loadView('admin.generate-pdf.index', compact(['data', 'experiences']));
        return $pdf->download('Portfolio.pdf');
    }
}
