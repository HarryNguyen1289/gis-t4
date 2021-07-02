@extends('layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Body
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
                <form action="{{ route('body.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Id *</label>
                        <input class="form-control" name="id" required/>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="desc"/>
                    </div>
                    <div class="form-group">
                        <label>Floor *</label>
                        <select name="floor_id" class="form-control" required>
                            @foreach($floor as $item_floor)
                                <option value="{{ $item_floor->id }}">{{ $item_floor->id}} - {{ $item_floor->name ?? '' }}</option>
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
