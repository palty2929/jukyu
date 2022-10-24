<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Supplier extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;

    protected $softCascade = ['areas', 'bgs', 'powers'];

    protected $dates = ['deleted_at'];

    protected $fillable = ['uuid', 'start_on', 'end_on', 'pps_code', 'name', 'disp_name', 'user_id'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    //=============================================================
    // リレーション
    //=============================================================
    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function bgs()
    {
        return $this->hasMany(Bg::class);
    }

    public function powers()
    {
        return $this->hasMany(Power::class);
    }

    //=============================================================
    // メソッド
    //=============================================================
    public function activeSuppliers($account_date)
    {
        return Supplier::orderBy('pps_code', 'asc')
            ->where('start_on', '<=', $account_date)
            ->where(function ($query) use ($account_date) {
                $query->WhereNull('end_on')->orWhere('end_on', '>', $account_date);
            })
            ->get();
    }
}
