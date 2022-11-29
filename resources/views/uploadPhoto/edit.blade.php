@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>แก้ไขรูป
                        <a href="{{ url('photo') }}" class="btn btn-secondary float-end">ย้อนกลับ</a>
                    </h4>
                </div>
                <div class="card-body">
                    <img class="center" src="{{ asset('uploads/catalog/'.$upload->name) }}" alt="Image">

                    <form action="{{ url('update-photo/'.$upload->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">กรุณาเลือกรูป</label>
                            <input type="file" name="photo" class="form-control" accept="image/*" required>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">อัพเดท</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection


<style>
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
