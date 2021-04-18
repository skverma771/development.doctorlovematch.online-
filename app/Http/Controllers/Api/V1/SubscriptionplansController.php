<?php

namespace App\Http\Controllers\Api\V1;

use App\Subscriptionplan;
use App\Http\Controllers\Controller;
use App\Http\Resources\Subscriptionplan as SubscriptionplanResource;
use App\Http\Requests\Admin\StoreSubscriptionplansRequest;
use App\Http\Requests\Admin\UpdateSubscriptionplansRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class SubscriptionplansController extends Controller
{
    public function index()
    {
        

        return new SubscriptionplanResource(Subscriptionplan::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('subscriptionplan_view')) {
            return abort(401);
        }

        $subscriptionplan = Subscriptionplan::with([])->findOrFail($id);

        return new SubscriptionplanResource($subscriptionplan);
    }

    public function store(StoreSubscriptionplansRequest $request)
    {
        if (Gate::denies('subscriptionplan_create')) {
            return abort(401);
        }

        $subscriptionplan = Subscriptionplan::create($request->all());
        
        

        return (new SubscriptionplanResource($subscriptionplan))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateSubscriptionplansRequest $request, $id)
    {
        if (Gate::denies('subscriptionplan_edit')) {
            return abort(401);
        }

        $subscriptionplan = Subscriptionplan::findOrFail($id);
        $subscriptionplan->update($request->all());
        
        
        

        return (new SubscriptionplanResource($subscriptionplan))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('subscriptionplan_delete')) {
            return abort(401);
        }

        $subscriptionplan = Subscriptionplan::findOrFail($id);
        $subscriptionplan->delete();

        return response(null, 204);
    }
}
