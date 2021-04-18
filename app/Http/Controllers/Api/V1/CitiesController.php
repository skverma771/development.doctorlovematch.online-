<?php

namespace App\Http\Controllers\Api\V1;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Resources\City as CityResource;
use App\Http\Requests\Admin\StoreCitiesRequest;
use App\Http\Requests\Admin\UpdateCitiesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class CitiesController extends Controller
{
    public function index()
    {
        

        return new CityResource(City::with(['state'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('city_view')) {
            return abort(401);
        }

        $city = City::with(['state'])->findOrFail($id);

        return new CityResource($city);
    }

    public function store(StoreCitiesRequest $request)
    {
        if (Gate::denies('city_create')) {
            return abort(401);
        }

        $city = City::create($request->all());
        
        

        return (new CityResource($city))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCitiesRequest $request, $id)
    {
        if (Gate::denies('city_edit')) {
            return abort(401);
        }

        $city = City::findOrFail($id);
        $city->update($request->all());
        
        
        

        return (new CityResource($city))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('city_delete')) {
            return abort(401);
        }

        $city = City::findOrFail($id);
        $city->delete();

        return response(null, 204);
    }
}
