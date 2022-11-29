<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\NameCatalog;
use Auth;


class CatalogController extends Controller
{
    //
    public function index(){
        $nameCatalog = NameCatalog::all()->where('user_id', Auth::user()->id);
        return view('catalog.index', compact('nameCatalog'));
    }

    public function create()
    {
        return view('catalog.create');
    }

    public function store(Request $request)
    {

        $nameCatalog = new NameCatalog;
        $nameCatalog->name_catalog = $request->input('name_catalog');
        $nameCatalog->user_id = Auth::user()->id;
        $nameCatalog->save();

        // foreach ($request->file as $file) {
        //     $fileOriginal = $file->getClientOriginalName();
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $filesize = $file->getSize();
        //     $file->move('uploads/catalog', $filename);
        //     $fileModel = new catalog;
        //     $fileModel->user_id = Auth::user()->id;
        //     $fileModel->name = $filename;
        //     $fileModel->name_catalog = $request->input('name_catalog');;
        //     $fileModel->file_original_name = $fileOriginal;
        //     $fileModel->size = $filesize;
        //     $fileModel->mime = $file->getClientOriginalExtension();;
        //     $fileModel->location = 'uploads/catalog/' . $filename;
        //     $fileModel->sort = 1;
        //     $fileModel->save();
        // }

        return redirect('/catalog')->with('success', 'บันทึกสำเร็จ');
    }

    public function show(Request $request)
    {
        $catalog_name = $request->id;
        $catalog = Catalog::all()->where('user_id', Auth::user()->id)->where('id_catalog', $catalog_name);
        return view('catalog.show', compact('catalog'));

    }


    public function addPhoto($id)
    {
        $nameCatalog = NameCatalog::find($id);
        return view('catalog.addPhoto', compact('nameCatalog'));
        // return view('catalog.addPhoto');
    }

    public function storeAddPhoto(Request $request)
    {

        foreach ($request->file as $file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $filesize = $file->getSize();
            $file->move('uploads/catalog', $filename);
            $fileModel = new catalog;
            $fileModel->user_id = Auth::user()->id;
            $fileModel->name = $filename;
            $fileModel->id_catalog = $request->input('name_catalog');
            $fileModel->size = $filesize;
            $fileModel->mime = $file->getClientOriginalExtension();;
            $fileModel->location = 'uploads/catalog/' . $filename;
            $fileModel->sort = 1;
            $fileModel->save();
        }

        return redirect('/catalog')->with('success', 'บันทึกสำเร็จ');
    }


    public function edit($id)
    {
        // $catalog_name = $request->id;

        $nameCatalog = NameCatalog::find($id);
        // echo  $catalog;
        return view('catalog.edit', compact('nameCatalog'));
    }

    public function update(Request $request, $id)
    {
        $nameCatalog = NameCatalog::find($id);
        $nameCatalog->user_id = Auth::user()->id;
        $nameCatalog->name_catalog = $request->input('name_catalog');

        $nameCatalog->update();
        return redirect()->back()->with('status', 'อัพเดทข้อมูลสำเร็จ');
    }

    public function destroy($id)
    {
        $nameCatalog = NameCatalog::find($id);
        // $destination = 'uploads/photo/' . $nameCatalog->name;
        // if (File::exists($destination)) {
        //     File::delete($destination);
        // }
        $nameCatalog->delete();
        return redirect()->back()->with('status', 'Student Image Deleted Successfully');
    }

    public function sort(Request $request, $id)
    {

        $nameCatalog = NameCatalog::all()->where('user_id', Auth::user()->id);
        return view('catalog.sort', compact('nameCatalog'));
        // return view('catalog.sort');
    }



}
