<?php

namespace App\Http\Controllers;

use App\Graph;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GraphController extends Controller
{
    public function getGraph() {
        $lastShift = Graph::orderBy('created_at', 'desc')->first();

        if (empty($lastShift)) {
            $list = new \stdClass();

            $person = new \stdClass();
            $person->name = '';
            $person->time = [];

            $list->drivers = [$person];
            $list->firefighters = [$person];
            $list->duties = new \stdClass();
            $list->duties->duty_chief = '';
            $list->duties->duty_man = '';
            $list->duties->facade = '';

            $list = json_encode($list);
        } else {
            $list = $lastShift->list;
        }

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
