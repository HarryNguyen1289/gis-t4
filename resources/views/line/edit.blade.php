@extends('layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Line
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
                <form action="{{ route('line.update', $line->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Node thứ nhất</label>
                        <select class="form-control" name="first_node" value="{{$line->first_node}}">
                        @foreach($nodes as $item)
                            <option value="{{$item->id}}"  {{ ($line->first_node == $item->id) ? 'selected=selected' : '' }}>Node Id: {{$item->id}} || Floor Id: {{$item->floor_id}} || ({{$item->coordinate_x}}, {{$item->coordinate_y}})</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Node thứ hai</label>
                        <select class="form-control" name="second_node" value="{{$line->second_node}}">
                        @foreach($nodes as $item)
                            <option value="{{$item->id}}"  {{ ($line->second_node == $item->id) ? 'selected=selected' : '' }}>Node Id: {{$item->id}} || Floor Id: {{$item->floor_id}} || ({{$item->coordinate_x}}, {{$item->coordinate_y}})</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="display: none">
                        <input type="text" class="form-control" name="distance" value="0"/>
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
