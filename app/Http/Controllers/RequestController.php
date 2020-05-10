<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as UserRequest;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = UserRequest::with('product')->latest()->paginate(5);
        // $requests = UserRequest::all();
        return view('admin.requests.index',compact('requests'));
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $userRequest = UserRequest::find($id);
        dd($userRequest);
        $userRequest->delete();
        return redirect()->route('requests.index')
            ->with('success','Request deleted successfully.');
    }
}
