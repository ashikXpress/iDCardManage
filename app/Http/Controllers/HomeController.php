<?php

namespace App\Http\Controllers;

use App\Models\IdCardCategory;
use App\Models\Officer;
use App\Models\OfficerWorker;
use App\Models\Unit;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect('admin/dashboard');
        }else{
            return redirect('login');
        }
    }

    public function dashboard()
    {
        $data['page_header']='Dashboard';
        $data['unit_count']=Unit::count();
        $data['category_count']=IdCardCategory::count();
        $data['officer_count']=Officer::count();
        $data['officer_worker_count']=OfficerWorker::where('officer_id','!=',null)->count();
        $data['unit_worker_count']=OfficerWorker::where('unit_id','!=',null)->count();

        return view('dashboard',$data);
    }
}
