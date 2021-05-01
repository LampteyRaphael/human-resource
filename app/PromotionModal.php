<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotionModal extends Model
{
    protected $fillable=[
        'user_id',
        'dateClaimofPromotion',
        'approval',
        'itemTaken'
    ];


    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }


}
