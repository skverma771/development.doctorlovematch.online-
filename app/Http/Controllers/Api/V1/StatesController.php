<?php

namespace App\Http\Controllers\Api\V1;

use App\State;
use App\Http\Controllers\Controller;
use App\Http\Resources\State as StateResource;
use App\Http\Requests\Admin\StoreStatesRequest;
use App\Http\Requests\Admin\UpdateStatesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class StatesController extends Controller
{
    public function index()
    {
        

        return new StateResource(State::with(['country'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('state_view')) {
            return abort(401);
        }

        $state = State::with(['country'])->findOrFail($id);

        return new StateResource($state);
    }

    public function store(StoreStatesRequest $request)
    {
        if (Gate::denies('state_create')) {
            return abort(401);
        }

        $state = State::create($request->all());
        
        

        return (new StateResource($state))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateStatesRequest $request, $id)
    {
        if (Gate::denies('state_edit')) {
            return abort(401);
        }

        $state = State::findOrFail($id);
        $state->update($request->all());
        
        
        

        return (new StateResource($state))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('state_delete')) {
            return abort(401);
        }

        $state = State::findOrFail($id);
        $state->delete();

        return response(null, 204);
    }
}
