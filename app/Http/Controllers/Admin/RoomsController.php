<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Room\DestroyRoom;
use App\Http\Requests\Admin\Room\IndexRoom;
use App\Http\Requests\Admin\Room\StoreRoom;
use App\Http\Requests\Admin\Room\UpdateRoom;
use App\Models\Room;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRoom $request
     * @return Response|array
     */
    public function index(IndexRoom $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Room::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'name'],

            // set columns to searchIn
            ['id', 'title', 'name', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.room.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin.room.create');

        return view('admin.room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoom $request
     * @return Response|array
     */
    public function store(StoreRoom $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Room
        $room = Room::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/rooms'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/rooms');
    }

    /**
     * Display the specified resource.
     *
     * @param Room $room
     * @throws AuthorizationException
     * @return void
     */
    public function show(Room $room)
    {
        $this->authorize('admin.room.show', $room);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Room $room
     * @throws AuthorizationException
     * @return Response
     */
    public function edit(Room $room)
    {
        $this->authorize('admin.room.edit', $room);


        return view('admin.room.edit', [
            'room' => $room,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoom $request
     * @param Room $room
     * @return Response|array
     */
    public function update(UpdateRoom $request, Room $room)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Room
        $room->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/rooms'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/rooms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRoom $request
     * @param Room $room
     * @throws Exception
     * @return Response|bool
     */
    public function destroy(DestroyRoom $request, Room $room)
    {
        $room->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param DestroyRoom $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(DestroyRoom $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Room::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
