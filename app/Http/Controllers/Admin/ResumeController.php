<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ability;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Resume';
        $experiences = Experience::orderBy('id', 'asc')->get();
        $educations = Education::orderBy('id', 'desc')->get();
        $abilities = Ability::orderBy('id', 'asc')->get();
        $languages = Language::orderBy('id', 'asc')->get();
        return view('admin.resume', compact('title', 'experiences', 'educations', 'abilities', 'languages'));
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
            'low' => 'required|min:3|max:25',
            'position' => 'required|min:3|max:100',
            'description' => 'required|min:10'
        ]);

        $data = $request->all();
        $insert = Experience::create($data);

        if ($insert) {
            Session::flash('success', "Experience has been added");
        } else {
            Session::flash('error', "Fail to add experience");
        }

        return redirect()->route('resume.index');
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
            'low' => 'required|min:3|max:25',
            'position' => 'required|min:3|max:100',
            'description' => 'required|min:10'
        ]);

        $experience = Experience::find($id);
        $data = $request->all();
        $update = $experience->update($data);
        
        if ($update) {
            Session::flash('success', "Experience has been updated");
        } else {
            Session::flash('error', "Fail to update experience");
        }

        return redirect()->route('resume.index');
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

    public function addEducation(Request $request) {
        $this->validate($request, [
            'los' => 'required|min:4|max:20',
            'education' => 'required|min:5|max:140',
            'description'=> 'required|min:10'
        ]);

        $data = $request->all();
        $insert = Education::create($data);

        if ($insert) {
            Session::flash('success', "Education has been created");
        } else {
            Session::flash('error', "Fail to create education");
        }

        return redirect()->route('resume.index');
    }

    public function editEducation(Request $request, $id) {
        $this->validate($request, [
            'los' => 'required|min:4|max:20',
            'education' => 'required|min:5|max:140',
            'description'=> 'required|min:10'
        ]);

        $education = Education::find($id);
        $data = $request->all();
        $update = $education->update($data);

        if ($update) {
            Session::flash('success', "Education has been updated");
        } else {
            Session::flash('error', "Fail to update education");
        }

        return redirect()->route('resume.index');
    }

    public function addAbility(Request $request) {
        $this->validate($request, [
            'skill' => 'required|min:3|max:100',
            'level' => 'required|integer|min:1|max:100'
        ]);

        $data = $request->all();
        $insert = Ability::create($data);

        if ($insert) {
            Session::flash('success', "Ability has been created");
        } else {
            Session::flash('error', "Fail to add ability");
        }

        return redirect()->route('resume.index');
    }

    public function editAbility(Request $request, $id) {
        $this->validate($request, [
            'skill' => 'required|min:3|max:100',
            'level' => 'required|integer|min:1|max:100'
        ]);
        $ability = Ability::find($id);
        $data = $request->all();
        $update = $ability->update($data);

        if ($update) {
            Session::flash('success', "Ability has been updated");
        } else {
            Session::flash('error', "Fail to update ability");
        }

        return redirect()->route('resume.index');
    }

    public function addLanguage(Request $request) {
        $this->validate($request, [
            'languages' => 'required|min:3|max:100',
            'level' => 'required|integer|min:1|max:100'
        ]);

        $data = $request->all();
        $insert = Language::create($data);
        if ($insert) {
            Session::flash('success', "Language has been created");
        } else {
            Session::flash('error', "Fail to create language");
        }

        return redirect()->route('resume.index');
    }

    public function editLanguage(Request $request, $id) {
        $this->validate($request, [
            'languages' => 'required|min:3|max:100',
            'level' => 'required|integer|min:1|max:100'
        ]);

        $language = Language::find($id);
        $data = $request->all();
        $update = $language->update($data);

        if ($update) {
            Session::flash('success', "Language has been updated");
        } else {
            Session::flash('error', "Fail to update language");
        }

        return redirect()->route('resume.index');
    }
}
