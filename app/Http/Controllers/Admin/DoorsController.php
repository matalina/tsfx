<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Door\DestroyDoor;
use App\Http\Requests\Admin\Door\IndexDoor;
use App\Http\Requests\Admin\Door\StoreDoor;
use App\Http\Requests\Admin\Door\UpdateDoor;
use App\Models\Door;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DoorsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDoor $request
     * @return Response|array
     */
    public function index(IndexDoor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Door::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'direction', 'is_locked', 'key', 'room_a', 'room_b'],

            // set columns to searchIn
            ['id', 'direction']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.door.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin.door.create');

        return view('admin.door.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDoor $request
     * @return Response|array
     */
    public function store(StoreDoor $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Door
        $door = Door::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/doors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/doors');
    }

    /**
     * Display the specified resource.
     *
     * @param Door $door
     * @throws AuthorizationException
     * @return void
     */
    public function show(Door $door)
    {
        $this->authorize('admin.door.show', $door);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Door $door
     * @throws AuthorizationException
     * @return Response
     */
    public function edit(Door $door)
    {
        $this->authorize('admin.door.edit', $door);


        return view('admin.door.edit', [
            'door' => $door,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDoor $request
     * @param Door $door
     * @return Response|array
     */
    public function update(UpdateDoor $request, Door $door)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Door
        $door->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/doors'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/doors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDoor $request
     * @param Door $door
     * @throws Exception
     * @return Response|bool
     */
    public function destroy(DestroyDoor $request, Door $door)
    {
        $door->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param DestroyDoor $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(DestroyDoor $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Door::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
