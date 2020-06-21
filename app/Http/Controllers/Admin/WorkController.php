<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::all();
        return view('admin.works.works-index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.works.works-create');
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
            'author'=>'required',
            'name'=>'required',
            'date'=>'required',
            'page'=>'integer',
        ],
            [
                'author.required' => 'Поле автор является обязательным!',
                'name.required' => 'Поле название является обязательным!',
                'image.image' => 'Поле изображение должно быть в формате jpeg, png, bmp, gif или svg!',
                'page.integer' => 'Поле количество страниц должно быть числовым'
            ]);

        $path = $request->file('image')->store('works');
        $work = new Work([
            'author' => $request->get('author'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'house' => $request->get('house'),
            'date' => $request->get('date'),
            'page' => $request->get('page'),
            'image' => $path,
        ]);
        $work->save();
        return redirect('/admin/work')->with('success', 'Публикация сохранена!');
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
        $works = Work::find($id);
        return view('admin.works.works-edit', compact('works'));
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
            'author'=>'required',
            'name'=>'required',
            'date'=>'required',
            'page'=>'integer',
        ],
            [
                'author.required' => 'Поле автор является обязательным!',
                'name.required' => 'Поле название является обязательным!',
                'image.image' => 'Поле изображение должно быть в формате jpeg, png, bmp, gif или svg!',
                'page.integer' => 'Поле количество страниц должно быть числовым'
            ]);
        $work = Work::find($id);
        Storage::disk('public')->delete($work->image);
        $path = $request->file('image')->store('works');
        $work->author = $request->get('author');
        $work->name = $request->get('name');
        $work->description = $request->get('description');
        $work->house = $request->get('house');
        $work->date = $request->get('date');
        $work->page = $request->get('page');
        $work->image = $path;
        $work->save();
        return redirect('/admin/work')->with('success', 'Публикация обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::find($id);
        $work->delete();
        return redirect('/admin/work')->with('delete', 'Вы удалили публикацию!');
    }
}
