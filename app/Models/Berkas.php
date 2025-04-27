<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    /** @use HasFactory<\Database\Factories\BerkasFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal',
        'no_berkas',
        'nama_customer',
        'tipe',
        'file_path',
    ];

    protected $hidden = [
        'seq',
    ];

    protected $casts = [
        'tanggal' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
