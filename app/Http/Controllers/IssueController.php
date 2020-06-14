<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Issue_Comment;
use App\Repository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index($id)
    {
        $issues = Issue::all()->where('repository_id', '=', $id);

        return view('Issues.index', [ 'issues' => $issues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return View
     */
    public function create($id)
    {
        return view('Issues.create', ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function store(Request $request,$id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $issue = new Issue([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'repository_id' => $id,
            'user_id' => Auth::id()
        ]);
        $issue->save();


        return redirect("/repositories/$id/issues");
    }

    /**
     * Display the specified resource.
     *
     * @param Issue $issue
     * @return View
     */
    public function show(Issue $issue)
    {
        $issue = $issue->with('user', 'comments')
            ->where('id','=',$issue->id)->first();
        return view('Issues.show', ['issue' => $issue]);
    }

    public function update(Issue $issue){
        Issue::where('id' , $issue->id)->update(['status' => 'closed']);
        return redirect()->back();
    }

    public function storeComment(){
        request()->validate(['body' => 'required']);
        Issue_Comment::create([
            'user_id' => Auth::id(),
            'issue_id'=> request('issue_id'),
            'body' => request('body')
        ]);
        return redirect()->back();
    }
}
