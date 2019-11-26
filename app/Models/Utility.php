<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// convention over configuration
class Utility extends Model {
    protected $table = 'utility';
    public $timestamps = false;

    // return next running no
    public static function nextNo() {
        $util = self::first();
        $no = $util->bil_no;
        $util->bil_no = $no + 1;
        $util->save();
        return $no;
    }
}