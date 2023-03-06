<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    
    use HasFactory;
    protected $table='pengaduans';
    protected $fillable = [
        'tgl_pengaduan',
        'isi_laporan',
        'status',
        'masyarakat_id',
        'tanggapan'
    ];
    


    public function masyarakat(){
        return $this->belongsTo('App\Models\Masyarakat','masyarakat_id');
    }
}
