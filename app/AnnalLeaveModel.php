<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnalLeaveModel extends Model
{

    protected  $fillable=[
        'user_id',
        'title_id',
        'department_id',
        'applyfor',
        'year',
        'effectiveDate',
        'signatureID',
        'recommendedBy',
        'approvedBy'
    ];


   // protected $guarded=['created_at','updated_at'];


    public function department(){

        return $this->belongsTo(DepartmentModel::class,'department_id','id');
    }

    public  function job(){

        return $this->belongsTo(JobModel::class,'title_id','id');
    }

    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }

    public function approves(){

        return $this->belongsTo(User::class,'signatureID','id');
    }


    public function recommend(){

        return $this->belongsTo(User::class,'recommendedBy','id');
    }


    public function approve(){

        return $this->belongsTo(User::class,'approvedBy','id');
    }



}
