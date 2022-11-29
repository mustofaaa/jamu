<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('rekomendasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Pendeklarasian variabel
        $saran = Saran();
        $newDate = date("Y", strtotime($request->tahun));
        $class = new Saran($newDate, $status);
        $hobi = explode(',', $request->hobi);

        // data untuk dikirim
        $data = [
            'nama' => $nama,
            'status' => $status,
            'hobi' => $hobi[rand(0, count($hobi) - 1)],
            'tahun' => $class->hitungUmur(),
            'konsul' => $class->StatusKonsul()
        ];
        return view('bmi',compact('data'));
    }
}

class Jamu{
    public function namaJamu(Request $request)
    {
        $keluhan = $request->keluhan;
        if ($keluhan == 'keseleo dan kurang nafsu makan') {
            return 'jamu yang cocok adalah Beras Kencur.';
        } elseif($keluhan == 'pegal-pegal'){
            return 'jamu yang cocok adalah Kunyit Asam.';
        }elseif($keluhan == 'darah tinggi dan gula darah'){
            return 'jamu yang cocok adalah Brotowali.';
        }elseif($keluhan == 'kram perut dan masuk angin'){
            return 'jamu yang cocok adalah Temulawak.';
        }
        
    }
}
class Umur
{
    public function __construct($tahunLahir)
    {
        $this->tahunlahir = $tahunLahir;
    }
    public function hitungUmur()
    {
        return 2022 - $this->tahunlahir;
    }
}

class Saran extends Umur{
    public function StatusKonsul()
    {
        if ($this->hitungUmur() <= 10) {
            $saran = 'Dikonsumsi 1x';
        } else {
            $saran = 'Dikonsumsi 2x';
        }
        
        if ($saran == 'dewasa' && $this->bmi == 'Obesitas') {
            return 'Anda bisa mendapatkan Konsultasi gratis';
        } else {
            return 'Anda belum bisa mendapatkan Konsultasi gratis';
        }
        
    }
}