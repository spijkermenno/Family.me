<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\PHP;

class DashboardController extends Controller
{

    public static $days = [
        'Mon',
        'Tue',
        'Wed',
        'Thu',
        'Fri',
        'Sat',
        'Sun',
    ];

    public function index()
    {
        $familyMembers = DB::table('family_members')->where('family_id', Auth::id())->get();

        $now = [
            'year' => date('Y'),
            'month' => date('M'),
            'daysInMonth' => date('t'),
            'dayInMonth' => date('d'),
            'dayInWeek' => date('D'),
        ];


        function FirstDayInMonth($today, $dayInMonth)
        {
            $index = array_search($today, DashboardController::$days);
            $firstDayInMonth = null;

            for ($i = $dayInMonth; $i > 0; $i--) {
                $firstDayInMonth = DashboardController::$days[$index];
                $index--;
                if ($index < 0) {
                    $index = 6;
                }
            }

            return $firstDayInMonth;
        }

        function EmptyDaysInCalender($now) {
            return array_search(FirstDayInMonth($now['dayInWeek'], $now['dayInMonth']), DashboardController::$days);
        }

        $now['EmptyDaysInCalender'] = EmptyDaysInCalender($now);

        return view('dashboard', [
            'familyMembers' => $familyMembers,
            'calender' => $now,
            'loremIpsum' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);
    }
}
