<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\GoodReceipt;
use App\Models\Leave;
class DashboardController extends Controller
{
    public function index(){
        $data['total_staff'] = Staff::StaffCountAll();
        $data['total_leave'] = Leave::CountAll();
        $data['last_leave'] = Leave::LastLeaveRequest();
        $data['total_goodreceipt'] = GoodReceipt::CountAll();
        $data['goodreceipt'] = GoodReceipt::take(10)->get();
        $data['leaves'] = Leave::LeaveForDashboard();
        $data['latestleave'] = Leave::LatestApprovedLimit(10);
        return view("dashboard",$data);
    }
}
