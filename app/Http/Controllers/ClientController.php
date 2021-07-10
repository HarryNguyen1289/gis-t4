<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Node;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $rooms = Room::all()->sortBy('id');
        return view('index', compact('rooms'));
    }

    public function viewPath(){
        return view('path');
    }
}
