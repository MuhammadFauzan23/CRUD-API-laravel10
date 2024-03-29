<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_buku';

    protected $fillable = ['judul', 'pengarang', 'tanggal_publikasi'];
}
