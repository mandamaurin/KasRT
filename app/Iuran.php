<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Iuran extends Model
{
    use Softdeletes;

    protected $table = 'iurans';
    protected $primaryKey = 'id';

    protected $fillable = ['nama', 'bulan', 'kredit', 'debit', 'keterangan'];

    protected $dates =['deleted_at'];

    public function getKreditLabelStringAttribute()
    {
    	return 'Rp ' . number_format($this->getAttribute('kredit'), 0, ',', '.');
    }

    public function getDebitLabelStringAttribute()
    {
    	return 'Rp ' . number_format($this->getAttribute('debit'), 0, ',', '.');
    }

    public function lgk_price($number)
    {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }
}
