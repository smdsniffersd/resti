<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RolePermission extends Model
{
    public $timestamps = false;

    public function role(): BelongsTo{
        return $this->belongsTo(Role::class);
    }
    public function permission(): BelongsTo{
        return $this->belongsTo(Permission::class);
    }
    public function grantedBy(): BelongsTo{
        return $this->belongsTo(Personal::class, 'granted_by', 'user_id');
    }

}
