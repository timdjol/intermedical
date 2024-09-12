<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('children')->where('parent_id', 0)->get();
        //$categories = Category::where('parent_id', '!=', 0)->get();
        return view('agent.documents.index', compact('categories'));
    }


    public function show(Document $document)
    {
        Event::create(
            [
                'user_ip' => request()->getClientIp(),
                'user_id' => Auth::id(),
                'title_event' => 'Просмотрен документ ' . $document->title,
            ]
        );
        return view('agent.documents.show', compact('document'));
    }
}
