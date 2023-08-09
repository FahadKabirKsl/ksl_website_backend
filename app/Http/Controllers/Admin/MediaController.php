<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $medias = Media::paginate(5);
        return view('layouts.dashboard.media.index', compact('medias'));
    }
    public static function create()
    {
        $medias = Media::all();
        return view('layouts.dashboard.media.create', compact('medias'));
    }
    public static function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        $image_path = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_path = $file->storeAs('Created_Media_Images', $file->getClientOriginalName(), 'public');
        }
        $media = Media::create([
            'title' => $request->title,
            'newspaper_name' => $request->newspaper_name,
            'newspaper_url' => $request->newspaper_url,
            'newspaper_title' => $request->newspaper_title,
            'newspaper_description' => $request->newspaper_description,
            'image' => $image_path
        ]);

        session()->flash('create', 'Media Created successfully');
        return redirect()->route('media.index');
    }
    public static function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);

        $media->title = $request->input('title');
        $media->newspaper_name = $request->input('newspaper_name');
        $media->newspaper_url = $request->input('newspaper_url');
        $media->newspaper_title = $request->input('newspaper_title');
        $media->newspaper_description = $request->input('newspaper_description');

        if ($request->hasFile('image')) {
            if ($media->image) {
                Storage::delete($media->image);
            }
            $file = $request->file('image');
            $image_path = $file->storeAs('Updated_Media_Images', $file->getClientOriginalName(), 'public');
            $media->image = str_replace('public/', '', $image_path);
        }
        $media->save();
        session()->flash('update', 'Media Updated Successfully');
        return redirect()->route('media.index');
    }
    public static function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('layouts.dashboard.media.update', compact('media'));
    }
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();
        session()->flash('delete', 'Media Deleted Successfully');
        return redirect()->route('media.index');
    }
}
