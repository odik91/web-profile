<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\introModel;
use App\Models\skillListModel;
use App\Models\socialMediaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Intro';
        $intro = introModel::first();
        $introSkills = skillListModel::orderBy('id', 'asc')->get();
        $sosmeds = socialMediaModel::orderBy('id', 'asc')->get();
        return view('admin.intro', compact('title', 'intro', 'introSkills', 'sosmeds'));
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
            'greeting' => 'required|min:3|max:255',
            'intro' => 'required|min:3|max:255',
        ]);

        $data = $request->all();
        $insert = introModel::create($data);

        if ($insert) {
            Session::flash('success', "Greeting has been created");
        } else {
            Session::flash('error', "Fail to create greeting");
        }

        return redirect()->route('intro.index');
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
            'greeting' => 'required|min:3|max:255',
            'intro' => 'required|min:3|max:255',
        ]);

        $intro = introModel::find($id);
        $data = $request->all();
        $update = $intro->update($data);

        if ($update) {
            Session::flash('success', "Greeting has been updated");
        } else {
            Session::flash('error', "Fail to update greeting");
        }

        return redirect()->route('intro.index');
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

    public function addSkill(Request $request)
    {
        $this->validate($request, [
            'skill' => 'required|min:3|max:255',
            'icon' => 'required|min:3|max:255',
        ]);

        $data = $request->all();
        $insert = skillListModel::create($data);

        if ($insert) {
            Session::flash('success', "Skill has been added");
        } else {
            Session::flash('error', "Fail to add skill");
        }

        return redirect()->route('intro.index');
    }

    public function editSkill(Request $request, $id)
    {
        $this->validate($request, [
            'skill' => 'required|min:3|max:255',
            'icon' => 'required|min:3|max:255',
        ]);

        $skillList = skillListModel::find($id);
        $data = $request->all();
        $update = $skillList->update($data);

        if ($update) {
            Session::flash('success', "Skill has been updated");
        } else {
            Session::flash('error', "Fail to update skill");
        }

        return redirect()->route('intro.index');
    }

    public function deleteSkill($id) {
        $data = skillListModel::find($id);
        $skill = $data['skill'];
        $delete = $data->delete();

        if ($delete) {
            Session::flash('success', "Skill $skill has been delete");
        } else {
            Session::flash('error', "Fail to delete $skill");
        }

        return redirect()->route('intro.index');
    }

    public function addSosmed(Request $request)
    {
        $this->validate($request, [
            'social-media' => 'required|min:3|max:60',
            'icon' => 'required|min:3|max:50',
            'link' => 'required|min:3|max:150',
        ]);

        $data = $request->all();
        $data = [
            'social_media' => $data['social-media'],
            'icon' => $data['icon'],
            'link' => $data['link'],
        ];
        $insert = socialMediaModel::create($data);

        if ($insert) {
            Session::flash('success', "Social media has been added");
        } else {
            Session::flash('error', "Fail to add social media");
        }

        return redirect()->route('intro.index');
    }

    public function editSosmed(Request $request, $id)
    {
        $this->validate($request, [
            'social-media' => 'required|min:3|max:60',
            'icon' => 'required|min:3|max:50',
            'link' => 'required|min:3|max:150',
        ]);

        $sosmed = socialMediaModel::find($id);
        $data = $request->all();
        $data = [
            'social_media' => $data['social-media'],
            'icon' => $data['icon'],
            'link' => $data['link'],
        ];
        $update = $sosmed->update($data);

        if ($update) {
            Session::flash('success', "Social media has been updated");
        } else {
            Session::flash('error', "Fail to update social media");
        }

        return redirect()->route('intro.index');
    }

    public function deleteSosmed($id) {
        $data = socialMediaModel::find($id);
        $sosmed = $data['social_media'];
        $delete = $data->delete();

        if ($delete) {
            Session::flash('success', "Social media $sosmed has been deleted");
        } else {
            Session::flash('error', "Fail to delete social media $sosmed");
        }

        return redirect()->route('intro.index');
    }
}
