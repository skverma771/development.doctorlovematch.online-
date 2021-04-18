<?php

namespace App\Http\Controllers\Api\V1;

use App\Countrylanguage;
use App\Http\Controllers\Controller;
use App\Http\Resources\Countrylanguage as CountrylanguageResource;
use App\Http\Requests\Admin\StoreCountrylanguagesRequest;
use App\Http\Requests\Admin\UpdateCountrylanguagesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class CountrylanguagesController extends Controller
{
    public function index()
    {
        

        return new CountrylanguageResource(Countrylanguage::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('countrylanguage_view')) {
            return abort(401);
        }

        $countrylanguage = Countrylanguage::with([])->findOrFail($id);

        return new CountrylanguageResource($countrylanguage);
    }

    public function store(StoreCountrylanguagesRequest $request)
    {
        if (Gate::denies('countrylanguage_create')) {
            return abort(401);
        }

        $countrylanguage = Countrylanguage::create($request->all());
        
        

        return (new CountrylanguageResource($countrylanguage))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCountrylanguagesRequest $request, $id)
    {
        if (Gate::denies('countrylanguage_edit')) {
            return abort(401);
        }

        $countrylanguage = Countrylanguage::findOrFail($id);
        $countrylanguage->update($request->all());
        
        
        

        return (new CountrylanguageResource($countrylanguage))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('countrylanguage_delete')) {
            return abort(401);
        }

        $countrylanguage = Countrylanguage::findOrFail($id);
        $countrylanguage->delete();

        return response(null, 204);
    }
}
