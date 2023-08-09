<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $medias = Media::all();
        return response()->json($medias, 200);
    }
    public function single_media(Request $request, $id)
    {
        $media = Media::find($id);
        return response()->json($media, 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'newspaper_name' => 'required',
            'newspaper_url' => 'required',
            'newspaper_title' => 'required',
            'newspaper_description' => 'required',
        ]);

        $image_path = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_path = $file->storeAs('Created_Media_Images', $file->getClientOriginalName(), 'public');
        }
        $media = Media::create([
            'title' => $request->title,
            'image' => $image_path,
            'newspaper_name' => $request->newspaper_name,
            'newspaper_url' => $request->newspaper_url,
            'newspaper_title' => $request->newspaper_title,
            'newspaper_description' => $request->newspaper_description,
        ]);
        return response()->json([
            'message' => 'Media Created Successfully',
            'status' => 'success',
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);
        // handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            if ($media->image) {
                Storage::delete($media->image);
            }
            $image_path = null;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $image_path = $file->storeAs('Updated_Media_Images', $file->getClientOriginalName(), 'public');
            }
            $media->image = str_replace('public/', '', $image_path);
        }
        $media->title = $request->input('title');
        $media->newspaper_name = $request->input('newspaper_name');
        $media->newspaper_url = $request->input('newspaper_url');
        $media->newspaper_title = $request->input('newspaper_title');
        $media->newspaper_description = $request->input('newspaper_description');
        $media->save();
        return response()->json([
            'message' => 'Media Updated Successfully',
            'status' => 'updated'
            // 'data' => $media,
        ]);
    }
    public function destroy(Request $request, $id)
    {
        $media = Media::where('id', $id)->first();
        if (!$media) {
            return response()->json([
                'message' => 'Media Not Found',
                'status' => 'error'
            ], 404);
        }
        $media->delete();
        return response()->json([
            'message' => 'Media Deleted Successfully',
            'status' => 'success'
        ], 200);
    }
}