<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{

    protected $guarded=['created_at','updated_at'];

    protected $fillable=['name'];

    public function leave(){
        return $this->hasMany(AnnalLeaveModel::class,'department_id');
    }

}
