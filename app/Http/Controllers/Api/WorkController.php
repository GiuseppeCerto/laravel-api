<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Work;

class WorkController extends Controller
{
    public function index()
    {

        $results = Work::with('type.works')->orderBy('created_at', 'desc')->paginate(12);

        return response()->json([
            'success' => true,
            'results' => $results,
        ]);
    }

    public function show($slug)
    {

        $work = Work::where('slug', $slug)->first();

        $relatedWork = Work::where('slug', '!=', $slug)->orderBy('created_at', 'desc')->limit(3)->get();

        $work->relatedPosts = $relatedWork;


        if ($work) {
            return response()->json([
                'success' => true,
                'work' => $work
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'No works found'
            ]);
        }
    }
}
