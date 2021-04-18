<?php

namespace App\Http\Controllers\Api\V1;

use App\Personalityquestion;
use App\Http\Controllers\Controller;
use App\Http\Resources\Personalityquestion as PersonalityquestionResource;
use App\Http\Requests\Admin\StorePersonalityquestionsRequest;
use App\Http\Requests\Admin\UpdatePersonalityquestionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class PersonalityquestionsController extends Controller
{
    public function index()
    {
        

        return new PersonalityquestionResource(Personalityquestion::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('personalityquestion_view')) {
            return abort(401);
        }

        $personalityquestion = Personalityquestion::with([])->findOrFail($id);

        return new PersonalityquestionResource($personalityquestion);
    }

    public function store(StorePersonalityquestionsRequest $request)
    {
        if (Gate::denies('personalityquestion_create')) {
            return abort(401);
        }

        $personalityquestion = Personalityquestion::create($request->all());
        
        

        return (new PersonalityquestionResource($personalityquestion))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdatePersonalityquestionsRequest $request, $id)
    {
        if (Gate::denies('personalityquestion_edit')) {
            return abort(401);
        }

        $personalityquestion = Personalityquestion::findOrFail($id);
        $personalityquestion->update($request->all());
        
        
        

        return (new PersonalityquestionResource($personalityquestion))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('personalityquestion_delete')) {
            return abort(401);
        }

        $personalityquestion = Personalityquestion::findOrFail($id);
        $personalityquestion->delete();

        return response(null, 204);
    }
}
