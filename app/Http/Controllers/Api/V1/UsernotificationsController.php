<?php

namespace App\Http\Controllers\Api\V1;

use App\Usernotification;
use App\Http\Controllers\Controller;
use App\Http\Resources\Usernotification as UsernotificationResource;
use App\Http\Requests\Admin\StoreUsernotificationsRequest;
use App\Http\Requests\Admin\UpdateUsernotificationsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class UsernotificationsController extends Controller
{
    public function index()
    {
        

        return new UsernotificationResource(Usernotification::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('usernotification_view')) {
            return abort(401);
        }

        $usernotification = Usernotification::with([])->findOrFail($id);

        return new UsernotificationResource($usernotification);
    }

    public function store(StoreUsernotificationsRequest $request)
    {
        if (Gate::denies('usernotification_create')) {
            return abort(401);
        }

        $usernotification = Usernotification::create($request->all());
        
        

        return (new UsernotificationResource($usernotification))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateUsernotificationsRequest $request, $id)
    {
        if (Gate::denies('usernotification_edit')) {
            return abort(401);
        }

        $usernotification = Usernotification::findOrFail($id);
        $usernotification->update($request->all());
        
        
        

        return (new UsernotificationResource($usernotification))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('usernotification_delete')) {
            return abort(401);
        }

        $usernotification = Usernotification::findOrFail($id);
        $usernotification->delete();

        return response(null, 204);
    }
}
