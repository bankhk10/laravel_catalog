@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>เพิ่มรูปภาพ
                            <a href="{{ url('catalog') }}" class="btn btn-secondary float-end">ย้อนกลับ</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('add-catalog-photo') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $nameCatalog->id }}" name="name_catalog" class="form-control">
                            <div class="form-group mb-3">
                                <input type="file" name="file[]" class="form-control" accept="image/*" multiple
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>รูปของฉัน
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('select-catalog') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="album py-5 bg-light">
                                <div class="container">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                        @foreach ($catalog as $item)
                                            <div class="col">
                                                <div class="card shadow-sm">
                                                    <div class="form-check">
                                                        <input type="hidden" value="{{ $nameCatalog->id }}"
                                                            name="name_catalog" class="form-control">
                                                        <input type="checkbox" value="{{ $item->id }}"
                                                            name="selectChack[]">
                                                        <label class="form-check-label">
                                                            เลือกรูป
                                                        </label>
                                                    </div>
                                                    <img src="{{ asset('uploads/catalog/' . $item->name) }}"
                                                        class="bd-placeholder-img card-img-top" width="100%"
                                                        height="225" alt="Image">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <button id="submit" type="hedden" class="btn btn-primary">บันทึก</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
