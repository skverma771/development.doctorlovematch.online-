<?php

namespace App\Http\Controllers\Api\V1;

use App\Astrologycalc;
use App\Http\Controllers\Controller;
use App\Http\Resources\Astrologycalc as AstrologycalcResource;
use App\Http\Requests\Admin\StoreAstrologycalcsRequest;
use App\Http\Requests\Admin\UpdateAstrologycalcsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class AstrologycalcsController extends Controller
{
    public function index()
    {
        

        return new AstrologycalcResource(Astrologycalc::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('astrologycalc_view')) {
            return abort(401);
        }

        $astrologycalc = Astrologycalc::with([])->findOrFail($id);

        return new AstrologycalcResource($astrologycalc);
    }

    public function store(StoreAstrologycalcsRequest $request)
    {
        if (Gate::denies('astrologycalc_create')) {
            return abort(401);
        }

        $astrologycalc = Astrologycalc::create($request->all());
        
        

        return (new AstrologycalcResource($astrologycalc))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateAstrologycalcsRequest $request, $id)
    {
        if (Gate::denies('astrologycalc_edit')) {
            return abort(401);
        }

        $astrologycalc = Astrologycalc::findOrFail($id);
        $astrologycalc->update($request->all());
        
        
        

        return (new AstrologycalcResource($astrologycalc))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('astrologycalc_delete')) {
            return abort(401);
        }

        $astrologycalc = Astrologycalc::findOrFail($id);
        $astrologycalc->delete();

        return response(null, 204);
    }
}
