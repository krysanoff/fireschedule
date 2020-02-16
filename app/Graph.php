<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Graph extends Model
{
    public $timestamps = [ "created_at" ];

    public function shift()
    {
        return $this->belongsTo('App\Shift');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function getLast($user_id, $shift_id)
    {
        $lastGraph = self::orderBy('created_at', 'desc')
                        ->where('user_id', $user_id)
                        ->where('shift_id', $shift_id)
                        ->first();

        if (empty($lastGraph)) {
            $list = new \stdClass();

            $person = new \stdClass();
            $person->name = '';
            $person->time = [];

            $list->drivers = [$person];
            $list->firefighters = [$person];
            $list->duties = new \stdClass();
            $list->duties->shift_boss = '';
            $list->duties->duty_boss = '';
            $list->duties->duty_man = '';
            $list->duties->facade = '';

            $list = json_encode($list);
        } else {
            $list = $lastGraph->list;
        }

        return $list;
    }

    public static function saveGraph(Request $request)
    {
        $user = Auth::user();
        $post = $request->all();
        $graph = new Graph();

        $graph->created_at = new \DateTime();
        $graph->updated_at = null;
        $graph->list       = json_encode($post['list']);
        $graph->shift_id   = $post['shift_id'];
        $graph->schema     = ""; //TODO change it when there will 2 or more schemas
        $graph->user_id    = $user->id;

        if ($graph->save()) {
            return json_encode(['completed' => true]);
        } else {
            return json_encode(['completed' => false]);
        }
    }
}
