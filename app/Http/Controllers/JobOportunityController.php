<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOportunity;

class JobOportunityController extends Controller
{
    public function index() {
        return JobOportunity::all();
    }
 
    public function show(JobOportunity $job_oportunity)
    {
        return $job_oportunity;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:256',
            'description' => 'required|max:10000',
            'status' => 'required'
        ]);

        $job_oportunity = JobOportunity::create($request->all());

        return response()->json($job_oportunity, 201);
    }

    public function update(Request $request, JobOportunity $job_oportunity)
    {
        $request->validate([
            'title' => 'required|max:256',
            'description' => 'required|max:10000',
            'status' => 'required'
        ]);
        
        $job_oportunity->update($request->all());

        return response()->json($job_oportunity, 200);
    }

    public function delete(JobOportunity $job_oportunity)
    {
        $job_oportunity->delete();

        return response()->json(null, 204);
    }
}
