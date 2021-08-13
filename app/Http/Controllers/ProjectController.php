<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
        // return view('project.index')->with('project ', Project::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 1) {
            return view('Admin.create');
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_path' => ['required', 'image']
        ]);
        $extension = $request->file('image_path')->store('uploads', 'public');
        // $extension =  $request->title . '.' . $request->file('image_path')->extension();


        // $request->image_path->move(public_path('images'), $extension);

        Project::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => $extension,
            'user_id' => auth()->user()->id
        ]);
        return redirect('/projects')
            ->with('message', 'Your project has been added successfully');
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'image_path' => ['required', 'image']
        // ]);
        // $image_path = request('image_path')->store('uploads', 'public');
        // dd($image_path);
        // redirect('projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        if ($project == null) {
            abort(404);
        }
        return view('project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        if (Auth::user()->role == 1) {
            if ($project == null) {
                abort(404);
            }

            return view('admin.edit', ['project' => $project]);
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if (Auth::user()->role == 1) {

            if ($project == null) {
                abort(404);
            } else {

                $request->validate([
                    'title' => 'string',
                    'description' => 'string',
                    'image_path' => ['image', 'nullable']
                ]);
                $image_path = null;
                if (request('image_path') != null) {
                    $image_path = $request['image_path']->store('uploads', 'public');
                } else if ($project->image_path != null) {
                    $image_path = $project->image_path;
                } else {
                    abort(401);
                }
                $project->update([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'image_path' => $image_path,
                    'user_id' => auth()->user()->id
                ]);
                return redirect('/projects/');
            }
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project == null) {
            abort(404);
        }

        $project->delete();
        Storage::delete(["public/" . $project->image_path]);
        return redirect('/projects')->with('message', 'project have been delted successfully');
    }
}
