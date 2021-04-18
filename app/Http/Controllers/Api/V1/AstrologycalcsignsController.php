<?php

namespace App\Http\Controllers\Api\V1;

use App\Astrologycalcsign;
use App\Http\Controllers\Controller;
use App\Http\Resources\Astrologycalcsign as AstrologycalcsignResource;
use App\Http\Requests\Admin\StoreAstrologycalcsignsRequest;
use App\Http\Requests\Admin\UpdateAstrologycalcsignsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class AstrologycalcsignsController extends Controller
{
    public function index()
    {
        

        return new AstrologycalcsignResource(Astrologycalcsign::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('astrologycalcsign_view')) {
            return abort(401);
        }

        $astrologycalcsign = Astrologycalcsign::with([])->findOrFail($id);

        return new AstrologycalcsignResource($astrologycalcsign);
    }

    public function store(StoreAstrologycalcsignsRequest $request)
    {
        if (Gate::denies('astrologycalcsign_create')) {
            return abort(401);
        }

        $astrologycalcsign = Astrologycalcsign::create($request->all());
        
        

        return (new AstrologycalcsignResource($astrologycalcsign))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateAstrologycalcsignsRequest $request, $id)
    {
        if (Gate::denies('astrologycalcsign_edit')) {
            return abort(401);
        }

        $astrologycalcsign = Astrologycalcsign::findOrFail($id);
        $astrologycalcsign->update($request->all());
        
        
        

        return (new AstrologycalcsignResource($astrologycalcsign))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('astrologycalcsign_delete')) {
            return abort(401);
        }

        $astrologycalcsign = Astrologycalcsign::findOrFail($id);
        $astrologycalcsign->delete();

        return response(null, 204);
    }
}
