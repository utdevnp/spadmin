<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveTypeSetup extends Model
{
    use HasFactory;

    protected $fillable = ['name',"active",'total_hour'];

    public function scopeGetAll(){
        return $this->get();
    }

    public function scopeActiveLeaveType()
    {
        return $this->where(['active' => 'yes'])->get();

    }

}
