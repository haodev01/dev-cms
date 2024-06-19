<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view', Article::class);
        $articles = Article::all();
        return view('admin.pages.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Article::class);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.pages.articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Article::class);
        $file = $request->file('thumb');
        $path = 'images/' . date('Ymd');
        $thumb = '';
        try {
            $thumb = Storage::disk('public')->putFile($path, $file);
        } catch (\Exception $exception) {
            return redirect()->route('articles.index')->withErrors('errorMessage', $exception->getMessage());
        }
        $dataTodo = [
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title')),
            'desc' => $request->get('desc'),
            'content' => Purifier::clean($request->get('content')),
            'thumb' => $thumb,
            'status' => (int) $request->get('status')
        ];
        $article = Article::create($dataTodo);
        $this->createTagForArticle($request, $article);
        $this->createCategoryForArticle($request, $article);
        return redirect()->route('articles.index')->with('success', 'Thêm bài viết thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('update', Article::class);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update', Article::class);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Xóa bài viết thành công');
    }
    private function createTagForArticle(Request $request, Article $article)
    {
        $tags = $request->get('tags');
        if (!empty($tags)) {
            $arrTags = [];
            foreach ($tags as $tag) {
                $tagFix = (int) $tag;
                if ($tagFix) {
                    $tagObj = Tag::find($tagFix);
                } else {
                    $tagObj = null;
                }
                if (!empty($tagObj)) {
                    $arrTags[] = $tagObj->id;
                }
            }
            if (!empty($arrTags)) {
                $article->tags()->attach($arrTags);
            }
        }
    }
    private function createCategoryForArticle(Request $request, Article $article)
    {
        $categories = $request->get('categories');

        if (!empty($categories)) {
            $arrCate = [];
            foreach ($categories as $tag) {
                $cateFix = (int) $tag;
                if ($cateFix) {
                    $cateObj = Category::find($cateFix);
                } else {
                    $cateObj = null;
                }
                if (!empty($cateObj)) {
                    $arrCate[] = $cateObj->id;
                }
            }
            if (!empty($arrCate)) {
                $article->categories()->attach($arrCate);
            }
        }
    }
}
