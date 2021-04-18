<?php

namespace App\Http\Controllers\Api\V1;

use App\Messageconection;
use App\Http\Controllers\Controller;
use App\Http\Resources\Messageconection as MessageconectionResource;
use App\Http\Requests\Admin\StoreMessageconectionsRequest;
use App\Http\Requests\Admin\UpdateMessageconectionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class MessageconectionsController extends Controller
{
    public function index()
    {
        
        return new MessageconectionResource(Messageconection::with(['message','user'])->get());

    }

    public function show($id)
    {
        if (Gate::denies('messageconection_view')) {
            return abort(401);
        }

        $messageconection = Messageconection::with([])->findOrFail($id);

        return new MessageconectionResource($messageconection);
    }

    public function store(StoreMessageconectionsRequest $request)
    {
        if (Gate::denies('messageconection_create')) {
            return abort(401);
        }

        $messageconection = Messageconection::create($request->all());
        
        

        return (new MessageconectionResource($messageconection))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateMessageconectionsRequest $request, $id)
    {
        if (Gate::denies('messageconection_edit')) {
            return abort(401);
        }

        $messageconection = Messageconection::findOrFail($id);
        $messageconection->update($request->all());
        
        
        

        return (new MessageconectionResource($messageconection))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('messageconection_delete')) {
            return abort(401);
        }

        $messageconection = Messageconection::findOrFail($id);
        $messageconection->delete();

        return response(null, 204);
    }
}
