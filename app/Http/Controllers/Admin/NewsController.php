<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.news-index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.news-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'text'=>'required'
        ],
            [
                'title.required' => 'Заголовок является обязательным полем!',
                'author.required' => 'Поле автор является обязательным!',
                'text.required' => 'Поле текст является обязательным!',
            ]);
        $news = new News([
            'title' => $request->get('title'),
            'author' => $request->get('author'),
            'text' => $request->get('text')
        ]);
        $news->save();
        return redirect()->route('news.index')->with('success', 'Новость сохранена!');
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
        $news = News::find($id);
        return view('admin.news.news-edit', compact('news'));
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
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'text'=>'required'
        ],
            [
                'title.required' => 'Заголовок является обязательным полем!',
                'author.required' => 'Поле автор является обязательным!',
                'text.required' => 'Поле текст является обязательным!',
            ]);
        $news = News::find($id);
        $news->title =  $request->get('title');
        $news->author = $request->get('author');
        $news->text = $request->get('text');
        $news->save();
        return redirect('news.index')->with('success', 'Новость обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('/admin/news')->with('delete', 'Вы удалили новость!');
    }
}
