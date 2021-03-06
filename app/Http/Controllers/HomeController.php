<?php

namespace App\Http\Controllers;

use App\CompanyJobs;
use App\CompanyProfile;
use App\StatisticUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_stat = StatisticUsers::where('user_id', '=', Auth::user()->id)->first();
        $data_jobs = CompanyJobs::orderBy('created_at', 'desc')->take(3)->get();

        $companies_profile = [];

        foreach ($data_jobs as $job) {
            $getData = CompanyProfile::where('user_company_id', '=', $job->user_company_id)->first();

            if (!in_array($getData, $companies_profile)) $companies_profile[] = $getData;
        }

        return view('pages.vendor.dashboard', compact('data_stat', 'data_jobs', 'companies_profile'));
    }
}
