<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examiner extends Model
{
    use HasFactory;
    protected $fillable = [
        'examiner_id',
        'name',
        'jabatan',
        'address',
        'phone_number',
    ];

    // Relasi dengan tabel patient
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    // Relasi dengan tabel ukuran
    public function ukuran()
    {
        return $this->hasMany(Ukuran::class);
    }

    // Contoh penggunaan paginator
    public static function getPaginatedExaminers($perPage = 10)
    {
        return self::paginate($perPage);
    }
}
