<?php

namespace App\Modules\Roles\Data\Models;

use App\Modules\Documents\Data\Models\Document;
use App\Modules\Employees\Data\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class)
                    ->withPivot([
                        'permission',
                        'created_at',
                        'updated_at'
                    ])
                    ->withTimestamps();
    }
}
