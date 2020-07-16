<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ClientController extends Controller
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
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $auth  = Auth::user();
        return view('profile' , [
            'client'=> $auth,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        
        $user = Client::find($client)->first();
        $user->last_name = $request->input("lastname");
        $user->first_name = $request->input("firstname");
        $user->email = $request->input("email");
        $user->password = $this->updatePassword($request);
        $user->facebook = $request->input("facebook");
        $user->twitter = $request->input("twitter");
        $user->website = $request->input("website");
        $user->public_email = $request->input("public_email");
        $user->phone = $request->input("phone");
        $user->fax = $request->input("fax");

        if ($request->hasFile('imgPath')) {
            $image      = $request->file('imgPath');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $user->imgPath = $request->imgPath->storeAs('images/Cients', $fileName, 'public');
            /*$img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();                 
            });

            $img->stream(); // <-- Key point*/

            //dd();
        }

        $user->save();
        return back()->with('success','Your profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    public function updatePassword($request){
        /*if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords not matches
            //return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            return response()->json(['errors' => ['current'=> ['Current password does not match']]], 422);
        }*/
        //uncomment this if you need to validate that the new password is same as old one

        if(strcmp(Auth::user()->password, $request->get('password')) != 0){
            $password = Hash::make($request->get('password'));
        }
        
        $password = Auth::user()->password;
        return $password;
    }
}
