<?php

namespace App\Http\Controllers\Api\V1;

use App\Personalityanswer;
use App\Http\Controllers\Controller;
use App\Http\Resources\Personalityanswer as PersonalityanswerResource;
use App\Http\Requests\Admin\StorePersonalityanswersRequest;
use App\Http\Requests\Admin\UpdatePersonalityanswersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class PersonalityanswersController extends Controller
{
    public function index()
    {
        

        return new PersonalityanswerResource(Personalityanswer::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('personalityanswer_view')) {
            return abort(401);
        }

        $personalityanswer = Personalityanswer::with([])->findOrFail($id);

        return new PersonalityanswerResource($personalityanswer);
    }

    public function store(StorePersonalityanswersRequest $request)
    {
        if (Gate::denies('personalityanswer_create')) {
            return abort(401);
        }

        $personalityanswer = Personalityanswer::create($request->all());
        
        

        return (new PersonalityanswerResource($personalityanswer))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdatePersonalityanswersRequest $request, $id)
    {
        if (Gate::denies('personalityanswer_edit')) {
            return abort(401);
        }

        $personalityanswer = Personalityanswer::findOrFail($id);
        $personalityanswer->update($request->all());
        
        
        

        return (new PersonalityanswerResource($personalityanswer))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('personalityanswer_delete')) {
            return abort(401);
        }

        $personalityanswer = Personalityanswer::findOrFail($id);
        $personalityanswer->delete();

        return response(null, 204);
    }
}
