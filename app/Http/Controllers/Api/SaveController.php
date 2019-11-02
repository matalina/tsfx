<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Save\StoreRequest;
use App\Http\Requests\Save\UpdateRequest;
use App\Models\Save;
use Illuminate\Http\Request;

class SaveController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Cannot preform this action.'
        ],400);
    }

    public function store(StoreRequest $request)
    {
        $save = Save::create([
            'user_id' => $request->get('user_id'),
            'name' => $request->get('name'),
            'state' => $request->get('state'),
            'key' => true,
        ]);

        return response()->json($save);
    }

    public function show(Save $save)
    {
        return response()->json($save);
    }

    public function update(UpdateRequest $request, Save $save)
    {
        $save->state = $request->get('state');
        $save->save();

        return response()->json($save);
    }

    public function destroy(Save $save)
    {
        $save->delete();

        return response()->json([
            'message' => 'Save deleted.'
        ]);
    }
}
