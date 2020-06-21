<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();
        return view('admin.documents.documents-index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.documents.documents-create');
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
            'name'=>'required'
        ],
            [
                'name.required' => 'Название является обязательным полем!'
            ]);
        $path = $request->file('href')->store('documents');
        $document = new Document([
            'name' => $request->get('name'),
            'href' => $path
        ]);
        $document->save();
        return redirect()->route('documents.index')->with('success', 'Документ сохранен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);
        return Storage::download($document->href);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::find($id);
        return view('admin.documents.documents-edit', compact('document'));
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
            'name'=>'required',
        ],
            [
                'name.required' => 'Поле название является обязательным!'
            ]);
        $document = Document::find($id);
        Storage::disk('public')->delete($document->href);
        $path = $request->file('document')->store('documents');
        $document->name = $request->get('name');
        $document->href = $path;
        $document->save();
        return redirect('documents.index')->with('success', 'Документ обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();
        return redirect('/admin/documents')->with('delete', 'Вы удалили документ!');
    }
}
