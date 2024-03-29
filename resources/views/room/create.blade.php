@extends('layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Phòng
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
                        <select class="form-control" name="type">
                            <option value="Phòng học">Phòng học</option>
                            <option value="Toilet">Toilet</option>
                            <option value="Phòng cơ sở vật chất">Phòng cơ sở vật chất</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Node</label>
                        <select class="form-control" name="node_id" id="cars">
                        @foreach($nodes as $item)
                            <option value="{{$item->id}}">Node Id: {{$item->id}} || Floor Id: {{$item->floor_id}} || ({{$item->coordinate_x}}, {{$item->coordinate_y}})</option>
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
