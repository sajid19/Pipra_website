<?php

namespace App\Http\Controllers\Administrative;

use DataTables;

use App\Models\SliderImages;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        return view('administrative.member.index');
    }

    public function data()
    {
        return  $this->getAllData();
    }

    public function create()
    {
        return view('administrative.member.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'serial' => ['required'],
            'file' => ['required'],
            'name' => ['required'],
            'designation' => ['required'],
        ]);

        if ($request->hasFile('file')) {
            $contentFile = null;
            $makeUniqueName = 'banner' . time() . '-' . uniqid();
            $file_name = $makeUniqueName . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('uploads/member/'), $file_name);
            $contentFile = 'uploads/member/' . $file_name;
            $file = $contentFile;
        }

        $member = Member::create([
            'name' =>    $request->name,
            'designation' =>    $request->designation,
            'facebook_link' =>    $request->facebook_link,
            'instagram_link' =>    $request->instagram_link,
            'file' =>    $file,
        ]);

        if ($member) {
            return redirect()->route('administrative.member')->with('success', 'Member Created Successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Something Wrong,Please Try Again');
        }
    }
    
    public function update(Member $member, Request $request)
    {
        $request->validate([
            'serial' => ['required'],
            'name' => ['required'],
            'Designation' => ['nullable'],
            'facebook_link' => ['nullable'],
            'instagram_link' => ['nullable'],
        ]);

        $input = $request->all();

        if ($request->hasFile('file')) {
            $contentFile = null;
            $makeUniqueName = 'banner' . time() . '-' . uniqid();
            $file_name = $makeUniqueName . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('uploads/member/'), $file_name);
            $contentFile = 'uploads/member/' . $file_name;
            $input['file'] = $contentFile;
        }
        $member->update($input);

        return redirect()->route('administrative.member')->with('success', 'Member update successfully');
    }

    public function edit(Member $member)
    {
        $data = $member;
        return view('administrative.member.edit', compact('data'));
    }

    public function getAllData()
    {
        $data = Member::get();

        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                $html = '';
                $html .= '<a href="' . route('administrative.member.edit', $row->id) . '" >
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

    public function destroy(Member $member)
    {
        $result = $member->delete();
        if ($result) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}
