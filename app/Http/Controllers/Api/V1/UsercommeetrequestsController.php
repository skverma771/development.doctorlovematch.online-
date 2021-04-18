<?php

namespace App\Http\Controllers\Api\V1;

use App\Usercommeetrequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Usercommeetrequest as UsercommeetrequestResource;
use App\Http\Requests\Admin\StoreUsercommeetrequestsRequest;
use App\Http\Requests\Admin\UpdateUsercommeetrequestsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class UsercommeetrequestsController extends Controller
{
    public function index()
    {
        

        return new UsercommeetrequestResource(Usercommeetrequest::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('usercommeetrequest_view')) {
            return abort(401);
        }

        $usercommeetrequest = Usercommeetrequest::with([])->findOrFail($id);

        return new UsercommeetrequestResource($usercommeetrequest);
    }

    public function store(StoreUsercommeetrequestsRequest $request)
    {
        if (Gate::denies('usercommeetrequest_create')) {
            return abort(401);
        }

        $usercommeetrequest = Usercommeetrequest::create($request->all());
        
        

        return (new UsercommeetrequestResource($usercommeetrequest))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateUsercommeetrequestsRequest $request, $id)
    {
        if (Gate::denies('usercommeetrequest_edit')) {
            return abort(401);
        }

        $usercommeetrequest = Usercommeetrequest::findOrFail($id);
        $usercommeetrequest->update($request->all());
        
        
        

        return (new UsercommeetrequestResource($usercommeetrequest))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('usercommeetrequest_delete')) {
            return abort(401);
        }

        $usercommeetrequest = Usercommeetrequest::findOrFail($id);
        $usercommeetrequest->delete();

        return response(null, 204);
    }
}
