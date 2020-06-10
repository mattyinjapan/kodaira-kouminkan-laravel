<?php

namespace App\Http\Controllers;

use App\Category;
use App\Document;
use App\Item;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        $categories = Category::pluck('name', 'id')->all();
        $subcategories = Subcategory::pluck('name', 'id')->all();

        return view('admin.items.create', compact(['items', 'categories', 'subcategories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');

        if ($file = $request->file('file_id'))
        {
            $file_path = time() . $file->getClientOriginalName();
            $file->move('documents', $file_path);
            $document = Document::create(['file_path'=>$file_path]);

            $input['file_id'] = $document->id;
        }

        $item = Item::create($input);

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

        Session::flash('created_item', '項目が作成されました！');

        return redirect('/admin/items');
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
        $item = Item::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        $subcategories = Category::pluck('name', 'id')->all();

        return view('admin.items.edit', compact(['item', 'categories', 'subcategories']));
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
        $input = $request->except('_token');

        if ($file = $request->file('file_id'))
        {
            $file_path = time() . $file->getClientOriginalName();
            $file->move('documents', $file_path);
            $document = Document::create(['file_path'=>$file_path]);

            $input['file_id'] = $document->id;
        } else {
            $input['file_id'] = $document->file_id;
        }

        $item = Item::whereId($id)->update($input);

        if ($input['category_type'] === 'cat')
        {
            $category = Category::find($input['category_id']);
            $item->category()->sync($category); // or attach?
        }
        else if ($input['category_type'] === "sub")
        {
            $subcategory = Subcategory::find($input['subcategory_id']);
            $item->subcategory()->sync($subcategory);
        }



        Session::flash('edited_item', '項目が作成されました！');

        return redirect('/admin/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $document = Document::findOrFail($item->document->id);

        unlink(public_path() . '/documents/' . $item->document->file_path);
        $item->delete();
        $document->delete();

        Session::flash('deleted_item', '項目が削除されました。');

        return redirect('/admin/items');
    }
}
