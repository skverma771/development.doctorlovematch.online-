<?php

namespace App\Http\Controllers\Api\V1;

use App\Messageblock;
use App\Http\Controllers\Controller;
use App\Http\Resources\Messageblock as MessageblockResource;
use App\Http\Requests\Admin\StoreMessageblocksRequest;
use App\Http\Requests\Admin\UpdateMessageblocksRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class MessageblocksController extends Controller
{
    public function index()
    {
        

        return new MessageblockResource(Messageblock::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('messageblock_view')) {
            return abort(401);
        }

        $messageblock = Messageblock::with([])->findOrFail($id);

        return new MessageblockResource($messageblock);
    }

    public function store(StoreMessageblocksRequest $request)
    {
        if (Gate::denies('messageblock_create')) {
            return abort(401);
        }

        $messageblock = Messageblock::create($request->all());
        
        

        return (new MessageblockResource($messageblock))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateMessageblocksRequest $request, $id)
    {
        if (Gate::denies('messageblock_edit')) {
            return abort(401);
        }

        $messageblock = Messageblock::findOrFail($id);
        $messageblock->update($request->all());
        
        
        

        return (new MessageblockResource($messageblock))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('messageblock_delete')) {
            return abort(401);
        }

        $messageblock = Messageblock::findOrFail($id);
        $messageblock->delete();

        return response(null, 204);
    }
}
