<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public static function index()
    {
        $blogs = Blog::Paginate(5);
        return view('layouts.dashboard.blog.index', compact('blogs'));
    }
    public static function create(Request $request)
    {
        $blogs = Blog::all();
        return view('layouts.dashboard.blog.create', compact('blogs'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string',
                'description' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]
        );
        $image_path = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_path = $file->storeAs('Created_Blog_Images', $file->getClientOriginalName(), 'public');
        }
        $image_path = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_path = $file->storeAs('Created_Blog_Images', $file->getClientOriginalName(), 'public');
        }
        $blog = Blog::create(
            [
                'author' => $request->author,
                'title' => $request->title,
                'image' => $image_path,
                'description' => $request->description,
                'link_one' => $request->link_one,
                'link_two' => $request->link_two,
                'tags' => $request->tags,
            ]
        );
        session()->flash('create', 'Blog Created Successfully');
        return redirect()->route('blog.index');
    }
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->link_one = $request->input('link_one');
        $blog->link_two = $request->input('link_two');
        $blog->tags = $request->input('tags');

        if ($request->hasFile('image')) {

            if ($blog->image) {
                Storage::delete($blog->image);
            }
            $imagePath = $request->file('image')->store('public/Updated_Blog_Images');
            $blog->image = str_replace('public/', '', $imagePath);
        }

        $blog->save();
        session()->flash('update', 'Blog Updated Successfully');
        return redirect()->route('blog.index');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('layouts.dashboard.blog.update', compact('blog'));
    }
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        session()->flash('delete', 'Blog Deleted Successfully');
        return redirect()->route('blog.index');
    }
}
