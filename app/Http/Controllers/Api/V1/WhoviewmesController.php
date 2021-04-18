<?php

namespace App\Http\Controllers\Api\V1;

use App\Whoviewme;
use App\Http\Controllers\Controller;
use App\Http\Resources\Whoviewme as WhoviewmeResource;
use App\Http\Requests\Admin\StoreWhoviewmesRequest;
use App\Http\Requests\Admin\UpdateWhoviewmesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class WhoviewmesController extends Controller
{
    public function index()
    {
        

        return new WhoviewmeResource(Whoviewme::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('whoviewme_view')) {
            return abort(401);
        }

        $whoviewme = Whoviewme::with([])->findOrFail($id);

        return new WhoviewmeResource($whoviewme);
    }

    public function store(StoreWhoviewmesRequest $request)
    {
        if (Gate::denies('whoviewme_create')) {
            return abort(401);
        }

        $whoviewme = Whoviewme::create($request->all());
        
        

        return (new WhoviewmeResource($whoviewme))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateWhoviewmesRequest $request, $id)
    {
        if (Gate::denies('whoviewme_edit')) {
            return abort(401);
        }

        $whoviewme = Whoviewme::findOrFail($id);
        $whoviewme->update($request->all());
        
        
        

        return (new WhoviewmeResource($whoviewme))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('whoviewme_delete')) {
            return abort(401);
        }

        $whoviewme = Whoviewme::findOrFail($id);
        $whoviewme->delete();

        return response(null, 204);
    }
}
