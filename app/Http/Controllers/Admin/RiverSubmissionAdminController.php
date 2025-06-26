<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RiverSubmission;

class RiverSubmissionAdminController extends Controller
{
    public function index()
    {
        $submissions = RiverSubmission::latest()->paginate(10);
        return view('admin.submissions.index', compact('submissions'));
    }

    public function show($id)
    {
        $submission = RiverSubmission::findOrFail($id);
        return view('admin.submissions.show', compact('submission'));
    }
}
