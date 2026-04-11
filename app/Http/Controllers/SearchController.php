<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $query = request('query', '');

        $jobs = Job::query()
            ->with(['employer', 'tags'])
            ->where(function ($jobQuery) use ($query) {
                $jobQuery->where('title', 'LIKE', '%' . $query . '%')
                    ->orWhereHas('tags', function ($tagQuery) use ($query) {
                        $tagQuery->where('name', 'LIKE', '%' . $query . '%');
                    });
            })
            ->latest()
            ->paginate(15);

        return view('results', ['jobs' => $jobs]);
    }
}
