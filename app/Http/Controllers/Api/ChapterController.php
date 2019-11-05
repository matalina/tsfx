<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\Save;

class ChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show($chapter_key, $scene_key = null)
    {
        $queue = Chapter::find($chapter_key)
            ->with(['scenes','scenes.rooms', 'scenes.items','scene.people']);

        if($scene_key != null) {
            $queue->whereHas('scenes', function($query) use ($scene_key) {
                $query->where('key', '=', $scene_key);
            });
        }

        $chapter = $queue->first();

        return response()->json($chapter->load('scenes'));
    }
}
