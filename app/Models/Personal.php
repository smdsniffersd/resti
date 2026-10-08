<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Personal extends Model
{
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'int';

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function employeeRoles(): HasMany{
        return $this->hasMany(EmployeeRole::class, 'employee_id');
    }
    public function roles(): BelongsToMany{
        return $this->belongsToMany(Role::class, 'employee_roles', 'employee_id', 'role_id')->withPivot(['assigned_by', 'assigned_at']);
    }
    public function assignedRoles(): HasMany{
        return $this->hasMany(EmployeeRole::class, 'assigned_by');
    }
    public function reservations(): HasMany{
        return $this->hasMany(Reservation::class, 'waiter_id');
    }
    public function grantedPermissions(): HasMany{
        return $this->hasMany(RolePermission::class, 'granted_by');
    }
    public function operations(): HasMany{
        return $this->hasMany(Operation::class, 'created_by_id');
    }
    public function orders(): HasMany{
        return $this->hasMany(Order::class, 'waiter_id');
    }
    public function responsibleLocations(): HasMany{
        return $this->hasMany(Location::class, 'responsible_person_id');
    }
}
