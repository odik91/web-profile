<?php

namespace App\Http\Controllers;

use App\Models\ElevatorPicth;
use App\Models\Expertise;
use App\Models\introModel;
use App\Models\PersonalInfo;
use App\Models\skillListModel;
use App\Models\socialMediaModel;
use Illuminate\Http\Request;

class publicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Ali Shoddiqien | Protfolio';
        $intro = introModel::first();
        $skillLists = skillListModel::orderBy('id', 'asc')->get();
        $socialMedias = socialMediaModel::orderBy('id', 'asc')->get();
        $elevator = ElevatorPicth::first();
        $personalInfo = PersonalInfo::first();
        $expertises = Expertise::orderBy('id', 'asc')->get();
        return view('portfolio.index', compact('title', 'intro', 'skillLists', 'socialMedias', 'elevator', 'personalInfo', 'expertises'));
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
}
