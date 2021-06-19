<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index()
    {
        $data['certificates'] = Certificate::where('user_id', Auth::user()->id)->get();
        return view('dashboard.certificates.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.certificates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.$request->file->extension();
        $request->file->move(public_path('certificate_image'), $imageName);

        Certificate::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'desc' => $request->desc,
            'file' => $imageName
        ]);

        return redirect()->route('dashboard.certificate.index')->with('success', 'Certificate has created successfully');
    }
}
