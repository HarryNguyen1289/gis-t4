@extends('layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Floor
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form action="{{ route('floor.update', $floor->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên tầng</label>
                        <input type="text" class="form-control" value="{{ $floor->name }}" name="name"/>
                    </div>
                    <div class="form-group">
                        <label>Độ cao</label>
                        <input type="text" class="form-control" value="{{ $floor->height }}" name="height"/>
                    </div>
                    <div class="form-group">
                        <label>Danh sách tọa độ</label>
                        <textarea class="form-control" name="coordinates" id="" cols="30" rows="10">{{ $floor->coordinates }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Update</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
