<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Models\News;
use Illuminate\Http\Request;

Route::get('/', function () {
    $news = News::latest()->paginate(6);
    return view('welcome', compact('news'));
});

Route::get('/dashboard', function (Request $request) {
    $query = News::query();

    if ($request->has('keyword') && $request->keyword) {
        $query->where('headline', 'like', '%' . $request->keyword . '%');
    }

    if ($request->has('author') && $request->author) {
        $query->where('author', 'like', '%' . $request->author . '%');
    }

    if ($request->has('date') && $request->date) {
        $query->whereDate('date_published', $request->date);
    }

    $news = $query->latest()->paginate(6);

    return view('dashboard', compact('news'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::resource('news', NewsController::class)->except(['show']);
    Route::get('news/search', [NewsController::class, 'search'])->name('news.search');
    Route::get('news/{id}', [NewsController::class, 'show'])->name('news.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('search', [NewsController::class, 'searchHome'])->name('search');

require __DIR__ . '/auth.php';
