<?php

namespace App\Http\Controllers\Api\V1;

use App\Userspaymentsplan;
use App\Http\Controllers\Controller;
use App\Http\Resources\Userspaymentsplan as UserspaymentsplanResource;
use App\Http\Requests\Admin\StoreUserspaymentsplansRequest;
use App\Http\Requests\Admin\UpdateUserspaymentsplansRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class UserspaymentsplansController extends Controller
{
    public function index()
    {


        return new UserspaymentsplanResource(Userspaymentsplan::with([])->get());
    }

    public function show($id)
    {
//        if (Gate::denies('userspaymentsplan_view')) {
//            return abort(401);
//        }

        $userspaymentsplan = Userspaymentsplan::with(['payment'])->where('user_id',$id)->get();

        return new UserspaymentsplanResource($userspaymentsplan);
    }

    public function store(StoreUserspaymentsplansRequest $request)
    {
        if (Gate::denies('userspaymentsplan_create')) {
            return abort(401);
        }

        $userspaymentsplan = Userspaymentsplan::create($request->all());



        return (new UserspaymentsplanResource($userspaymentsplan))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateUserspaymentsplansRequest $request, $id)
    {
        if (Gate::denies('userspaymentsplan_edit')) {
            return abort(401);
        }

        $userspaymentsplan = Userspaymentsplan::findOrFail($id);
        $userspaymentsplan->update($request->all());




        return (new UserspaymentsplanResource($userspaymentsplan))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('userspaymentsplan_delete')) {
            return abort(401);
        }

        $userspaymentsplan = Userspaymentsplan::findOrFail($id);
        $userspaymentsplan->delete();

        return response(null, 204);
    }
}
