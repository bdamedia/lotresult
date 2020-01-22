<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TransactionModel extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'transaction_models';
    // const CREATED_AT = 'purchased_time';
    // const UPDATED_AT = 'approver_time';

    // public function getTableColumns() {
    //     return $this
    //         ->getConnection()
    //         ->getSchemaBuilder()
    //         ->getColumnListing($this->getTable());
    // }
}

