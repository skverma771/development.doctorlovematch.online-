<?php

namespace App\Http\Controllers\Api\V1;

use App\Blockuser;
use App\Http\Controllers\Controller;
use App\Http\Resources\Blockuser as BlockuserResource;
use App\Http\Requests\Admin\StoreBlockusersRequest;
use App\Http\Requests\Admin\UpdateBlockusersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class BlockusersController extends Controller
{
    public function index()
    {
        

        return new BlockuserResource(Blockuser::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('blockuser_view')) {
            return abort(401);
        }

        $blockuser = Blockuser::with([])->findOrFail($id);

        return new BlockuserResource($blockuser);
    }

    public function store(StoreBlockusersRequest $request)
    {
        if (Gate::denies('blockuser_create')) {
            return abort(401);
        }

        $blockuser = Blockuser::create($request->all());
        
        

        return (new BlockuserResource($blockuser))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateBlockusersRequest $request, $id)
    {
        if (Gate::denies('blockuser_edit')) {
            return abort(401);
        }

        $blockuser = Blockuser::findOrFail($id);
        $blockuser->update($request->all());
        
        
        

        return (new BlockuserResource($blockuser))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('blockuser_delete')) {
            return abort(401);
        }

        $blockuser = Blockuser::findOrFail($id);
        $blockuser->delete();

        return response(null, 204);
    }
}
