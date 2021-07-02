<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::all()->sortByDesc('created_at');
        return view('room.index', compact('rooms'));
    }

    public function create(){
        $floors = Floor::all()->sortByDesc('created_at');
        return view('room.create', compact('floors'));
    }

    public function store(Request $request){
        Room::create($request->all());
        return redirect()->route('room.create')->with('success', 'Thêm Room thành công!');
    }

    public function edit($id){
        $room = Room::find($id);
        return view('room.edit', compact('room'));
    }

    public function update(Request $request, $id){
        $floor = Room::find($id);
        $floor->update($request->all());

        return redirect()->route('room.create')->with('success', 'Sửa Room thành công!');
    }

    public function delete($id){
        Room::find($id)->delete();
        return redirect()->route('room.index')->with('success', 'Xóa Room thành công');
    }
}
