<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Work;

class WorkController extends Controller
{    public function index()
    {

        $results = Work::with('type:id,name', 'type.posts', 'technology', 'user')->orderBy('created_at', 'desc')->paginate(10);

        return response()->json([
            'success' => true,
            'results' => $results,
        ]);
    }
}
