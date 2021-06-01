<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Region;
use Illuminate\Http\Request;
use App\Job;
use App\Category;
use Auth;
use Illuminate\Http\Response;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(JobRequest $request)
    {
        return view('jobs.index', [
            'jobs' => Job::filter($request->validated())->orderBy('updated_at','desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create', [
            'regions' => Region::get(['id', 'name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $job = new Job();

//        dd($request->validated()); die;

        $job->employeer_id = Auth::guard('employeer')->user()->id;
        $job->category = $request->category_name;
        $job->job_context = $request->job_context;
        $job->keywords = $request->keywords;
        $job->title = $request->title;
        $job->vacancy = $request->vacancy;
        $job->deadline = $request->deadline;
        $job->employment_type = $request->employment_type;
        $job->region_id = $request->region_id;
        $job->gender = $request->gender;
        $job->age = $request->age;
        $job->responsibilities = $request->responsibilities;
        $job->experience = '';
        $job->address = '';
        $job->education = $request->education;
        $job->requirements = $request->requirements;
        $job->additional_requirements = $request->additional_requirements;
        $job->salary = $request->salary;
        $job->benifits = $request->benifits;
        $job->apply_instruction = $request->apply_instruction;

        $job->save();
        Category::where('category_name', '=' , $request->category_name)->increment('no_jobs', 1);

        return redirect()->route('jobs.index')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($job_id)
    {
        $job = Job::Find($job_id);

        return view('jobs/show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($job_id)
    {
        $job = Job::Find($job_id);

        return view('jobs/edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $job_id)
    {
        //
        $job = Job::Find($job_id);

        if ($job->category_name != $request->category_name)
        {
            Category::where('category_name', '=' , $job->category)->decrement('no_jobs', 1);
            Category::where('category_name', '=' , $request->category_name)->increment('no_jobs', 1);
        }

        $job->employeer_id = Auth::guard('employeer')->user()->id;
        $job->category = $request->category_name;
        $job->job_context = $request->job_context;
        $job->keywords = $request->keywords;
        $job->title = $request->title;
        $job->vacancy = $request->vacancy;
        $job->deadline = $request->deadline;
        $job->employment_type = $request->employment_type;
        $job->region_id = $request->region_id;
        $job->gender = $request->gender;
        $job->age = $request->age;
        $job->responsibilities = $request->responsibilities;
        $job->experience = '';
        $job->address = '';
        $job->education = $request->education;
        $job->requirements = $request->requirements;
        $job->additional_requirements = $request->additional_requirements;
        $job->salary = $request->salary;
        $job->benifits = $request->benifits;
        $job->apply_instruction = $request->apply_instruction;

        $job->save();

        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($job_id)
    {
        //
        $job = Job::Find($job_id);
        $job->delete();
        Category::where('category_name', '=' , $job->category_name)->increment('no_jobs', -1);
        return redirect('/jobs');
    }
}
