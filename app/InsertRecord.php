<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsertRecord extends Model
{
    //table name
    protected $table='skills';

    public function insertD($data){
    	// return $data;
    	$insert=InsertRecord::insert($data);
        if($insert){
            print_r($insert);
            echo "record added";
        }
        else{
            echo "error in record";
        }
    }
}
