<?php

namespace App\Http\Controllers;

use App\Contributor;
use App\File;
use App\Http\Requests\RepositoryRequest;
use App\Repository;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {

        $repositories = Repository::where('user_id', Auth::id())->simplePaginate(4);
        return view('Repositories.index', ['repositories' => $repositories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('Repositories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RepositoryRequest $request
     * @return RedirectResponse
     */
    public function store(RepositoryRequest $request)
    {
        Repository::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect('/repositories');
    }

    /**
     * Display the specified resource.
     *
     * @param  Repository  $repository
     * @return View
     */
    public function show(Repository $repository)
    {
        return view('Repositories.show', [
            'repository' => $repository,
            'user_starred_repository_ids' => $this->repository_ids(),
            'contributors' => $repository->contributors
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Repository  $repository
     * @return View
     */
    public function edit(Repository $repository)
    {
        return view('Repositories.edit', [
            'repository' => $repository,
            'users' => User::all()->where('id','!=', Auth::id())
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RepositoryRequest $request
     * @param  Repository $repository
     * @return Redirector
     */
    public function update(RepositoryRequest $request, Repository $repository)
    {
        $repository->update($request->only(['name','description']));
        if ($request->contributors){
            foreach ($request->contributors as $contributor){

                Contributor::create([
                   'repository_id' => $repository->id,
                   'user_id' => $contributor
                ]);
            }
        }
        return redirect('/repositories/'.$repository->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Repository $repository
     * @return RedirectResponse
     */
    public function destroy(Repository $repository)
    {
        $repository->destroy($repository->id);
        return redirect('/repositories');
    }

    public function explore(){

        $repositories = Repository::with('user')
            ->where('user_id', '!=', Auth::id())
            ->orderBy('stars','desc')
            ->simplePaginate(3);

        return view('explore', [
            'repositories' => $repositories,
            'user_starred_repository_ids' => $this->repository_ids()
        ]);
    }

    public function search(Request $request){

        $request->validate(['name' => 'required']);
        $query = $request->name;
        $repositories = Repository::where('name','LIKE', '%'.$query.'%')->simplePaginate(3);

        return view('explore', [
            'repositories' => $repositories,
            'user_starred_repository_ids' => $this->repository_ids()
        ]);
    }

    public function starred(){

        return view('starred_repositories', [
            'repositories' => Auth::user()->repositoriesStarredByUser()->simplePaginate(3)
        ]);
    }

    public function addStar(Repository $repository){

        $repository->usersThatStarredARepository()->attach(Auth::id());
        $repository->increment('stars');

        return redirect()->back();
    }

    public function removeStar(Repository $repository){
        $repository->usersThatStarredARepository()->detach(Auth::id());
        $repository->decrement('stars');


        return redirect()->back();
    }

    /**
     * @return array
     */
    public function repository_ids(): array
    {
        return Auth::user()->repositoriesStarredByUser->pluck('id')->toArray();
    }

    public function download(){

        $zip = new \ZipArchive();
        $zip_file = 'files.zip';

        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $path = storage_path('app/public/files');
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));


        foreach($files as $file){

            if (!$file->isDir()) {

                $filePath = $file->getRealPath();

                $relativePath = 'files/' . substr($filePath, strlen($path) + 1);

                $zip->addFile($filePath, $relativePath);
            }
        }

        $zip->close();

        return response()->download($zip_file);
    }

}
