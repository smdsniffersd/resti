<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    const UPDATED_AT = null;

    public function employeeRoles(): HasMany
    {
        return $this->hasMany(EmployeeRole::class);
    }
    public function rolePermissions(): HasMany
    {
        return $this->hasMany(RolePermission::class, 'role_id');
    }
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id')->withPivot(['granted_at', 'granted_by']);
    }
    public function personals(): BelongsToMany
    {
        return $this->belongsToMany(Personal::class, 'employee_roles', 'role_id', 'employee_id')->withPivot(['assigned_at', 'assigned_by']);
    }
}
