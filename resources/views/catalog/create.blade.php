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
                        <h4>สร้างอัลบั้ม
                            <a href="{{ url('catalog') }}" class="btn btn-secondary float-end">ย้อนกลับ</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('add-catalog') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">ชื่ออัลบั้ม</label>
                                <input type="text" name="name_catalog" class="form-control" required>
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
@endsection
