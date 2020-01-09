<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_role';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = ['display_name', 'description'];
}
