<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class RegionCompany extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'regionscompany';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lottery_company_slug',
    ];

}
