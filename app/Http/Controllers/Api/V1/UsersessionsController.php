<?php

namespace App\Http\Controllers\Api\V1;

use App\Usersession;
use App\Http\Controllers\Controller;
use App\Http\Resources\Usersession as UsersessionResource;
use App\Http\Requests\Admin\StoreUsersessionsRequest;
use App\Http\Requests\Admin\UpdateUsersessionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class UsersessionsController extends Controller
{
    public function index()
    {
        

        return new UsersessionResource(Usersession::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('usersession_view')) {
            return abort(401);
        }

        $usersession = Usersession::with([])->findOrFail($id);

        return new UsersessionResource($usersession);
    }

    public function store(StoreUsersessionsRequest $request)
    {
        if (Gate::denies('usersession_create')) {
            return abort(401);
        }

        $usersession = Usersession::create($request->all());
        
        

        return (new UsersessionResource($usersession))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateUsersessionsRequest $request, $id)
    {
        if (Gate::denies('usersession_edit')) {
            return abort(401);
        }

        $usersession = Usersession::findOrFail($id);
        $usersession->update($request->all());
        
        
        

        return (new UsersessionResource($usersession))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('usersession_delete')) {
            return abort(401);
        }

        $usersession = Usersession::findOrFail($id);
        $usersession->delete();

        return response(null, 204);
    }
}
