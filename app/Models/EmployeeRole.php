<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeRole extends Model
{
    public $timestamps = false;

    public function role(): BelongsTo{
        return $this->belongsTo(Role::class);
    }
    public function employee(): BelongsTo{
        return $this->belongsTo(Personal::class, 'employee_id', 'user_id');
    }
    public function assignedBy(): BelongsTo{
        return $this->belongsTo(Personal::class, 'assigned_by', 'user_id');
    }
}
