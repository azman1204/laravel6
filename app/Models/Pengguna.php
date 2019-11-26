<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

// convention over configuration
class Pengguna extends Authenticatable {
    protected $table = 'pengguna';

    // public function getAuthPassword() {
    //     return $this->kata_laluan;
    // }
}