<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
  public function index()
  {
    $urls = [
      route('home'),
      route('about'),
      route('projects'),
      route('services'),
      route('contact'),
    ];

    $xml = view('sitemap', compact('urls'))->render();

    return Response::make($xml, 200, ['Content-Type' => 'text/xml']);
  }
}
