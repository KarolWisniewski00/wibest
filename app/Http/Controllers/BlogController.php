<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Pokazuje stronę SEO.
     */
    public function index()
    {
        $blogs = Post::all();
        return view('admin.blog.index', compact('blogs'));
    }
    public function create()
    {
        return view('admin.blog.create');
    }
    public function store(Request $request)
    {
        $blocks = json_decode($request->content, true);

        // Walidacja JSON
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($blocks)) {
            return dd('Błąd w formacie JSON');
        }

        // ===== SLUG =====
        $slug = Str::slug($request->title);

        $originalSlug = $slug;
        $counter = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        // ===== ZAPIS =====
        $post = Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'type' => $request->type,
            'short_description' => $request->short_description,

            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'keywords' => $request->seo_keywords,

            'content' => $blocks,

            'created_user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('setting.blog')
            ->with('success', 'Post zapisany!');
    }
    public function edit(Post $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }
    public function update(Request $request, Post $blog)
    {
        $blocks = json_decode($request->content, true);

        // ===== WALIDACJA JSON =====
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($blocks)) {
            return dd('Błąd w formacie JSON');
        }

        // ===== SLUG =====
        $slug = Str::slug($request->title);

        $originalSlug = $slug;
        $counter = 1;

        while (
            Post::where('slug', $slug)
            ->where('id', '!=', $blog->id)
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        // ===== UPDATE =====
        $blog->update([
            'title' => $request->title,
            'slug' => $slug,
            'type' => $request->type,
            'short_description' => $request->short_description,

            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'keywords' => $request->seo_keywords,

            'content' => $blocks,
        ]);

        return redirect()
            ->route('setting.blog')
            ->with('success', 'Post zaktualizowany!');
    }
    public function delete(Post $blog)
    {
        $blog->delete();

        return redirect()
            ->route('setting.blog')
            ->with('success', 'Post usunięty!');
    }
}
