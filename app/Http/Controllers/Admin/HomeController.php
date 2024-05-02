<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $interval = intval($request->input('interval', 30));
        if ($interval > 120) {
            $interval = 120;
        }

        $dateInterval = date('Y-m-d H:i:s', strtotime('-' . $interval . ' days'));
        $visitsCount = Visitor::where('visited_at', '>=', $dateInterval)->count();
        $datelimit = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $onlineList = Visitor::select('ip')
            ->where('visited_at', '>=', $datelimit)
            ->groupBy('ip')
            ->get();
        $onlineCount = count($onlineList);
        $pageCount = Page::count();
        $userCount = User::count();

        $pagePie = [];
        $visitsAll = Visitor::selectRaw('page, count(page) as c')
            ->where('visited_at', '>=', $dateInterval)
            ->groupBy('page')
            ->get();
        foreach ($visitsAll as $visit) {
            $pagePie[$visit['page']] = intval($visit['c']);
        }

        $pageLabels = json_encode(array_keys($pagePie));
        $pageValues = json_encode(array_values($pagePie));


        return view('Admin.home', [
            'visitsCount' => $visitsCount,
            'onlineCount' => $onlineCount,
            'pageCount' => $pageCount,
            'userCount' => $userCount,
            'pageLabels' =>   $pageLabels,
            'pageValues' =>  $pageValues,
            'dateInterval' => $interval
        ]);
    }
}
