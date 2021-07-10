@extends('layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Node
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
                <form action="{{ route('node.update', $node->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tọa độ X</label>
                        <input type="text" class="form-control" value="{{ $node->coordinate_x }}" name="coordinate_x"/>
                    </div>
                    <div class="form-group">
                        <label>Tọa độ Y</label>
                        <input type="text" class="form-control" value="{{ $node->coordinate_y }}" name="coordinate_y"/>
                    </div>
                    <div class="form-group">
                        <label>Tầng</label>
                        <select class="form-control" name="floor_id" value="{{ $node->floor_id }}">
                        @foreach($floors as $item)
                            <option value="{{$item->id}}" {{ ($node->floor_id == $item->id) ? 'selected=selected' : '' }}>{{$item->name}}</option>
                        @endforeach
                        </select>
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
