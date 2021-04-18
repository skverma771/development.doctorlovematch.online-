<?php

namespace App\Http\Controllers\Api\V1;

use App\Redirectlink;
use App\Http\Controllers\Controller;
use App\Http\Resources\Redirectlink as RedirectlinkResource;
use App\Http\Requests\Admin\StoreRedirectlinksRequest;
use App\Http\Requests\Admin\UpdateRedirectlinksRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class RedirectlinksController extends Controller
{
    public function index()
    {
        

        return new RedirectlinkResource(Redirectlink::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('redirectlink_view')) {
            return abort(401);
        }

        $redirectlink = Redirectlink::with([])->findOrFail($id);

        return new RedirectlinkResource($redirectlink);
    }

    public function store(StoreRedirectlinksRequest $request)
    {
        if (Gate::denies('redirectlink_create')) {
            return abort(401);
        }

        $redirectlink = Redirectlink::create($request->all());
        
        

        return (new RedirectlinkResource($redirectlink))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateRedirectlinksRequest $request, $id)
    {
        if (Gate::denies('redirectlink_edit')) {
            return abort(401);
        }

        $redirectlink = Redirectlink::findOrFail($id);
        $redirectlink->update($request->all());
        
        
        

        return (new RedirectlinkResource($redirectlink))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('redirectlink_delete')) {
            return abort(401);
        }

        $redirectlink = Redirectlink::findOrFail($id);
        $redirectlink->delete();

        return response(null, 204);
    }
}
