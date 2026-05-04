<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\MediaFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaFileController extends Controller
{
    public function index()
    {
        $files = MediaFile::latest('uploaded_at')->paginate(30);

        return view('backend.page.media-files.index', compact('files'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'files'   => 'required|array',
            'files.*' => 'file|mimes:jpg,jpeg,png,gif,webp,svg,mp4,mov,avi,pdf|max:51200',
        ]);

        foreach ($request->file('files') as $file) {
            $path = $file->store('media', 'public');

            [$width, $height] = in_array($file->getMimeType(), ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
                ? (getimagesize($file->getRealPath()) ?: [null, null])
                : [null, null];

            MediaFile::create([
                'user_id'     => auth()->id(),
                'file_name'   => $file->getClientOriginalName(),
                'file_path'   => $path,
                'file_type'   => explode('/', $file->getMimeType())[0],
                'mime_type'   => $file->getMimeType(),
                'file_size'   => $file->getSize(),
                'width'       => $width,
                'height'      => $height,
                'uploaded_at' => now(),
            ]);
        }

        return redirect()->route('admin.media-files.index')->with('success', 'File(s) uploaded.');
    }

    public function show(string $id)
    {
        $file = MediaFile::findOrFail($id);

        return view('backend.page.media-files.show', compact('file'));
    }

    public function destroy(string $id)
    {
        $file = MediaFile::findOrFail($id);

        Storage::disk('public')->delete($file->file_path);

        $file->delete();

        return redirect()->route('admin.media-files.index')->with('success', 'File deleted.');
    }
}
