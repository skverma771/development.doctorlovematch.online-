<?php

namespace App\Http\Controllers\Api\V1;

use App\Countrydatum;
use App\Http\Controllers\Controller;
use App\Http\Resources\Countrydatum as CountrydatumResource;
use App\Http\Requests\Admin\StoreCountrydatasRequest;
use App\Http\Requests\Admin\UpdateCountrydatasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class CountrydatasController extends Controller
{
    public function index()
    {
        

        return new CountrydatumResource(Countrydatum::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('countrydatum_view')) {
            return abort(401);
        }

        $countrydatum = Countrydatum::with([])->findOrFail($id);

        return new CountrydatumResource($countrydatum);
    }

    public function store(StoreCountrydatasRequest $request)
    {
        if (Gate::denies('countrydatum_create')) {
            return abort(401);
        }

        $countrydatum = Countrydatum::create($request->all());
        
        

        return (new CountrydatumResource($countrydatum))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCountrydatasRequest $request, $id)
    {
        if (Gate::denies('countrydatum_edit')) {
            return abort(401);
        }

        $countrydatum = Countrydatum::findOrFail($id);
        $countrydatum->update($request->all());
        
        
        

        return (new CountrydatumResource($countrydatum))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('countrydatum_delete')) {
            return abort(401);
        }

        $countrydatum = Countrydatum::findOrFail($id);
        $countrydatum->delete();

        return response(null, 204);
    }
}
