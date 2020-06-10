<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();

        return view('admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.subcategories.create', compact(['subcategories', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        // Subcategory::create($input);

        // add sub category to subcategory ;-;
        if ($input['category_type'] === 'cat')
        {
            $category = Category::find($input['category_id']);
            $item->category()->associate($category);
        }
        else if ($input['category_type'] === "sub")
        {
            $subcategory = Subcategory::find($input['subcategory_id']);
            $item->subcategory()->associate($subcategory);
        }

        Session::flash('created_subcategory', 'サブカテゴリーが作成されました。');

        return redirect('/admin/subcategories');
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
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.subcategories.edit', compact(['subcategory', 'categories']));
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
        $input = $request->all();

        $subcategory = Subcategory::findOrFail($id);
        $subcategory->update($input);

        Session::flash('edited_subcategory', 'サブカテゴリーが編集されました。');

        return redirect('/admin/subcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        Session::flash('deleted_subcategory', 'サブカテゴリーが削除されました。');

        return redirect('/admin/subcategories');
    }
}
