<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryEditRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.news.categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {

        $data = $request->validated();
        $data['slug'] = \Illuminate\Support\Str::slug($data['title_category']);
        $create = Category::create($data);
        if ($create){
           return redirect()->route('admin.categories.index')->with('success','Запись успешно добавлена');
        }
        return back()->withInput()->with('errors','Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.news.categories.show',[
            'category'=>$category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.news.categories.edit',[
            'category'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryEditRequest $request, Category $category)
    {
        $data = $request->validated();
        $data['slug'] = \Illuminate\Support\Str::slug($data['title_category']);
        $save = $category->fill($data)->save();
        if ($save){
            return redirect()->route('admin.categories.index')
                ->with('success','Запись успешно обновлена');
        }
        return back()->withInput()->with('errors','Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $result = $category->delete();
        if ($result){
            return redirect()->route('admin.categories.index')->with('success','Категория удалена');
        }
            return back()->withInput()->with('errors','Не получилось удалить категорию');
    }
}
