<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOportunity;

class JobOportunityController extends Controller
{
    public function index()
    {
        return JobOportunity::all();
    }
 
    public function show($id)
    {
        return JobOportunity::find($id);
    }

    public function store(Request $request)
    {
        return JobOportunity::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $job_oportunity = JobOportunity::findOrFail($id);
        $job_oportunity->update($request->all());

        return $JobOportunity;
    }

    public function delete(Request $request, $id)
    {
        $job_oportunity = JobOportunity::findOrFail($id);
        $job_oportunity->delete();

        return 204;
    }
}
