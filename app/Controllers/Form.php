<?php

namespace App\Controllers;

class Form extends BaseController
{
    public function post_request()
    {
        //memanggil view
        return view('post_request');
    }

    public function post_response()
    {
        //data diambil dari view get_request
        $nama = $this->request->getVar('nama');
        $umur = $this->request->getVar('umur');

        if ($umur > 50 ) {
            $r_umur = 'Lansia';
        } elseif($umur > 25){
            $r_umur = "Dewasa";
        } elseif($umur > 12){
            $r_umur = "Remaja";
        } elseif($umur > 5){
            $r_umur = "Anak - Anak";
        } elseif($umur > 0){
            $r_umur = "Balita";
        }else{
            $r_umur = 'Data Tidak Valid';
        }
        //data dikirim ke view get_response
        $output = [
            'nama' => $nama,
            'umur' => $umur,
            'r_umur' => $r_umur
        ];
        //Perhitungan Umur
        

        //memanggil view dengan membawa data output
        return view('post_response', $output);
    }

    public function get_request()
    {
        //memanggil view
        return view('get_request');
    }

    //$tanda diambil dari config/routes get_response/$1
    public function get_response($tanda,$warna)
    {   
        //data dikirim ke view get_response
        $output = [
            'tanda' => $tanda,
            'warna' => $warna,
        ];

        //memanggil view dengan membawa data output
        return view('get_response', $output);
    }
}