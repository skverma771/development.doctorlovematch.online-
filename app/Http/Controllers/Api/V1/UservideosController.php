<?php

namespace App\Http\Controllers\Api\V1;

use App\Uservideo;
use App\Http\Controllers\Controller;
use App\Http\Resources\Uservideo as UservideoResource;
use App\Http\Requests\Admin\StoreUservideosRequest;
use App\Http\Requests\Admin\UpdateUservideosRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class UservideosController extends Controller
{
    public function index()
    {
        

        return new UservideoResource(Uservideo::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('uservideo_view')) {
            return abort(401);
        }

        $uservideo = Uservideo::with([])->findOrFail($id);

        return new UservideoResource($uservideo);
    }

    public function store(StoreUservideosRequest $request)
    {
        if (Gate::denies('uservideo_create')) {
            return abort(401);
        }

        $uservideo = Uservideo::create($request->all());
        
        

        return (new UservideoResource($uservideo))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateUservideosRequest $request, $id)
    {
        if (Gate::denies('uservideo_edit')) {
            return abort(401);
        }

        $uservideo = Uservideo::findOrFail($id);
        $uservideo->update($request->all());
        
        
        

        return (new UservideoResource($uservideo))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('uservideo_delete')) {
            return abort(401);
        }

        $uservideo = Uservideo::findOrFail($id);
        $uservideo->delete();

        return response(null, 204);
    }
}
