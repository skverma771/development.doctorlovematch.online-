<?php

namespace App\Http\Controllers\Api\V1;

use App\Usergroupmap;
use App\Http\Controllers\Controller;
use App\Http\Resources\Usergroupmap as UsergroupmapResource;
use App\Http\Requests\Admin\StoreUsergroupmapsRequest;
use App\Http\Requests\Admin\UpdateUsergroupmapsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class UsergroupmapsController extends Controller
{
    public function index()
    {
        

        return new UsergroupmapResource(Usergroupmap::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('usergroupmap_view')) {
            return abort(401);
        }

        $usergroupmap = Usergroupmap::with([])->findOrFail($id);

        return new UsergroupmapResource($usergroupmap);
    }

    public function store(StoreUsergroupmapsRequest $request)
    {
        if (Gate::denies('usergroupmap_create')) {
            return abort(401);
        }

        $usergroupmap = Usergroupmap::create($request->all());
        
        

        return (new UsergroupmapResource($usergroupmap))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateUsergroupmapsRequest $request, $id)
    {
        if (Gate::denies('usergroupmap_edit')) {
            return abort(401);
        }

        $usergroupmap = Usergroupmap::findOrFail($id);
        $usergroupmap->update($request->all());
        
        
        

        return (new UsergroupmapResource($usergroupmap))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('usergroupmap_delete')) {
            return abort(401);
        }

        $usergroupmap = Usergroupmap::findOrFail($id);
        $usergroupmap->delete();

        return response(null, 204);
    }
}
