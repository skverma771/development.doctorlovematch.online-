<?php

namespace App\Http\Controllers\Api\V1;

use App\Personalityoption;
use App\Http\Controllers\Controller;
use App\Http\Resources\Personalityoption as PersonalityoptionResource;
use App\Http\Requests\Admin\StorePersonalityoptionsRequest;
use App\Http\Requests\Admin\UpdatePersonalityoptionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class PersonalityoptionsController extends Controller
{
    public function index()
    {
        

        return new PersonalityoptionResource(Personalityoption::with(['questionid'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('personalityoption_view')) {
            return abort(401);
        }

        $personalityoption = Personalityoption::with(['questionid'])->findOrFail($id);

        return new PersonalityoptionResource($personalityoption);
    }

    public function store(StorePersonalityoptionsRequest $request)
    {
        if (Gate::denies('personalityoption_create')) {
            return abort(401);
        }

        $personalityoption = Personalityoption::create($request->all());
        $personalityoption->questionid()->sync($request->input('questionid', []));
        

        return (new PersonalityoptionResource($personalityoption))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdatePersonalityoptionsRequest $request, $id)
    {
        if (Gate::denies('personalityoption_edit')) {
            return abort(401);
        }

        $personalityoption = Personalityoption::findOrFail($id);
        $personalityoption->update($request->all());
        $personalityoption->questionid()->sync($request->input('questionid', []));
        
        

        return (new PersonalityoptionResource($personalityoption))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('personalityoption_delete')) {
            return abort(401);
        }

        $personalityoption = Personalityoption::findOrFail($id);
        $personalityoption->delete();

        return response(null, 204);
    }
}
