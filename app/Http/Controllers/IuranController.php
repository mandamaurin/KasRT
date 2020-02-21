<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Iuran;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;
use DB;

class IuranController extends Controller
{
    public function dashboard()
    {
        $iuran = Iuran::select('iurans.*', DB::Raw("SUM(iurans.debit) as jumlah_debit"), 
            DB::Raw("SUM(iurans.kredit) as jumlah_kredit"))
            ->groupBy('iurans.bulan')
            ->orderBy('iurans.id', 'ASC')
            ->get();

        $semua_debit_kredit = Iuran::select('iurans.*', DB::Raw("SUM(iurans.debit) as semua_debit"), DB::Raw("SUM(iurans.kredit) as semua_kredit"))->get();

        return view('iuran.dashboard', compact('iuran', 'semua_debit_kredit'));
    }

    public function index(Request $request)
    {
    	$table = Iuran::select('iurans.*')->groupBy('iurans.bulan');

        $iuran = Iuran::when($request->kategori, function($query) use ($request){
                $query->where($request->kategori, 'like', '%' . $request->get('search') . '%');
            })->get();

        $iuran1 = Iuran::select('iurans.*', DB::Raw("SUM(iurans.debit) as jumlah_debit"), 
            DB::Raw("SUM(iurans.kredit) as jumlah_kredit"))
            ->groupBy('iurans.bulan')
            ->get();

    	return view('iuran.index', compact('iuran', 'iuran1', 'table'));

    }

    public function create()
    {

    	return view('iuran.create');

    }

    public function edit($id)
    {
        $data = Iuran::find($id);
        $bulan = explode(' ', $data->bulan);
    	return view('iuran.edit', compact('data', 'bulan'));
    }

    public function show($id)
    {
    	return view('iuran.detail');

    }

    public function store(Request $request)
    {
        $iuran = new Iuran;
        $iuran->nama = $request->nama;
        $iuran->bulan = $request->bulan .' '.$request->tahun;
        $iuran->kredit = $request->kredit;
        $iuran->debit = $request->debit;
        $iuran->keterangan = $request->keterangan;
        $iuran->created_at = Carbon::now();
        $iuran->updated_at = Carbon::now();
        $in = $iuran->save();

        if($in)
        {
            return redirect()->back()->with('success', 'Data Berhasil Ditambah');
        } else{
            echo "Gagal";
        }

    }

    public function update(Request $request, $id)
    {

        $iuran = Iuran::find($id);
        $iuran->nama = $request->nama;
        $iuran->bulan = $request->bulan.' '.$request->tahun;
        $iuran->kredit = $request->kredit;
        $iuran->debit = $request->debit;
        $iuran->keterangan = $request->keterangan;
        $iuran->updated_at = Carbon::now();
        $in = $iuran->save();

        if($in)
        {
            return redirect()->back()->with('success', 'Data Berhasil Ditambah');
        } else{
            echo "Gagal";
        }
    }

    public function export()
    {
        $iuran = Iuran::select('iurans.*', DB::Raw("SUM(iurans.debit) as jumlah_debit"), 
            DB::Raw("SUM(iurans.kredit) as jumlah_kredit"))
            ->groupBy('iurans.bulan')
            ->orderBy('iurans.id', 'ASC')
            ->get();

        $semua_debit_kredit = Iuran::select('iurans.*', DB::Raw("SUM(iurans.debit) as semua_debit"), DB::Raw("SUM(iurans.kredit) as semua_kredit"))->get();

        $pdf = \PDF::loadview('iuran.export',['iuran'=>$iuran, 'semua_debit_kredit' => $semua_debit_kredit]);
            return $pdf->stream('laporan-keuangan-pdf');

        // return view('iuran.export', compact('iuran', 'semua_debit_kredit'));
    }

    public function delete($id)
    {

    }
}
