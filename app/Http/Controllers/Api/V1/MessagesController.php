<?php

namespace App\Http\Controllers\Api\V1;

use App\Message;
use App\Http\Controllers\Controller;
use App\Http\Resources\Message as MessageResource;
use App\Http\Requests\Admin\StoreMessagesRequest;
use App\Http\Requests\Admin\UpdateMessagesRequest;
use App\Messageconection;
use App\Usernotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class MessagesController extends Controller
{
    public function index()
    {


        return new MessageResource(Message::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('message_view')) {
            return abort(401);
        }

        $message = Message::with([])->findOrFail($id);

        return new MessageResource($message);
    }

    public function store(StoreMessagesRequest $request)
    {
//        if (Gate::denies('message_create')) {
//            return abort(401);
//        }

        $message = Message::create($request->all());


Messageconection::create(['msg_id'=>$message->id,'sender_id'=>$request['sender'],'receiver_id'=>$request['receiver'],'notifystatus'=>0,
'readstatus'=>0]);

        $post=new Usernotification();
        $post->catgories = 'message';
        $post->userid = $request['sender'];
        $post->memberid = $request['receiver'];
        $post->notifystatus = 0;
        $post->datetime = date("Y-m-d");
        $post->requestid = '';
        $post->save();



        return (new MessageResource($post))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateMessagesRequest $request, $id)
    {
        if (Gate::denies('message_edit')) {
            return abort(401);
        }

        $message = Message::findOrFail($id);
        $message->update($request->all());




        return (new MessageResource($message))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('message_delete')) {
            return abort(401);
        }

        $message = Message::findOrFail($id);
        $message->delete();

        return response(null, 204);
    }
}
