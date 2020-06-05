<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Issue_Comment;
use App\Repository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index($id)
    {
        $issues = Issue::all()->where('repository_id', '=', $id);

        return view('Issues.index', [ 'issues' => $issues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('Issues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Issue $issue
     * @return Factory|View
     */
    public function show(Issue $issue)
    {
        $comments = Issue_Comment::with(['user'])->where('issue_id' , '=' , $issue->id)->get()->toArray();
        return view('Issues.show', ['issue' => $issue, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Issue $issue
     * @return Factory|View
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Issue $issue
     * @return Response
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Issue $issue
     * @return Response
     */
    public function destroy(Issue $issue)
    {
        //
    }
}
