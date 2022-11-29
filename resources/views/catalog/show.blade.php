@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>รูปภาพทั้งหมดในอัลบั้ม
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="album py-5 bg-light">
                            <div class="container">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                                    @foreach ($catalog as $item)
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <img src="{{ asset('uploads/catalog/' . $item->name) }}"
                                                    class="bd-placeholder-img card-img-top" width="100%" height="225"
                                                    alt="Image">
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
