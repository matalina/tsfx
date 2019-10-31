<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Save;

class ChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show(Save $save)
    {
        $chapter = $save->state->chapter->id;
        $data = $save->state;
        
        switch($chapter)
        {
            case 0:
                $view = view('game.chapter0000');
                break;
            default:
                abort(404);
        }
        
        return $view->with('data', $data);
    }
}
