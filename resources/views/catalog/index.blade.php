@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>อัลบัมของฉัน
                            <a href="{{ url('add-catalog') }}" class="btn btn-secondary float-end">สร้างอัลบัม</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="album py-5 bg-light">
                            <div class="container">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                                    @foreach ($nameCatalog as $item)
                                        <div class="col">
                                            <div class="card shadow-sm">

                                                {{-- <img src="{{ asset('uploads/catalog/' . $item[0]->name) }}"
                                    class="bd-placeholder-img card-img-top" width="100%" height="225"
                                    alt="Image"> --}}

                                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                                    xmlns="https://play.google.com/store/apps/details?id=com.sleepwalkers.photoalbums&hl=th&gl=CV" role="img"
                                                    aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                                    focusable="false">
                                                    <title>อัลบัมของฉัน</title>
                                                    <rect width="100%" height="100%" fill="#55595c" /><text
                                                        x="50%" y="50%" fill="#eceeef"
                                                        dy=".3em">Test</text>
                                                </svg>

                                                <div class="card-body">
                                                    <p class="card-text">{{ $item->name_catalog }}</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <a href="{{ url('show-catalog/' . $item->id) }}"
                                                                class="btn btn-sm btn-outline-secondary">ดูภาพ</a>
                                                            {{-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button> --}}
                                                            {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                                                            <a href="{{ url('sort-catalog/' . $item->id) }}"
                                                                class="btn btn-sm btn-outline-secondary">จัดเรียงภาพ</a>
                                                            <a href="{{ url('add-catalog-photo/' . $item->id) }}"
                                                                class="btn btn-sm btn-outline-secondary">เพิ่มภาพ</a>
                                                            <a href="{{ url('edit-catalog/' . $item->id) }}"
                                                                class="btn btn-sm btn-outline-secondary">แก้ไขชื่ออัลบัม</a>

                                                        </div>
                                                        {{-- <small class="text-muted">9 mins</small> --}}
                                                        {{-- <a href="{{ url('show-catalog/'.$item[0]->name_catalog) }}" class="btn btn-sm btn-outline-secondary">ลบ</a> --}}
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
