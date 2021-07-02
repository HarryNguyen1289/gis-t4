@extends('layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Room
                    <small>Create</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form action="{{ route('room.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên phòng</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <div class="form-group">
                        <label>Loại phòng</label>
                        <input type="text" class="form-control" name="type"/>
                    </div>
                    <div class="form-group">
                        <label>Tọa độ 1</label>
                        <input type="text" class="form-control" name="coordinate_x"/>
                    </div>
                    <div class="form-group">
                        <label>Tọa độ 2</label>
                        <input type="text" class="form-control" name="coordinate_y"/>
                    </div>
                    <div class="form-group">
                        <label>Tầng</label>
                        <select class="form-control" name="floor_id" id="cars">
                        @foreach($floors as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Create</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
