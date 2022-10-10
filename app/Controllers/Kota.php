<?php
namespace App\Controllers;

//memanggil model
use App\Models\KotaModel;
use App\Models\ProvinceModel;

class Kota extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->KotaModel = new KotaModel();
        $this->ProvinceModel = new ProvinceModel();
    }

    public function list()
    {
        //select data from table buku
        $list = $this->KotaModel->select('kota.id, kota.nama, province.nama AS province_nama, province.id as province_id')->join('province','kota.province_id = province.id')->orderBy('province.nama, nama')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('kota_list', $output);
    }

    public function insert()
    {
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_province = $this->ProvinceModel->orderBy('nama')->findAll();

        $output = [
            'data_province' => $data_province,
        ];

        return view('kota_insert', $output);
    }

    public function insert_save()
    {
        $province_id = $this->request->getVar('province_id');
        $nama = $this->request->getVar('nama');

        //insert data ke table buku
        $this->KotaModel->insert([
            'province_id' => $province_id,
            'nama' => $nama,
        ]);

        return redirect()->to('kota');
    }

    public function update($id)
    {
        //select data kategori yang dipilih (filter by id)
        $data =  $this->KotaModel->where('id', $id)->first();
        
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_province = $this->ProvinceModel->orderBy('nama')->findAll();

        $output = [
            'data' => $data,
            'data_province' => $data_province,
        ];

        return view('kota_update', $output);
    }

    public function update_save($id)
    {
        $province_id = $this->request->getVar('province_id');
        $nama = $this->request->getVar('nama');

        //update data ke table buku filter by id
        $this->KotaModel->update($id, [
            'province_id' => $province_id,
            'nama' => $nama,
        ]);

        return redirect()->to('kota/');
    }

    public function delete($id)
    {   
        //delete data table buku filter by id
        $this->KotaModel->delete($id);
        return redirect()->to('kota');
    }
}