<?php

namespace App\Http\Controllers\Api\V1;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\Country as CountryResource;
use App\Http\Requests\Admin\StoreCountriesRequest;
use App\Http\Requests\Admin\UpdateCountriesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class CountriesController extends Controller
{
    public function index()
    {
        

        return new CountryResource(Country::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('country_view')) {
            return abort(401);
        }

        $country = Country::with([])->findOrFail($id);

        return new CountryResource($country);
    }

    public function store(StoreCountriesRequest $request)
    {
        if (Gate::denies('country_create')) {
            return abort(401);
        }

        $country = Country::create($request->all());
        
        

        return (new CountryResource($country))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCountriesRequest $request, $id)
    {
        if (Gate::denies('country_edit')) {
            return abort(401);
        }

        $country = Country::findOrFail($id);
        $country->update($request->all());
        
        
        

        return (new CountryResource($country))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('country_delete')) {
            return abort(401);
        }

        $country = Country::findOrFail($id);
        $country->delete();

        return response(null, 204);
    }
}
