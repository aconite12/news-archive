<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'headline' => 'required|min:10|max:255',
            'content' => 'required|min:100',
            'date_published' => 'required|date',
        ]);

        // Create news with authenticated user's ID
        News::create([
            'headline' => $request->headline,
            'content' => $request->content,
            'author' => Auth::user()->name,
            'date_published' => $request->date_published,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);

        // Ensure the user is the owner of the news
        if (Auth::id() !== $news->user_id) {
            return redirect()->route('news.index')->with('error', 'You are not authorized to edit this news.');
        }

        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::findOrFail($id);

        // Ensure the user is the owner of the news
        if (Auth::id() !== $news->user_id) {
            return redirect()->route('news.index')->with('error', 'You are not authorized to update this news.');
        }

        $request->validate([
            'headline' => 'required|min:10',
            'content' => 'required|min:100',
            'date_published' => 'required|date',
        ]);

        $news->update($request->only('headline', 'content', 'date_published'));

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        if (Auth::id() !== $news->user_id) {
            return redirect()->route('news.index')->with('error', 'You are not authorized to delete this news.');
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = News::query();
        if ($request->filled('keyword')) {
            $query->where('headline', 'like', '%' . $request->keyword . '%');
        }
        if ($request->filled('author')) {
            $query->where('author', 'like', '%' . $request->author . '%');
        }
        if ($request->filled('date')) {
            $query->whereDate('date_published', $request->date);
        }

        // Paginate results
        $news = $query->paginate(6);

        return view('news.search', compact('news'));
    }

    public function searchHome(Request $request)
    {
        $query = News::query();

        // Add filters based on the request
        if ($request->filled('keyword')) {
            $query->where('headline', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('author')) {
            $query->where('author', 'like', '%' . $request->author . '%');
        }

        if ($request->filled('date')) {
            $query->whereDate('date_published', $request->date);
        }

        // Paginate results
        $news = $query->paginate(6);
        //return response()->json($news, 200);
        return view('welcome', compact('news'));
    }
}
