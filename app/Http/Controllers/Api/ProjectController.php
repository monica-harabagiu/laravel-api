<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technology')->get();

        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }

    public function show($slug){
        $project = Project::with('type', 'technology')->where('slug', $slug)->first();
    
        if ($project) {
            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'error' => 'No projects found'
            ]);
        }
    }
}

