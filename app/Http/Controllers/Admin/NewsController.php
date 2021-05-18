<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsEditRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allNews = News::all();
        return view('admin.news.index',['allNews'=>$allNews]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $text = $image->getClientOriginalExtension();
            $fileName = uniqid().".".$text;
            $data['image'] = $image->storeAs('news',$fileName,'public');
        }
        $create = News::create($data);
        if ($create){
            return redirect()->route('admin.news.index')->with('success','Новость успешно добавлена');
        }
        return back()->withInput()->with('errors','Не удалось добавить новость');
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
    public function edit(News $news)
    {
        return view('admin.news.edit',[
            'news'=>$news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsEditRequest $request, News $news)
    {

        $data = $request->validated();
        $save = $news->fill($data)->save();
        if ($save){
            return redirect()->route('admin.news.index')->with('success','Новость успешно обновлена');
        }
        return back()->withInput()->with('errors','Не удалось обновить новость');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $result = $news->delete();
        if ($result){
            return redirect()->route('admin.news.index')->with('success','Новость удалена');
        }
        return back()->withInput()->with('errors','Не получилось удалить новость');
    }


}
