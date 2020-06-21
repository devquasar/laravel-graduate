<?php

namespace App\Http\Controllers\All;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Fact;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BasePublicController extends Controller
{
    public function documentsDownload($id)
    {
        $document = Document::find($id);
        return Storage::download($document->href);
    }
    public function getTwoLastRecords()
    {
        $documents = Document::all();
        $last = Work::latest()->take(2)->get();
        $fact = Fact::inRandomOrder()->limit(1)->get();
        return view('home', ['last' => $last->all(), 'fact' => $fact->first(), 'documents' => $documents]);
    }
    public function allWorks()
    {
        $works = Work::all();
        return view('\user\works', compact('works'));
    }
    public function about()
    {
        return view('\user\about');
    }
    public function contact()
    {
        return view('\user\contact');
    }
}
