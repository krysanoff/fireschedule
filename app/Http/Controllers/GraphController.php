<?php

namespace App\Http\Controllers;

use App\Graph;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GraphController extends Controller
{
    public function getGraph() {
        $graph = Graph::select('list')->orderBy('created_at', 'desc')->first();

        return view('welcome', compact('graph'));
    }
}
