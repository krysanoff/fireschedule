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
}
