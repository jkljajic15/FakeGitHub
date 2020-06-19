<?php

namespace App\Http\Controllers;

use App\File;
use App\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function store(Repository $repository, Request $request){

        $request->validate(['file' => 'required|max:10000']);
        $fileName = $request->file->getClientOriginalName();
        $request->file->storeAs('files',$fileName,'public');


        File::create([
           'repository_id' => $repository->id,
           'name' => $fileName
        ]);

        return redirect()->back();

    }

    public function destroy(File $file){

        File::destroy($file->id);
        Storage::delete('/public/files/'.$file->name);

        return redirect()->back();
    }
}
