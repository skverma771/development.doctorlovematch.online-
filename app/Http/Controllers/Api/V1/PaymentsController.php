<?php

namespace App\Http\Controllers\Api\V1;

use App\Payment;
use App\Http\Controllers\Controller;
use App\Http\Resources\Payment as PaymentResource;
use App\Http\Requests\Admin\StorePaymentsRequest;
use App\Http\Requests\Admin\UpdatePaymentsRequest;
use App\User;
use App\Userspaymentsplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class PaymentsController extends Controller
{
    public function index()
    {


        return new PaymentResource(Payment::with([])->get());
    }

    public function show($id)
    {
//        if (Gate::denies('payment_view')) {
//            return abort(401);
//        }

        $payment = Payment::with([])->findOrFail($id);

        return new PaymentResource($payment);
    }

    public function store(StorePaymentsRequest $request)
    {
//        if (Gate::denies('payment_create')) {
//            return abort(401);
//        }
        $user_id=$request['user_id'];
//first_name
//last_name
//zipcode
//country
//payment_status
//txn_id
//txn_type
//payer_email
//payment_gross
        $payment = Payment::create($request->except('plan'));
        $payment->id;
        $plan=$request['plan'];

$userspaymentsplan=Userspaymentsplan::create(['user_id'=>$user_id, 'plan_id'=>$plan, 'plan_date'=>date("d F Y"),'payment_id'=>$payment->id,
    'expire_date'=>$timestamp =date("d F Y",strtotime('+84 days', time()) )]);

        $User = User::findOrFail($user_id);
        $User->update(['license' =>'true']);


        return (new PaymentResource($userspaymentsplan))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdatePaymentsRequest $request, $id)
    {
        if (Gate::denies('payment_edit')) {
            return abort(401);
        }

        $payment = Payment::findOrFail($id);
        $payment->update($request->all());




        return (new PaymentResource($payment))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('payment_delete')) {
            return abort(401);
        }

        $payment = Payment::findOrFail($id);
        $payment->delete();

        return response(null, 204);
    }
}
