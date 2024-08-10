<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use App\Services\UploadService;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    protected $model;

    protected $category;

    protected $uploadService;

    public function __construct(Book $book, Category $category, UploadService $uploadService)
    {
        $this->model = $book;
        $this->category = $category;
        $this->uploadService = $uploadService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', $this->model);

        $books = $this->model->with('category', 'user')->get();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', $this->model);

        $categories = $this->category->all();

        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        Gate::authorize('create', $this->model);

        $validated = $request->validated();

        $validated['user_id'] = auth()->user()->id;

        if ($request->hasFile('cover')) {
            $validated['cover'] = $this->uploadService->handleUploadFile($request->file('cover'), 'books');
        }

        if ($request->hasFile('file')) {
            $validated['file'] = $this->uploadService->handleUploadFile($request->file('file'), 'books');
        }

        $this->model->create($validated);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        Gate::authorize('view', $book);

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        Gate::authorize('update', $book);

        $categories = $this->category->all();

        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        Gate::authorize('update', $book);

        if ($request->hasFile('file')) {
            $this->uploadService->handleUploadFile($request->file('file'), 'books', $book->file);
        }

        if ($request->hasFile('cover')) {
            $this->uploadService->handleUploadFile($request->file('cover'), 'books', $book->cover);
        }

        $book->update($request->validated());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Gate::authorize('delete', $book);

        if ($book->file) {
            $this->uploadService->handleDeleteFile($book->file, 'books');
        }

        if ($book->cover) {
            $this->uploadService->handleDeleteFile($book->cover, 'books');
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');

   }
}