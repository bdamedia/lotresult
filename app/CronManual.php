<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CronManual extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'cron_manual';
}
