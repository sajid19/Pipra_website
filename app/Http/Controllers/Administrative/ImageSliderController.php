<?php

namespace App\Http\Controllers\Administrative;

use DataTables;

use App\Models\SliderImages;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ImageSliderController extends Controller
{
    public function index()
    {
        return view('administrative.slider.index');
    }

    public function data()
    {
        return  $this->getAllData();
    }

    public function create()
    {
        return view('administrative.slider.create');
    }

    public function getContent(Request $request)
    {
        if ($request->val == 'slider-1') {
            $type = 'slider1';
        } elseif ($request->val == 'slider-2') {
            $type = 'slider2';
        } elseif ($request->val == 'slider-3') {
            $type = 'slider3';
        } elseif ($request->val == 'about-slider') {
            $type = 'slider4';
        }
        return view('administrative.slider.' . $type)->render();
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required'],
        ]);

        if ($request->hasFile('file')) {
            $contentFile = null;
            $makeUniqueName = 'banner' . time() . '-' . uniqid();
            $file_name = $makeUniqueName . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('uploads/' . $request->type . '/'), $file_name);
            $contentFile = 'uploads/' . $request->type . '/' . $file_name;
            $file = $contentFile;
        }

        $slider = SliderImages::create([
            'type_id' =>    0,
            'type' =>    $request->type,
            'file' =>    $file,
            'title' =>    $request->title,
            'sub_title' =>    $request->sub_title,
            'serial' =>    $request->serial,
        ]);

        if ($slider) {
            return redirect()->route('administrative.slider')->with('success', 'SliderImages Created Successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Something Wrong,Please Try Again');
        }
    }
    
    public function edit(SliderImages $slider)
    {
        $data = $slider;
        return view('administrative.slider.edit', compact('data'));
    }

    public function update(SliderImages $slider, Request $request)
    {
        
        $request->validate([
            'title' => ['required'],
            'sub_title' => ['required'],
            'file' => ['nullable'],
        ]);

        $input = [];

        if ($request->hasFile('file')) {
            $contentFile = null;
            $makeUniqueName = 'banner' . time() . '-' . uniqid();
            $file_name = $makeUniqueName . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('uploads/' . $slider->type . '/'), $file_name);
            $contentFile = 'uploads/' . $slider->type . '/' . $file_name;
            $input['file'] = $contentFile;
        }
        
        $input['title'] = $request->title;
        $input['sub_title'] = $request->sub_title;

        $slider->update($input);

        if ($slider) {
            return redirect()->route('administrative.slider')->with('success', 'SliderImages updated Successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Something Wrong,Please Try Again');
        }
    }

    public function getAllData()
    {
        $data = SliderImages::whereIn('type', ['slider-1', 'slider-2', 'slider-3', 'about-slider'])->orderBy('serial', 'desc')->get();

        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                $html = '';
                if ($row->type == 'slider-1' || $row->type == 'slider-3') {
                    $html .= '<a href="' . route('administrative.slider.edit', $row->id) . '" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                    </a>';
                }
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

            ->editColumn('type', function ($row) {
                $html = '';
                if ($row->type == 'slider-1') {
                    $html .= 'Slider 1 (Home Slider)';
                }
                if ($row->type == 'slider-2') {
                    $html .= 'Slider 2 (WELCOME)';
                }
                if ($row->type == 'slider-3') {
                    $html .= 'Slider 3 (WO WE ARE)';
                }
                if ($row->type == 'about-slider') {
                    $html .= 'About Slider';
                }
                return $html;
            })

            ->rawColumns(['action', 'img', 'type'])
            ->blacklist(['created_at', 'updated_at', 'action'])
            ->addIndexColumn()
            ->toJson();
    }

    public function destroy(SliderImages $slider)
    {
        $result = $slider->delete();
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
