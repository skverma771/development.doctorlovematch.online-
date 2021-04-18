<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Nexmo\Numbers\Number;
use Spatie\MediaLibrary\Models\Media;

class UploadFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upload(Request $request){
        $user=Auth::user();
        //dump($user);




        if ($request->hasFile('file')) {

            $rand=rand(10,900);
            $user->addMedia($request->file('file'))
                ->usingName($request['ref_id']."-".$request['ref_key']."-".$rand)
                ->toMediaCollection($request['collection_name']);

            $media = Media::where('name',$request['ref_id']."-".$request['ref_key']."-".$rand)->get();

//            $metaarr= json_decode($media->attributes);
            foreach ($media as $m ){
                $urlpath="/storage/".$m->id."/".$m->file_name;
            }

            return response()->json($urlpath);
        }

    }




}
