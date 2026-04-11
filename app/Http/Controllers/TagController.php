<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $jobs = $tag->jobs()
            ->latest()
            ->with(['employer', 'tags'])
            ->paginate(15);

        return view('results', [
            'jobs' => $jobs,
            'tag' => $tag,
        ]);
    }

    public function jobs(Tag $tag, Request $request)
    {
        $jobs = $tag->jobs()
            ->latest()
            ->with(['employer', 'tags'])
            ->paginate(15, ['*'], 'page', $request->integer('page', 1));

        return response()->json([
            'html' => view('jobs.partials.recent-jobs-items', ['jobs' => $jobs])->render(),
            'hasMorePages' => $jobs->hasMorePages(),
            'nextPage' => $jobs->currentPage() + 1,
        ]);
    }
}
