<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'tabel_buku';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'penulis', 'penerbit', 'tahun_terbit'];
}