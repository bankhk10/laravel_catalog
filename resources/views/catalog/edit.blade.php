
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
                        <h4>แก้ไขชื่ออัลบั้ม
                            <a href="{{ url('photo') }}" class="btn btn-secondary float-end">ย้อนกลับ</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update-catalog/' . $nameCatalog->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name_catalog" value="{{ $nameCatalog->name_catalog }}"
                                class="form-control">

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary mt-2">อัพเดท</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
