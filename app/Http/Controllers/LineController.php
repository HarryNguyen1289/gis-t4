<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Floor;
use App\Models\Node;
use App\Models\Line;

class LineController extends Controller
{
    public function index(){
        $lines = Line::all()->sortByDesc('created_at');
        return view('line.index', compact('lines'));
    }

    public function create(){
        $nodes = Node::all()->sortBy('id');
        return view('line.create', compact('nodes'));
    }

    public function store(Request $request){
        Line::create($request->all());
        return redirect()->route('line.create')->with('success', 'Thêm Line thành công!');
    }

    public function edit($id){
        $line = Line::find($id);
        $nodes = Node::all()->sortBy('id');
        return view('line.edit', compact('line', 'nodes'));
    }

    public function update(Request $request, $id){
        $line = Line::find($id);
        $line->update($request->all());

        return redirect()->route('line.index')->with('success', 'Sửa Line thành công!');
    }

    public function delete($id){
        Line::find($id)->delete();
        return redirect()->route('room.index')->with('success', 'Xóa Line thành công');
    }
}
