<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

    public function edit($certificate_id)
    {
        $data['certificate'] = Certificate::find($certificate_id);

        return view('dashboard.certificates.edit', compact('data'));
    }

    public function update($certificate_id, Request $request)
    {
        $certificate = Certificate::find($certificate_id);
        $imageName = $certificate->file;

        if (isset($request->file)) {
            $request->validate([
                'file' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $image_path = public_path() . '/certificate_image/' . $certificate->file;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $imageName = time().'.'.$request->file->extension();
            $request->file->move(public_path('certificate_image'), $imageName);
        }

        Certificate::find($certificate_id)->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'file' => $imageName
        ]);

        return redirect()->route('dashboard.certificate.index')->with('success', 'Certificate has updated successfully');
    }
}
