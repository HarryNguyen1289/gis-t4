<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index(){
        $floor = Floor::all()->sortByDesc('created_at');
        return view('floor.index', compact('floor'));
    }

    public function create(){

        return view('floor.create');
    }

    public function store(Request $request){
        Floor::create($request->all());
        return redirect()->route('floor.create')->with('success', 'Thêm tầng thành công!');
    }

    public function edit($id){
        $floor = Floor::find($id);
        return view('floor.edit', compact('floor'));
    }

    public function update(Request $request, $id){
        $floor = Floor::find($id);
        $floor->update($request->all());

        return redirect()->route('floor.index')->with('success', 'Sửa tầng thành công!');
    }

    public function delete($id){
        Floor::find($id)->delete();
        return redirect()->route('floor.index')->with('success', 'Xóa tầng thành công');
    }
}
