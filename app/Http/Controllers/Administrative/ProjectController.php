<?php

namespace App\Http\Controllers\Administrative;

use DataTables;

use App\Models\Project;

use App\Models\SliderImages;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function index()
    {
        return view('administrative.project.index');
    }

    public function data()
    {
        return  $this->getAllData();
    }

    public function create()
    {
        return view('administrative.project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'sub_title' => ['required'],
            'description' => ['nullable'],
            'file' => ['required'],
        ]);

        $input = $request->all();

        if ($request->hasFile('file')) {
            $contentFile = null;
            $makeUniqueName = 'banner' . time() . '-' . uniqid();
            $file_name = $makeUniqueName . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('uploads/project/'), $file_name);
            $contentFile = 'uploads/project/' . $file_name;
            $input['file'] = $contentFile;
        }

        $project = Project::create($input);

        if ($request->slider) {
            foreach ($request->slider as $img) {
                if (!empty($img)) {
                    $contentFile = null;
                    $makeUniqueName = 'banner' . time() . '-' . uniqid();
                    $file_name = $makeUniqueName . '.' . $img['file']->getClientOriginalExtension();
                    $img['file']->move(public_path('uploads/project-slider/'), $file_name);
                    $contentFile = 'uploads/project-slider/' . $file_name;
                    $file = $contentFile;
                }
                SliderImages::create([
                    'type_id' =>    $project->id,
                    'type' =>    Project::class,
                    'file' =>    $file,
                ]);
            }
        }

        if ($project) {
            return redirect()->route('administrative.project')->with('success', 'Project Created Successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Something Wrong,Please Try Again');
        }
    }

    public function update(Project $project, Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'sub_title' => ['required'],
            'description' => ['nullable'],
            'file' => ['nullable'],
        ]);

        $input = $request->all();

        if ($request->hasFile('file')) {
            $contentFile = null;
            $makeUniqueName = 'banner' . time() . '-' . uniqid();
            $file_name = $makeUniqueName . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('uploads/project/'), $file_name);
            $contentFile = 'uploads/project/' . $file_name;
            $input['file'] = $contentFile;
        }
        $project->update($input);


        if ($request->slider) {

            foreach ($request->slider as $sliderImg) {

                if (!empty($sliderImg)) {
                    $contentFile = null;
                    $makeUniqueName = 'banner' . time() . '-' . uniqid();
                    $file_name = $makeUniqueName . '.' . $sliderImg['file']->getClientOriginalExtension();
                    $sliderImg['file']->move(public_path('uploads/project-slider/'), $file_name);
                    $contentFile = 'uploads/project-slider/' . $file_name;
                    $file = $contentFile;
                }

                SliderImages::create([
                    'type_id' =>    $project->id,
                    'type' =>    Project::class,
                    'file' =>    $file
                ]);
            }
        }


        return redirect()->route('administrative.project')->with('success', 'Project update successfully');
    }

    public function edit(Project $project)
    {
        $data = $project;
        $sliders = $project->images;
        return view('administrative.project.edit', compact('data', 'sliders'));
    }

    public function getAllData()
    {
        $data = Project::orderBy('serial', 'desc')->get();

        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                $html = '';
                $html .= '<a href="' . route('administrative.project.edit', $row->id) . '" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                    </a>';
                $html .= '<a href="#" onclick="deleteData(' . $row->id . ');">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-delete"><path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><line x1="18" y1="9" x2="12" y2="15"></line><line x1="12" y1="9" x2="18" y2="15"></line></svg>
                          </a>';
                return $html;
            })
            ->addColumn('img', function ($row) {
                $html = '';
                $html .= '<img src="' . $row->file . '" height="80" width="50">';
                return $html;
            })

            ->rawColumns(['action', 'img'])
            ->blacklist(['created_at', 'updated_at', 'action'])
            ->addIndexColumn()
            ->toJson();
    }

    public function destroy(Project $project)
    {
        $result = $project->delete();
        if ($result) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    public function sliderImageDestroy(Request $request)
    {
        $result = SliderImages::find($request->id)->delete();
        if ($result) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}
