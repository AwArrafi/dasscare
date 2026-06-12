<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Result;
use App\Models\Recommendation;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | STAT CARD
        |--------------------------------------------------------------------------
        */

        $totalUsers = User::where('role', 'user')->count();

        $totalTests = Result::count();

        $totalRecommendations = Recommendation::count();

        /*
        |--------------------------------------------------------------------------
        | BULAN
        |--------------------------------------------------------------------------
        */

        $months = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        ];

        /*
        |--------------------------------------------------------------------------
        | TEST PER BULAN
        |--------------------------------------------------------------------------
        */

        $monthlyTests = [];

        for ($i = 1; $i <= 12; $i++) {

            $monthlyTests[] = Result::whereMonth(
                'created_at',
                $i
            )->count();
        }

        /*
        |--------------------------------------------------------------------------
        | USER PER BULAN
        |--------------------------------------------------------------------------
        */

        $monthlyUsers = [];

        for ($i = 1; $i <= 12; $i++) {

            $monthlyUsers[] = User::where('role', 'user')
                ->whereMonth('created_at', $i)
                ->count();
        }

        return view('admin.dashboard', [

            'totalUsers' => $totalUsers,
            'totalTests' => $totalTests,
            'totalRecommendations' => $totalRecommendations,

            'months' => $months,

            'monthlyTests' => $monthlyTests,
            'monthlyUsers' => $monthlyUsers,

        ]);
    }
}
