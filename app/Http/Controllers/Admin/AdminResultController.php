<?php

namespace App\Http\Controllers\Admin;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminResultController extends Controller
{
    public function index()
    {
        $results = Result::latest()->paginate(10);

        return view('admin.results.index', compact('results'));
    }

    public function show($id)
    {
        $result = Result::findOrFail($id);

        return view('admin.results.show', compact('result'));
    }
}
