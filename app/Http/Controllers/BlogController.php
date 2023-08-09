<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return response()->json($blogs, 200);
    }

    public function single_blog(Request $request, $id)
    {
        $blog = Blog::find($id);
        return response()->json($blog, 200);
    }

    public function store(Request $request)
    {
        //validation
        $request->validate(
            [
                'title' => 'required|string',
                'description' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ]
        );
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
        return response()->json([
            'message' => 'Blog Created Successfully',
            'status' => 'success',
            // 'blog' => $blog
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->author = $request->input('author');
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->link_one = $request->input('link_one');
        $blog->link_two = $request->input('link_two');
        $blog->tags = $request->input('tags');

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::delete($blog->image);
            }
            $image_path = $request->file('image')->store('Updated_Blog_Images', 'public');
            $blog->image = str_replace('public/', '', $image_path);
        }

        $blog->save();
        return response()->json([
            'message' => 'Blog updated Successfully',
            'status' => 'updated'
            // 'data' => $blog,
        ]);
    }
    public function destroy(Request $request, $id)
    {
        $blog = Blog::where('id', $id)->first();
        if (!$blog) {
            return response()->json([
                'message' => 'Blog Not Found',
                'status' => 'error'
            ], 404);
        }
        $blog->delete();
        return response()->json([
            'message' => 'Blog Deleted Successfully',
            'status' => 'success'
        ], 200);
    }
}
