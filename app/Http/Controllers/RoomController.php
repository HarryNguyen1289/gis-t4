<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Node;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::all()->sortByDesc('created_at');
        return view('room.index', compact('rooms'));
    }

    public function create(){
        $nodes = Node::all()->sortBy('id');
        return view('room.create', compact('nodes'));
    }

    public function store(Request $request){
        Room::create($request->all());
        return redirect()->route('room.create')->with('success', 'Thêm phòng thành công!');
    }

    public function edit($id){
        $room = Room::find($id);
        $nodes = Node::all()->sortBy('id');
        return view('room.edit', compact('room', 'nodes'));
    }

    public function update(Request $request, $id){
        $room = Room::find($id);
        $room->update($request->all());

        return redirect()->route('room.index')->with('success', 'Sửa phòng thành công!');
    }

    public function delete($id){
        Room::find($id)->delete();
        return redirect()->route('room.index')->with('success', 'Xóa phòng thành công');
    }
}
