<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table='alternatif';

    protected $fillable = [
        'kode_alternatif',
        'nama_alternatif'
    ];

    public function bobot_alternatif_kriteria()
    {
        return $this->hasMany(BobotAlternatifKriteria::class);
    }

    public function kriteria()
    {
        return $this->belongsToMany(Kriteria::class, 'bobot_alternatif_kriteria', 'alternatif_id', 'kriteria_id');
    }

}
