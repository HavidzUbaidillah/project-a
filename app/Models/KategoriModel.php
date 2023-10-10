<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class KategoriModel extends Model
{
    use HasFactory;
    protected $table  = 'kategori';
    protected $primaryKey  = 'idKategori';
    protected $guarded = ['idKategori'];

    public function getKategori(){
        try {
            return DB::table('kategori')
                ->select('nama','imgUrl')
                ->get();
        }catch (QueryException $e){
            return false;
        }
    }

    public function createKategori(){

    }
}
