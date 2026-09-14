<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::latest()->take(3)->get();

        return view('home', compact('projects'));
    }

    public function grid(): View
    {
        $projects = Project::latest()->paginate(6);

        return view('grid', compact('projects'));
    }

    public function create(): View
    {
        return view('admin.projects.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'type' => 'required|min:5',
            'description' => 'required|min:10',
            'skills' => 'required|min:10',
            'project_goals' => 'required|min:10',
            'project_role' => 'required|min:10',
            'project_impact' => 'required|min:10',
            'technology' => 'required|min:10',
        ]);

        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->storeAs('projects', $imageName, 'public');

        Project::create([
            'image' => $imageName,
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description,
            'skills' => $request->skills,
            'project_goals' => $request->project_goals,
            'project_role' => $request->project_role,
            'project_impact' => $request->project_impact,
            'technology' => $request->technology,
        ]);

        return redirect()
            ->route('home')
            ->with('success', 'Project added successfully.');
    }

    public function show(string $id): View
    {
        $project = Project::findOrFail($id);

        return view('show', compact('project'));
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'type' => 'required|min:5',
            'description' => 'required|min:10',
            'skills' => 'required|min:10',
            'project_goals' => 'required|min:10',
            'project_role' => 'required|min:10',
            'project_impact' => 'required|min:10',
            'technology' => 'required|min:10',
        ]);

        $data = [
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description,
            'skills' => $request->skills,
            'project_goals' => $request->project_goals,
            'project_role' => $request->project_role,
            'project_impact' => $request->project_impact,
            'technology' => $request->technology,
        ];

        if ($request->hasFile('image')) {
            if ($project->image) {
                $oldImage = storage_path(
                    'app/public/projects/' . $project->image
                );

                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('projects', $imageName, 'public');

            $data['image'] = $imageName;
        }

        $project->update($data);

        return redirect()
            ->route('home')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        if ($project->image) {
            $image = storage_path(
                'app/public/projects/' . $project->image
            );

            if (file_exists($image)) {
                unlink($image);
            }
        }

        $project->delete();

        return redirect()
            ->route('grid')
            ->with('success', 'Project deleted successfully.');
    }
}
