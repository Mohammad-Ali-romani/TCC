<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_groups extends Model
{
    use HasFactory;

    protected $table ='admin_groups';
    protected $fillable = [
        'id',
        'user_id',
        'admin_show',
        'admin_add',
        'admin_edit',
        'admin_delete',
        'lecture_show',
        'lecture_add',
        'lecture_edit',
        'lecture_delete',
        'ad_show',
        'ad_add',
        'ad_edit',
        'ad_delete',
        'program_show',
        'program_add',
        'program_edit',
        'program_delete',
        'mark_show',
        'mark_add',
        'mark_edit',
        'mark_delete',
        'subject_show',
        'subject_add',
        'subject_edit',
        'subject_delete',
        'created_at',
        'updated_at',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
