<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Contatos extends Model {

    protected $table = 'contato';
    public $incrementing = false;
    public $primaryKey = 'id_contato';
    protected $dates = ['dt_criacao'];

}
