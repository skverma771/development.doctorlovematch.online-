<?php

namespace App\Http\Controllers\Api\V1;

use App\Weeklyhit;
use App\Http\Controllers\Controller;
use App\Http\Resources\Weeklyhit as WeeklyhitResource;
use App\Http\Requests\Admin\StoreWeeklyhitsRequest;
use App\Http\Requests\Admin\UpdateWeeklyhitsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class WeeklyhitsController extends Controller
{
    public function index()
    {
        

        return new WeeklyhitResource(Weeklyhit::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('weeklyhit_view')) {
            return abort(401);
        }

        $weeklyhit = Weeklyhit::with([])->findOrFail($id);

        return new WeeklyhitResource($weeklyhit);
    }

    public function store(StoreWeeklyhitsRequest $request)
    {
        if (Gate::denies('weeklyhit_create')) {
            return abort(401);
        }

        $weeklyhit = Weeklyhit::create($request->all());
        
        

        return (new WeeklyhitResource($weeklyhit))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateWeeklyhitsRequest $request, $id)
    {
        if (Gate::denies('weeklyhit_edit')) {
            return abort(401);
        }

        $weeklyhit = Weeklyhit::findOrFail($id);
        $weeklyhit->update($request->all());
        
        
        

        return (new WeeklyhitResource($weeklyhit))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('weeklyhit_delete')) {
            return abort(401);
        }

        $weeklyhit = Weeklyhit::findOrFail($id);
        $weeklyhit->delete();

        return response(null, 204);
    }
}
