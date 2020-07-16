<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffersRequest;
use App\Models\Facilities;
use App\Models\Images;
use App\Models\Offers;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $offers = Offers::orderBy('created_at', 'desc')
        ->limit(7)
        ->get();

        return view('welcome' , [
            'offers' => $offers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilities = Facilities::all();
        return view('submit-property' , [
            'facilities' => $facilities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OffersRequest $request)
    {
        $iMG = new Images();
        $list=[];
        $destinationPath = 'images/Offers';
        
        $offre = new Offers();
        $offre->client_id = Auth::user()->id;
        $offre->property_name = $request->input('propertyname');
        $offre->property_price =  $request->input('propertyprice');
        $offre->telephone = $request->input('phone');
        $offre->description = $request->input('discrition');
        $offre->capacity = $request->input('Capacity');
        $offre->city = $request->input('city');
        $offre->adresse = $request->input('adresse');
        $offre->area = $request->input('area');
        $offre->lat = 0;
        $offre->lng = 0;
        $offre->imgPath = $this->uploadImages($request,$destinationPath);
        
        $offre->save();

        foreach($request->file('images') as $image){
            $fileName   = $image->getClientOriginalName();
            $imagesUri = $image->storeAs($destinationPath.'/id_'.$offre->id, $fileName, 'public');

            $iMG->imgPath = $imagesUri;
            $iMG->offer_id = $offre->id;
            array_push($list , $iMG->toArray());
        }
        Images::insert($list);
        $offre->facilities()->toggle($request->input('facilities'));

        return  redirect('/');
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
    public function update(OffersRequest $request, $id)
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

    //'images/Offers'
    public function uploadImages($request , $path){
        if ($request->hasFile('imgPath')) {
            $image      = $request->file('imgPath');
            $fileName   = $image->getClientOriginalName(). '.' . $image->getClientOriginalExtension();
            return $request->imgPath->storeAs($path, $fileName, 'public');
        }
        return null;
    }
}
