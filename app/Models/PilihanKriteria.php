<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PilihanKriteria extends Model
{
    protected $table='pilihan_kriteria';

    protected $fillable = [
        'kriteria_id',
        'nama_pilihan',
        'bobot',
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
