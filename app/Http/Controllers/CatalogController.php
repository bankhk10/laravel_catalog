<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\NameCatalog;
use Auth;


class CatalogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
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
        $catalog = Catalog::all()->where('user_id', Auth::user()->id)->where('id_catalog', '!=', $id);
        return view('catalog.addPhoto', compact('nameCatalog', 'catalog'));
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
        return redirect()->back()->with('status', 'เพิ่มรูปสำเร็จ');
    }


    public function edit($id)
    {

        $nameCatalog = NameCatalog::find($id);
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
        $nameCatalog->delete();
        return redirect()->back()->with('status', 'ลบรูปภาพสำเร็จ');
    }

    public function selectChack(Request $request)
    {
        $chack = $request->input('selectChack');
        if (empty($chack)) {
            return redirect()->back()->with('status', 'กรุณาเลือกรูป');
        } else {
            $id_catalog = $request->input('name_catalog');
            $selectChack =  $request->input('selectChack');
            foreach ($selectChack as $id) {
                catalog::where('id', '=',  $id)->update(array('id_catalog' => $id_catalog));
            }
        };

        return redirect()->back()->with('status', 'เพิ่มรูปสำเร็จ');
    }
}
