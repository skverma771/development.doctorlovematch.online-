<?php

namespace App\Http\Controllers\Api\V1;

use App\Groupsmember;
use App\Http\Controllers\Controller;
use App\Http\Resources\Groupsmember as GroupsmemberResource;
use App\Http\Requests\Admin\StoreGroupsmembersRequest;
use App\Http\Requests\Admin\UpdateGroupsmembersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class GroupsmembersController extends Controller
{
    public function index()
    {
        

        return new GroupsmemberResource(Groupsmember::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('groupsmember_view')) {
            return abort(401);
        }

        $groupsmember = Groupsmember::with([])->findOrFail($id);

        return new GroupsmemberResource($groupsmember);
    }

    public function store(StoreGroupsmembersRequest $request)
    {
        if (Gate::denies('groupsmember_create')) {
            return abort(401);
        }

        $groupsmember = Groupsmember::create($request->all());
        
        

        return (new GroupsmemberResource($groupsmember))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateGroupsmembersRequest $request, $id)
    {
        if (Gate::denies('groupsmember_edit')) {
            return abort(401);
        }

        $groupsmember = Groupsmember::findOrFail($id);
        $groupsmember->update($request->all());
        
        
        

        return (new GroupsmemberResource($groupsmember))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('groupsmember_delete')) {
            return abort(401);
        }

        $groupsmember = Groupsmember::findOrFail($id);
        $groupsmember->delete();

        return response(null, 204);
    }
}
