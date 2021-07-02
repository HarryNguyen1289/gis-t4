@extends('layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cầu thang & Thang máy
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
                <form action="{{ route('stair.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <div class="form-group">
                        <label>Loại</label>
                        <select class="form-control" name="type">
                            <option value="Cầu thang">Cầu thang</option>
                            <option value="Thang máy">Thang máy</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tọa độ chân cầu thang</label>
                        <select class="form-control" name="node_id">
                        @foreach($nodes as $item)
                            <option value="{{$item->id}}">Node Id: {{$item->id}} || Floor Id: {{$item->floor_id}} || ({{$item->coordinate_x}}, {{$item->coordinate_y}})</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tầng cao nhất có thể tới</label>
                        <select class="form-control" name="highest_floor_id">
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
