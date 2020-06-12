<?php

namespace App\Http\Controllers;

use App\Repository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExploreController extends Controller
{
    public function index()
    {
        $repositories = Repository::with('user')->where('user_id', '!=', Auth::id())->simplePaginate(3);

        return view('explore', [
            'repositories' => $repositories,
            'user_starred_repository_ids' => $this->repository_ids($repositories)
        ]);
    }

    public function store(Repository $repository)
    {
        DB::table('starred_repositories')->insert([
            'user_id' => Auth::id(),
            'repository_id' => $repository->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }

    public function destroy(Repository $repository)
    {
        DB::table('starred_repositories')
            ->where('repository_id', $repository->id)
            ->where('user_id', Auth::id())
            ->delete();

        return redirect()->back();
    }

    /**
     * @param $repositories
     * @return array
     */
    public function repository_ids($repositories): array
    {
        $starred_repositories = DB::table('starred_repositories')->select()->get();
        $user_starred_repository_ids = array();
        foreach ($repositories as $repository) {
            foreach ($starred_repositories as $starred_repository) {

                if ($starred_repository->repository_id == $repository->id && $starred_repository->user_id == Auth::id()) {
                    array_push($user_starred_repository_ids, $repository->id);
                }
            }
        }
        return $user_starred_repository_ids;

        //todo relationships or eagerloading ?
    }
}
