<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kobo_form_id',
        'village',
       
       ];

       public function getFillables(): Array
       {
           return $this->fillable;
       }  

}
