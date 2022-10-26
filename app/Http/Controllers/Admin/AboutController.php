<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ElevatorPicth;
use App\Models\Expertise;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'About';
        $elevator = ElevatorPicth::first();
        $personalInfo = PersonalInfo::orderBy('id', 'asc')->first();
        $expertises = Expertise::orderBy('id', 'asc')->get();
        return view('admin.about', compact('title', 'elevator', 'personalInfo', 'expertises'));
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
        $this->validate($request, [
            'title' => 'required|min:3|max:50',
            'elevator' => 'required|min:10',
            'cv' => 'required|min:5|max:100',
        ]);

        $data = $request->all();
        $insert = ElevatorPicth::create($data);
        if ($insert) {
            Session::flash('success', "Elevator pitch has been added");
        } else {
            Session::flash('error', "Fail to add elevator pitch");
        }

        return redirect()->route('about.index');
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
        $this->validate($request, [
            'title' => 'required|min:3|max:50',
            'elevator' => 'required|min:10',
            'cv' => 'required|min:5|max:100',
        ]);

        $elevator = ElevatorPicth::find($id);
        $data = $request->all();

        $update = $elevator->update($data);
        if ($update) {
            Session::flash('success', "Elevator pitch has been updated");
        } else {
            Session::flash('error', "Fail to update elevator pitch");
        }

        return redirect()->route('about.index');
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

    public function addPersonalInfo(Request $request) {
        $this->validate($request, [
            'birthdate' => 'required',
            'email' => 'required',
            'phone' => 'required|min:4',
            'address' => 'required|min:10'
        ]);

        $data = $request->all();
        $insert = PersonalInfo::create($data);
        if ($insert) {
            Session::flash('success', "Personal info has been created");
        } else {
            Session::flash('error', "Fail to create personal info");
        }

        return redirect()->route('about.index');
    }

    public function editPersonalinfo(Request $request, $id) {
        $this->validate($request, [
            'birthdate' => 'required',
            'email' => 'required',
            'phone' => 'required|min:4',
            'address' => 'required|min:10'
        ]);

        $personalInfo = PersonalInfo::find($id);
        $data = $request->all();
        $update = $personalInfo->update($data);

        if ($update) {
            Session::flash('success', "Personal info has been edited");
        } else {
            Session::flash('error', "Fail to edit personal info");
        }

        return redirect()->route('about.index');
    }

    public function addExpertise(Request $request) {
        $this->validate($request, [
            'icon' => 'required|min:3',
            'expertise' => 'required|min:10|max:150',
            'description' => 'required|min:10|max:200',
        ]);

        $data = $request->all();
        $insert = Expertise::create($data);

        if ($insert) {
            Session::flash('success', "Expertise has been added");
        } else {
            Session::flash('error', "Fail to add expertise ");
        }

        return redirect()->route('about.index');
    }

    public function editExpertise(Request $request, $id) {
        $this->validate($request, [
            'icon' => 'required|min:3',
            'expertise' => 'required|min:10|max:150',
            'description' => 'required|min:10|max:200',
        ]);

        $expertise = Expertise::find($id);
        $data = $request->all();
        $update = $expertise->update($data);

        if ($update) {
            Session::flash('success', "Expertise has been updated");
        } else {
            Session::flash('error', "Fail to update expertise");
        }

        return redirect()->route('about.index');
    }
}
