<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Node;
use App\Models\Line;
use App\Models\Stair;
use App\Models\Room;
use App\Models\Floor;
use App\Models\StairNode;

class NodeController extends Controller
{
    public function index(){
        $nodes = Node::all()->sortByDesc('created_at');
        return view('node.index', compact('nodes'));
    }

    public function create(){
        $floors = Floor::all()->sortBy('id');
        return view('node.create', compact('floors'));
    }

    public function store(Request $request){
        Node::create($request->all());
        return redirect()->route('node.create')->with('success', 'Thêm Node thành công!');
    }

    public function edit($id){
        $node = Node::find($id);
        $floors = Floor::all()->sortBy('id');
        return view('node.edit', compact('node', 'floors'));
    }

    public function update(Request $request, $id){
        $node = Node::find($id);
        $node->update($request->all());

        return redirect()->route('node.index')->with('success', 'Sửa Node thành công!');
    }

    public function delete($id){
        Node::find($id)->delete();
        return redirect()->route('node.index')->with('success', 'Xóa Node thành công');
    }

    public function get_shortest_path(Request $request) {
        $start_node_id = (int)$request->input('start_node_id');
        $end_node_id = (int)$request->input('end_node_id');

        $node_list = $this->bfs_path($start_node_id, $end_node_id);
        
        // Get path by text
        $text_list = array();
        $stair_steps = 0;
        $stair_is_in = false;
        $current_stair;
        $lineData = [];
        foreach($node_list as $index=>$node_id) {
            $current_node = Node::find($node_id);
            $current_floor = Floor::find($current_node->floor_id);

            if ($index == 0) {
                $start_room = Room::where('node_id', $node_id)->get();
                if (!$start_room->isEmpty()) {
                    $first_room = $start_room->first();
                    $text_list[] = "Từ phòng " . $first_room->name;
                    $lineData[] = array(
                        'pos' => array(
                            'x' => $current_node->coordinate_x,
                            'y' => $current_node->coordinate_y,
                            'z' => $current_floor->height
                        ), 
                        'type' => 'room',
                        'name' => $first_room->name,
                        'nodeId' => $node_id
                    );
                }
            } else {
                $stair_nodes = StairNode::where('node_id', $node_id)->get();
                if (!$stair_nodes->isEmpty()) {
                    $stair_is_in = true;
                    $stair_steps = $stair_steps + 1;

                    $stair_id = $stair_nodes->first()->stair_id;
                    $stairs = Stair::where('id', $stair_id)->get();
                    if (!$stairs->isEmpty()) {
                        $current_stair = $stairs->first();

                        $lineData[] = array(
                            'pos' => array(
                                'x' => $current_node->coordinate_x,
                                'y' => $current_node->coordinate_y,
                                'z' => $current_floor->height
                            ), 
                            'type' => 'stair',
                            'name' => $current_stair->name,
                            'nodeId' => $node_id
                        );
                    }
                } else {
                    if ($stair_is_in and $stair_steps > 1) {
                        $text_list[] = "Lên " . $current_stair->name . " tới tầng " . $current_node->floor_id;
                    }
                    $stair_steps = 0;
                    $stair_is_in = false;
                    $rooms = Room::where('node_id', $node_id)->get();
                    if (!$rooms->isEmpty()) {
                        $room = $rooms->first();
                        $text_list[] = "Đi tới phòng " . $room->name;

                        $lineData[] = array(
                            'pos' => array(
                                'x' => $current_node->coordinate_x,
                                'y' => $current_node->coordinate_y,
                                'z' => $current_floor->height,
                                'nodeId' => $node_id
                            ), 
                            'type' => 'room',
                            'name' => $room->name
                        );
                    }

                    $lineData[] = array(
                        'pos' => array(
                            'x' => $current_node->coordinate_x,
                            'y' => $current_node->coordinate_y,
                            'z' => $current_floor->height,
                            'nodeId' => $node_id
                        ), 
                        'type' => 'normal',
                    );
                }
            }
        }
        return response()->json([
            'text_list' => $text_list,
            'lineData' => $lineData
        ]);
    }

    function test_bfs() {
        return $this->bfs_path(1, 100);
    }

