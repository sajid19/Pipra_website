<?php

namespace App\Http\Controllers\Administrative;

use App\Models\User;


use App\Models\Collection;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

use App\Models\CustomNotification;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use App\Models\Views;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $totalViews = Views::sum('count');

        // Get the current month and year
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Fetch the data from the database
        $data = DB::table('views')
            ->select(DB::raw('DATE(date) as date'), DB::raw('SUM(count) as total_count'))
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->groupBy(DB::raw('DATE(date)'))
            ->get();

        // Prepare the data for Highcharts
        $categories = [];
        $seriesData = [];

        foreach ($data as $entry) {
            $categories[] = Carbon::parse($entry->date)->format('d M');
            $seriesData[] = (int)$entry->total_count;
        }

        return view('administrative.dashboard', compact('totalViews', 'categories', 'seriesData'));
    }

    public function getNotificationCount($id)
    {
        $data = User::find($id);

        $count = count($data->notifications->where('is_read', '0'));

        $formattedCount = $this->formatCount($count);
        $data = [
            'count' => $count,
            'value' => $formattedCount
        ];

        return response()->json($data, 200);
    }

    public function getNotification(Request $request)
    {
        $count = count(User::find($request->id)->notifications->where('is_read', '0'));

        $data = User::find($request->id);
        $result = $data->notifications;
        $result = $result->sortByDesc('created_at');

        return View('administrative.notification', compact('result'))->render();
    }

    private function formatCount($count)
    {
        if ($count >= 1e9) {
            return round($count / 1e9, 1) . 'B';
        } elseif ($count >= 1e6) {
            return round($count / 1e6, 1) . 'M';
        } elseif ($count >= 1e3) {
            return round($count / 1e3, 1) . 'K';
        }

        return $count;
    }
}
