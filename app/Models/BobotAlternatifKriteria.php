<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotAlternatifKriteria extends Model
{
    protected $table='bobot_alternatif_kriteria';

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
