<?php

namespace App\Http\Controllers\Api\V1;

use App\Citydatum;
use App\Http\Controllers\Controller;
use App\Http\Resources\Citydatum as CitydatumResource;
use App\Http\Requests\Admin\StoreCitydatasRequest;
use App\Http\Requests\Admin\UpdateCitydatasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class CitydatasController extends Controller
{
    public function index()
    {
        

        return new CitydatumResource(Citydatum::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('citydatum_view')) {
            return abort(401);
        }

        $citydatum = Citydatum::with([])->findOrFail($id);

        return new CitydatumResource($citydatum);
    }

    public function store(StoreCitydatasRequest $request)
    {
        if (Gate::denies('citydatum_create')) {
            return abort(401);
        }

        $citydatum = Citydatum::create($request->all());
        
        

        return (new CitydatumResource($citydatum))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCitydatasRequest $request, $id)
    {
        if (Gate::denies('citydatum_edit')) {
            return abort(401);
        }

        $citydatum = Citydatum::findOrFail($id);
        $citydatum->update($request->all());
        
        
        

        return (new CitydatumResource($citydatum))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('citydatum_delete')) {
            return abort(401);
        }

        $citydatum = Citydatum::findOrFail($id);
        $citydatum->delete();

        return response(null, 204);
    }
}
