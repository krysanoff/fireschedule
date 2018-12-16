<?php

namespace App\Http\Controllers;

use App\Graph;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GraphController extends Controller
{
    public function getGraph() {
        $list = Graph::orderBy('created_at', 'desc')->first()->list;

        return view('welcome', compact('list'));
    }

    public function saveGraph(Request $request) {
        $post = $request->all();
        $graph = new Graph();

        $graph->created_at = new \DateTime();
        $graph->updated_at = null;
        $graph->list = json_encode($post['list']);
        $graph->shift_id = $post['shift_id'];

        if ($graph->save()) {
            return json_encode(['completed' => true]);
        } else {
            return json_encode(['completed' => false]);
        }

    }
}
