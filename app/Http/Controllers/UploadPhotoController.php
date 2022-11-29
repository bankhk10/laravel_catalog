<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


use App\Models\NameCatalog;
use App\Models\Catalog;
use Auth;


class UploadPhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        // $upload = Upload::all()->where('user_id', Auth::user()->id);
        $upload = Catalog::orderBy('mime', 'desc')->where('user_id', Auth::user()->id)->get();
        return view('uploadPhoto.index', compact('upload'));
    }

    public function create()
    {
        return view('uploadPhoto.create');
    }

    public function store(Request $request)
    {

        $upload = new Catalog;
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filesize = $file->getSize();
            $file->move('uploads/catalog/', $filename);
            $upload->id_catalog = null;
            $upload->user_id = Auth::user()->id;
            $upload->name = $filename;
            $upload->size = $filesize;
            $upload->mime = $file->getClientOriginalExtension();
            $upload->location = 'uploads/catalog/' . $filename;
            $upload->sort = 1;
        }
        $upload->save();
        return redirect()->back()->with('status', 'บันทึกรูปภาพแล้ว');
    }

    public function edit($id)
    {
        $upload = Catalog::find($id);
        return view('uploadPhoto.edit', compact('upload'));
    }

    public function update(Request $request, $id)
    {
        $upload = Catalog::find($id);

        if ($request->hasfile('photo')) {
            $destination = 'uploads/catalog/' . $upload->name;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filesize = $file->getSize();
            $file->move('uploads/catalog/', $filename);
            $upload->id_catalog = null;
            $upload->user_id = Auth::user()->id;;
            $upload->name = $filename;
            $upload->size = $filesize;
            $upload->mime = $file->getClientOriginalExtension();;
            $upload->location = 'uploads/catalog/' . $filename;
            $upload->sort = 1;
        }

        $upload->update();
        return redirect()->back()->with('status', 'อัพเดทข้อมูลสำเร็จ');
    }


    public function destroy($id)
    {
        $upload = Catalog::find($id);
        $destination = 'uploads/catalog/' . $upload->name;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $upload->delete();
        return redirect()->back()->with('status', 'Student Image Deleted Successfully');
    }
}
