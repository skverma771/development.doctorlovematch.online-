<?php

namespace App\Http\Controllers\Api\V1;

use App\Messagedelete;
use App\Http\Controllers\Controller;
use App\Http\Resources\Messagedelete as MessagedeleteResource;
use App\Http\Requests\Admin\StoreMessagedeletesRequest;
use App\Http\Requests\Admin\UpdateMessagedeletesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class MessagedeletesController extends Controller
{
    public function index()
    {
        

        return new MessagedeleteResource(Messagedelete::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('messagedelete_view')) {
            return abort(401);
        }

        $messagedelete = Messagedelete::with([])->findOrFail($id);

        return new MessagedeleteResource($messagedelete);
    }

    public function store(StoreMessagedeletesRequest $request)
    {
        if (Gate::denies('messagedelete_create')) {
            return abort(401);
        }

        $messagedelete = Messagedelete::create($request->all());
        
        

        return (new MessagedeleteResource($messagedelete))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateMessagedeletesRequest $request, $id)
    {
        if (Gate::denies('messagedelete_edit')) {
            return abort(401);
        }

        $messagedelete = Messagedelete::findOrFail($id);
        $messagedelete->update($request->all());
        
        
        

        return (new MessagedeleteResource($messagedelete))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('messagedelete_delete')) {
            return abort(401);
        }

        $messagedelete = Messagedelete::findOrFail($id);
        $messagedelete->delete();

        return response(null, 204);
    }
}
