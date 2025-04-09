<?php

namespace App\Http\Controllers\Frontend;

use DateTime;
use App\Models\Project;
use App\Mail\ConsultMail;
use App\Mail\ContactMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\SliderImages;
use Illuminate\Support\Facades\Mail;
use App\Models\Views;
use Carbon\Carbon;

class HomeController extends Controller
{
  public function index()
  {
    $projects = Project::orderBy('serial', 'asc')->get();
    $homeSliders = SliderImages::where('type', 'slider-1')->orderBy('serial', 'asc')->get();
    $welcomeSliders = SliderImages::where('type', 'slider-2')->orderBy('serial', 'asc')->get();
    $weareSliders = SliderImages::where('type', 'slider-3')->orderBy('serial', 'asc')->get();
    return view('frontend.home.index', compact('projects', 'homeSliders', 'welcomeSliders', 'weareSliders'));
  }

  public function projects()
  {
    $projects = Project::orderBy('serial', 'asc')->get();
    return view('frontend.home.projects', compact('projects'));
  }

  public function about()
  {
    $aboutSliders = SliderImages::where('type', 'about-slider')->orderBy('serial', 'asc')->get();
    $members = Member::orderBy('serial', 'asc')->get();
    return view('frontend.about.index', compact('aboutSliders', 'members'));
  }

  public function services()
  {
    return view('frontend.services.index');
  }

  public function contact()
  {
    return view('frontend.contact.index');
  }

  public function projectDetails(Project $project)
  {
    return view('frontend.home.project', compact('project'));
  }
  public function consultStore(Request $request)
  {
    $date = new DateTime($request->time);
    $outputFormat = 'g:i a, d - M - Y';
    $data = [
      'uid' => time() . '-' . Str::random(10),
      'service' => $request->service,
      'name' => $request->name,
      'time' => $date->format($outputFormat),
      'phone' => $request->phone,
      'email' => $request->email,
      'query' => $request->msg,
    ];

    Mail::to('epipra.bd@gmail.com')->send(new ConsultMail($data));

    return redirect()->back()->with('success', 'Thanks for consultancy request!');
  }

  public function contactStore(Request $request)
  {
    $data = [
      'name' => $request->name,
      'phone' => $request->phone,
      'email' => $request->email,
      'query' => $request->message,
    ];

    Mail::to('epipra.bd@gmail.com')->send(new ContactMail($data));

    return redirect()->back()->with('success', 'Thanks for contacting us, we will reach you soon!');
  }
  public function viewsCount()
  {
    $views = Views::whereDate('date', Carbon::today())->first();
    Views::updateOrCreate(
      ['date' => Carbon::today()],
      ['count' => ($views ? (int)$views->count : 0) + 1]
    );
    echo 'success';
  }
}
