@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>รูปของฉัน </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>รูป</th>
                                <th>ขยาย</th>
                                <th>ขนาด</th>
                                <th>นามสกุลไฟล์</th>
                                <th>วันที่สร้าง</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($upload as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset('uploads/catalog/'.$item->name) }}" width="70px" height="70px" alt="Image">
                                </td>
                                <td><a href="{{ $item->location }}">คลิก เพื่อขยาย</a></td>
                                <td>
                                    @if ($item->size < 1000)
                                        {{ number_format($item->size, 2) }} bytes
                                    @elseif($item->size >= 1000000)
                                        {{ number_format($item->size / 1000000, 2) }} mb
                                    @else
                                        {{ number_format($item->size / 1000, 2) }} kb
                                    @endif
                                </td>
                                <td>{{ $item->mime }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>

                                <td>
                                    <a href="{{ url('edit-photo/'.$item->id) }}" class="btn btn-primary btn-sm">แก้ไข</a>
                                </td>
                                <td>
                                    <form action="{{ url('delete-photo/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $upload->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
