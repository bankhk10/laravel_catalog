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
                        <h4>เพิ่มภาพ
                            <a href="{{ url('photo') }}" class="btn btn-secondary float-end">ย้อนกลับ</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('add-catalog-photo') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $nameCatalog->id }}" name="name_catalog" class="form-control">
                            <div class="form-group mb-3">
                                {{-- <label for="">กรุณาเลือกรูป</label> --}}
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

        @endsection



