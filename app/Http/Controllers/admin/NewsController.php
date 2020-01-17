<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\NewsModel;
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
        $news = NewsModel::all();
        $data['data'] = $news;
        return view('admin/news/index')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/news/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $res = $request->input();
        if($res){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);
            $news = new NewsModel();
            $news->title = $res['title'];
            $news->content = $res['content'];
            $news->news_slug = seoUrl($res['title']);
            $news->image = $imageName;
            $news->meta_title = $res['meta_title'];
            $news->meta_keywords = $res['meta_keywords'];
            $news->meta_description = $res['meta_description'];
            $news->save();

        }


       return view('admin/news/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewsModel  $newsModel
     * @return \Illuminate\Http\Response
     */
    public function show(NewsModel $newsModel,$id)
    {
        $result = $newsModel::where('_id',$id)->get();
        $data['data'] = collect($result)->first();
        return view('admin/news/show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsModel  $newsModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $result = NewsModel::where('_id',$id)->get();
        $data['data'] = collect($result)->first();
        return view('admin/news/edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsModel  $newsModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $res = $request->input();
        $id = $request->input('id');
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);
        unset($res['id']);
        unset($res['_token']);
        $res['news_slug'] = seoUrl($res['title']);
        $res['image'] = $imageName;

        $news = NewsModel::where('_id',$id)->get()->first()->update($res);
        return redirect()->route('edit', ['id' => $id])->with('message','Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsModel  $newsModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsModel $newsModel)
    {
        //
    }

    public function newsFront(Request $request,$slug){
        $result = NewsModel::where('news_slug',$slug)->get();
        $data['data'] = collect($result)->first();
        return view('frontSingleNews')->with($data);
    }

    public function newsList(Request $request){
        $news = NewsModel::all();
        $data['data'] = $news;
        return view('frontIndexNews')->with($data);
    }
}
