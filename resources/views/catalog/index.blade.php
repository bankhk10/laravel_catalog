@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>อัลบั้มของฉัน
                            <a href="{{ url('add-catalog') }}" class="btn btn-secondary float-end">สร้างอัลบั้ม</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="album py-5 bg-light">
                            <div class="container">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                    @foreach ($nameCatalog as $item)
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <img src="https://samitivej-prod-new-website.s3.ap-southeast-1.amazonaws.com/public/uploads/contents/265936eaa808f626d71d1662349c82f3.jpg"
                                                    class="bd-placeholder-img card-img-top" width="100%" height="225"
                                                    alt="Image">
                                                <div class="card-body">
                                                    <p class="card-text">{{ $item->name_catalog }}</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <a href="{{ url('show-catalog/' . $item->id) }}"
                                                                class="btn btn-sm btn-outline-secondary">ดูภาพ</a>
                                                            <a href="{{ url('add-catalog-photo/' . $item->id) }}"
                                                                class="btn btn-sm btn-outline-secondary">เพิ่มภาพ</a>
                                                            <a href="{{ url('edit-catalog/' . $item->id) }}"
                                                                class="btn btn-sm btn-outline-secondary">แก้ไขชื่ออัลบัม</a>
                                                        </div>
                                                        <form action="{{ url('delete-catalog/' . $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
