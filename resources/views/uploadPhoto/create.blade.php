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
                        <h4>อัพโหลดรูปภาพ
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('add-photo') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="file" name="photo" class="form-control" accept="image/*" required>
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
