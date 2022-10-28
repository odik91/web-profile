<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Portfolio';
        $categories = Category::orderBy('id', 'asc')->get();
        $portfolios = Portfolio::orderBy('id', 'asc')->get();
        return view('admin.portfolio', compact('title', 'categories', 'portfolios'));
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
            'category' => 'required|min:3|max:50'
        ]);

        $data = $request->all();
        $insert = Category::create($data);

        if ($insert) {
            Session::flash('success', "Category $request->category has been added");
        } else {
            Session::flash('error', "Fail to add category $request->category");
        }

        return redirect()->route('portfolio.index');
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
            'edit-category' => 'required|min:3|max:50'
        ]);

        $category = Category::find($id);
        $data['category'] = $request['edit-category'];
        $update = $category->update($data);

        if ($update) {
            Session::flash('success', "Category has been updated");
        } else {
            Session::flash('error', "Fail to update category");
        }

        return redirect()->route('portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $name = $category->name;
        $delete = $category->delete();

        if ($delete) {
            Session::flash('success', "Category $name has been deleted");
        } else {
            Session::flash('error', "Fail to delete category $name");
        }

        return redirect()->route('portfolio.index');
    }

    public function addPortfolio(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'description' => 'required|min:5',
            'image' => 'required|mimes:jpg,jpeg,png',
            'public' => 'required|min:4|max:150',
            'admin' => 'required|min:4|max:150',
        ]);        

        $image = null;
        if ($request->hasFile('image')) {
            $image = time() . $request['image']->hashName();
            $pathImage = public_path('/image');
            $resizeImage = Image::make($request['image']->path());
            $resizeImage->resize(1600, 1600, function ($const) {
                $const->aspectRatio();
            })->save($pathImage . '/' . $image);
        }

        $data = [
            'category_id' => $request['category'],
            'description' => $request['description'],
            'image' => $image,
            'public' => $request['public'],
            'admin' => $request['admin'],
        ];

        $create = Portfolio::create($data);
        if ($create) {
            Session::flash('success', "Portfolio has been added");
        } else {
            Session::flash('error', "Fail to add portfolio");
        }

        return redirect()->route('portfolio.index');
    }

    public function editPortfolio(Request $request, $id)
    {
        $this->validate($request, [
            'category' => 'required',
            'description' => 'required|min:5',
            'image' => 'mimes:jpg,jpeg,png',
            'public' => 'required|min:4|max:150',
            'admin' => 'required|min:4|max:150',
        ]);

        $portfolio = Portfolio::find($id);

        $imageName = $portfolio['image'];

        if ($request->hasFile('image')) {
            unlink(public_path("image/{$imageName}"));
            $imageName = time() . $request['image']->hashName();
            $pathImage = public_path('/image');
            $resizeImage = Image::make($request['image']->path());
            $resizeImage->resize(1600, 1600, function ($const) {
                $const->aspectRatio();
            })->save($pathImage . '/' . $imageName);
        }

        $data = [
            'category_id' => $request['category'],
            'description' => $request['description'],
            'image' => $imageName,
            'public' => $request['public'],
            'admin' => $request['admin'],
        ];

        $update = $portfolio->update($data);

        if ($update) {
            Session::flash('success', "Portfolio has been updated successfully");
        } else {
            Session::flash('error', "Fail to update portfolio");
        }

        return redirect()->route('portfolio.index');
    }

    public function deletePortfolio($id)
    {
        $portfolio = Portfolio::find($id);      
        $image = $portfolio['image'];
        $delete = $portfolio->delete();

        if ($delete) {
            unlink(public_path("image/{$image}"));
            Session::flash('success', "Portfolio has been deleted");
        } else {
            Session::flash('error', "Fail to delete portfolio");
        }

        return redirect()->route('portfolio.index');
    }
}
