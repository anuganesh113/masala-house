<?php

namespace App\Models;

use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
     protected $table = DBTables::CONTACTS;
}
