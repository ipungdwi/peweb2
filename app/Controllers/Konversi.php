<?php
namespace App\Controllers;

//memanggil model
use App\Models\SatuanModel;
use App\Models\KonversiModel;

class Konversi extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->KonversiModel = new KonversiModel();
        $this->SatuanModel = new SatuanModel();
    }

    public function list()
    {
        //select data from table buku
        $list = $this->KonversiModel->select('konversi.id, konversi.suhu, konversi.suhu as konversi_suhu, satuan.nama AS satuan_nama, 
        satuan.titik_beku as titik_beku, satuan.titik_didih as titik_didih, kondisi')->join('satuan','konversi.satuan_id = satuan.id')->orderBy('satuan.nama, nama')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('konversi_list', $output);
    }

    public function insert()
    {
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_satuan = $this->SatuanModel->orderBy('nama, titik_didih, titik_beku')->findAll();

        $output = [
            'data_satuan' => $data_satuan,
        ];

        return view('konversi_insert', $output);
    }

    public function insert_save()
    {
        $satuan_id = $this->request->getVar('satuan_id');
        $suhu = $this->request->getVar('suhu');

        $titik_suhu = $this->SatuanModel->select('titik_beku, titik_didih')->where('id', $satuan_id)->first();

        $titik_beku = $titik_suhu['titik_beku'];
        $titik_didih = $titik_suhu['titik_didih'];


        if ($suhu >= $titik_didih) {
            $kondisi = 'mendidih';
        } elseif($suhu <= $titik_beku){
            $kondisi = 'beku';
        } else 
         {
            $kondisi = 'normal';
        
        }
        //insert data ke table buku
        $this->KonversiModel->insert([
            'satuan_id' => $satuan_id,
            'suhu' => $suhu,
            'kondisi' => $kondisi

        ]);

        return redirect()->to('konversi');
    }

    public function update($id)
    {
        //select data kategori yang dipilih (filter by id)
        $data =  $this->KonversiModel->where('id', $id)->first();
        
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_satuan = $this->SatuanModel->orderBy('nama')->findAll();

        $output = [
            'data' => $data,
            'data_satuan' => $data_satuan,
        ];

        return view('konversi_update', $output);
    }

    public function update_save($id)
    {
        $satuan_id = $this->request->getVar('satuan_id');
        $suhu = $this->request->getVar('suhu');

        //update data ke table buku filter by id
        
        $titik_suhu = $this->SatuanModel->select('titik_beku, titik_didih')->where('id', $satuan_id)->first();

        $titik_beku = $titik_suhu['titik_beku'];
        $titik_didih = $titik_suhu['titik_didih'];


        if ($suhu >= $titik_didih) {
            $kondisi = 'mendidih';
        } elseif($suhu <= $titik_beku){
            $kondisi = 'beku';
        } else 
         {
            $kondisi = 'normal';
        
        }
        //insert data ke table buku
        $this->KonversiModel->update($id, [
            'satuan_id' => $satuan_id,
            'suhu' => $suhu,
            'kondisi' => $kondisi
        ]);

        return redirect()->to('konversi/');
    }

    public function delete($id)
    {   
        //delete data table buku filter by id
        $this->KonversiModel->delete($id);
        return redirect()->to('konversi');
    }
}