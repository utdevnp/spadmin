<?php 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FiscalYear;
use App\Models\LeaveCalculate;

function getPermission(){
    return json_decode(Auth::user()->permisson);
}


function CurrentFiscalYearId(){
    return FiscalYear::where("default",1)->first()->id;
}

function CurrentFiscalYearDetail(){
    return FiscalYear::where("default",1)->first();
}

function leaveCalculate($findLeave,$status){

    $getLeaveHour = LeaveCalculate::where([
        "user_id"=>$findLeave->user_id,
        "leave_type"=>$findLeave->leave_type_id,
    ])->first();
    
    if( $getLeaveHour){

        if($status=='rejected'){
            if( $getLeaveHour->remain_leave == 0){
                $calculate = $getLeaveHour->total_hour +  $getLeaveHour->remain_leave ;
            }else{
                $calculate =  $getLeaveHour->remain_leave + $findLeave->leave_hour;
            }
            
        }elseif($status == "approved"){
            if( $getLeaveHour->remain_leave == 0){
                $calculate = $getLeaveHour->total_hour -  $findLeave->leave_hour;
            }else{
                $calculate =  $getLeaveHour->remain_leave - $findLeave->leave_hour;
            }
            
        }else{
            $calculate = 0;
        }
        
       

        $getLeaveHour->update([
            'remain_leave'=>$calculate
        ]);

        return true;
    }else{
        return false;
    }
    



}


function staffUserId($staff_id){

    if(!empty(User::where("staff_id",$staff_id)->first()->id)){
        return User::where("staff_id",$staff_id)->first()->id;
    }else{
        return 0;
    }
}

function UserId(){
    return Auth::id();
}


function getRole(){
   return Auth::user()->role;
}

function checkRoute($segment){
  
    if($segment){
        if(array_search($segment, getPermission())){
            return true;
        }else{
            return false;
        }
    }
    
}


function ConditionName($id){
    $condition  = config("spnconfig.asset_conditions");
    foreach( $condition as $key=>$vlaue){
        if($key == $id){
            return $vlaue;
        }
    }
}



function AssetLocationName($id){
    $condition  = config("spnconfig.asset_locations");
    foreach( $condition as $key=>$vlaue){
        if($key == $id){
            return $vlaue;
        }
    }
}


function exportFileName($name){
    return date("F-j-Y-g:i:a")."_".$name;
}


