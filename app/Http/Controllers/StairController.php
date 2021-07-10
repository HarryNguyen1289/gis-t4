<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Floor;
use App\Models\Stair;
use App\Models\Node;
use App\Models\Line;
use App\Models\StairNode;

class StairController extends Controller
{
    public function index(){
        $stairs = Stair::all()->sortByDesc('created_at');
        return view('stair.index', compact('stairs'));
    }

    public function create(){
        $nodes = Node::all()->sortBy('id')->take(36);
        $floors = Floor::all()->sortBy('name');
        return view('stair.create', compact('nodes', 'floors'));
    }

    public function store(Request $request){
        $start_node_id = $request->input('node_id');
        $highest_floor_id = $request->input('highest_floor_id');
        $new_stair = Stair::create($request->all());
        
        // add lines for stair
        $length = 36;
        $length_prev = 0;
        for ($floor = 1; $floor <= $highest_floor_id; $floor++) {
            StairNode::create([
                'stair_id' => $new_stair->id,
                'node_id' => $start_node_id + $length_prev
            ]); 

            if ($floor >= 2) {
                Line::create([
                    'first_node' => $length_prev + $start_node_id - $length,
                    'second_node' => $length_prev + $start_node_id,
                    'distance' => 0
                ]);
            }
            
            if ($floor > 5) {
                $length -= 6;
            }

            $length_prev += $length;
        }

        return redirect()->route('stair.create')->with('success', 'Thêm cầu thang / thang máy thành công!');
    }

    public function edit($id){
        $stair = Stair::find($id);
        $nodes = Node::all()->sortBy('id')->take(36);
        $floors = Floor::all()->sortBy('name');
        return view('stair.edit', compact('stair', 'nodes', 'floors'));
    }

    public function update(Request $request, $id){
        $start_node_id = $request->input('node_id');
        $highest_floor_id = $request->input('highest_floor_id');

        $stair = Stair::find($id);
        $stair->update($request->all());

        // remove lines for stair
        $stair_node_to_remove_line = StairNode::where('stair_id',$id)->orderByRaw('node_id * 1 asc')->get();
        
        for ($index = 0; $index < count($stair_node_to_remove_line); $index++) {
            if ($index > 0) {
                Line::where('first_node', $stair_node_to_remove_line[$index - 1]->node_id)
                ->where('second_node', $stair_node_to_remove_line[$index]->node_id)
                ->delete();
            }
        }
        StairNode::where('stair_id',$id)->delete();
        
        // add lines for stair
        $length = 36;
        $length_prev = 0;
        for ($floor = 1; $floor <= $highest_floor_id; $floor++) {
            StairNode::create([
                'stair_id' => $id,
                'node_id' => $start_node_id + $length_prev
            ]); 

            if ($floor >= 2) {
                Line::create([
                    'first_node' => $length_prev + $start_node_id - $length,
                    'second_node' => $length_prev + $start_node_id,
                    'distance' => 0
                ]);
            }
            
            if ($floor > 5) {
                $length -= 6;
            }

            $length_prev += $length;
        }

        return redirect()->route('stair.index')->with('success', 'Sửa cầu thang / thang máy thành công!');
    }

    public function delete($id){
        $stair = Stair::find($id);

        // remove lines for stair
        $stair_node_to_remove_line = StairNode::where('stair_id',$id)->orderByRaw('node_id * 1 asc')->get();
        
        for ($index = 0; $index < count($stair_node_to_remove_line); $index++) {
            if ($index > 0) {
                Line::where('first_node', $stair_node_to_remove_line[$index - 1]->node_id)
                ->where('second_node', $stair_node_to_remove_line[$index]->node_id)
                ->delete();
            }
        }
        StairNode::where('stair_id',$id)->delete();
        $stair->delete();
        return redirect()->route('stair.index')->with('success', 'Xóa cầu thang / thang máy thành công');
    }
}