    // BFS to return shortest path
    function bfs_path($start, $end) {
        $graph = array();
        $lines = Line::all();
        
        for($i = 0; $i < 300; $i++) {
            $graph[$i] = array();
        }

        foreach($lines as $line) {
            $first_node = (int)$line->first_node;
            $second_node = (int)$line->second_node;

            $graph[$first_node][] = $second_node;
            $graph[$second_node][] = $first_node;
        };

        $queue = new \SplQueue();

        $queue->enqueue([$start]);
        $visited = [$start];
    
        while ($queue->count() > 0) {
            $path = $queue->dequeue();
    
            $node = $path[sizeof($path) - 1];
            
            if ($node === $end) {
                return $path;
            }
    
            foreach ($graph[$node] as $neighbour) {
                if (!in_array($neighbour, $visited)) {
                    $visited[] = $neighbour;
    
                    $new_path = $path;
                    $new_path[] = $neighbour;
    
                    $queue->enqueue($new_path);
                }
            };
        }
    
        return false;
    }

    // public function hardcode_node_list(){
    //     $node_list = [['106.80352147840047', '10.86995080295406'],
    //     ['106.80352918975139', '10.869973192668493'],
    //     ['106.80354025386357', '10.869996899423112'],
    //     ['106.80355064742349', '10.870021264696744'],
    //     ['106.80356607012534', '10.8700387154996'],
    //     ['106.80359423331998', '10.870067031894521'],
    //     ['106.80358182810336', '10.870081190090966'],
    //     ['106.80359959773807', '10.870096336067823'],
    //     ['106.80362072013406', '10.87010753091979'],
    //     ['106.80364452473907', '10.870121689114313'],
    //     ['106.80366665296344', '10.870134859527237'],
    //     ['106.8037088977554', '10.870149676241066'],
    //     ['106.8037075566509', '10.870158566269009'],
    //     ['106.80374041371134', '10.870164822214438'],
    //     ['106.80377327077176', '10.8701687733378'],
    //     ['106.80379808120513', '10.870172395200843'],
    //     ['106.80382926188494', '10.870173382981665'],
    //     ['106.80385206066155', '10.870170419639187'],
    //     ['106.80385742507961', '10.870160871091036'],
    //     ['106.80388290606524', '10.870152968844042'],
    //     ['106.80390134625222', '10.870143749555613'],
    //     ['106.80392414502884', '10.8701322254447'],
    //     ['106.80394828490996', '10.87011642094898'],
    //     ['106.80397678338073', '10.870091397162405'],
    //     ['106.80399572648179', '10.870106543138753'],
    //     ['106.8040108139075', '10.870091397162405'],
    //     ['106.80402757771384', '10.87007098301917'],
    //     ['106.80404400624406', '10.8700492518329'],
    //     ['106.80406110532651', '10.870025545082425'],
    //     ['106.80408256299863', '10.869987021608903'],
    //     ['106.8040914478161', '10.869988009390323'],
    //     ['106.80409714751028', '10.86996561967701'],
    //     ['106.80410351775667', '10.869936974011921'],
    //     ['106.80410955272696', '10.869912608731418'],
    //     ['106.80411324076435', '10.869874414503903'],
    //     ['106.8041098880031', '10.86984280548435']];

    //     $length = 36;
    //     $length_prev = 0;
    //     for ($floor = 1; $floor <= 10; $floor++) {
    //         if ($floor > 5) {
    //             $length -= 6;
    //         }
    //         $node_list_to_add = array_slice($node_list, 0, $length);
    //         foreach ($node_list_to_add as $node) {
    //             Node::create([
    //                 'coordinate_x' => $node[0],
    //                 'coordinate_y' => $node[1],
    //                 'floor_id' => $floor
    //             ]);
    //         }

    //         for ($node_id = 1; $node_id < $length; $node_id++) {
    //             Line::create([
    //                 'first_node' => $length_prev + $node_id,
    //                 'second_node' => $length_prev + $node_id + 1,
    //                 'distance' => 1
    //             ]);
    //         }
    //         $length_prev += $length;
    //     }

        
        
    //     return "Done";
    // }
}
