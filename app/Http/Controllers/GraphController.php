<?php

namespace App\Http\Controllers;

use App\Graph;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GraphController extends Controller
{
    public function getLastGraph($shift_id) {
        $lastGraph = Graph::getLast($shift_id);

        return view('graph', compact(['lastGraph', 'shift_id']));
    }

    public function saveGraph(Request $request) {
        $result = Graph::saveGraph($request);

        return $result;
    }
}
