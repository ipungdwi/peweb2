<?php
namespace App\Controllers;

//memanggil model
use App\Models\ProvinceModel;

class Province extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this-> ProvinceModel= new ProvinceModel();
    }

    public function list()
    {
        //select data from table Province
        $list = $this->ProvinceModel->select('id, nama, wilayah')->orderBy('nama, wilayah')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('province_list', $output);
    }

    public function insert()
    {
        return view('province_insert');
    }

    public function insert_save()
    {
        $nama = $this->request->getVar('nama');
        $wilayah = $this->request->getVar('wilayah');

        //insert data ke table kategori
        $this->ProvinceModel->insert([
            'nama' => $nama,
            'wilayah' => $wilayah,
        ]);

        return redirect()->to('province');
    }
    
    public function update($id)
    {
        //select data kategori yang dipilih (filter by id)
        $data =  $this->ProvinceModel->where('id', $id)->first();
        
        $output = [
            'data' => $data,
        ];

        return view('province_update', $output);
    }

    public function update_save($id)
    {
        $nama = $this->request->getVar('nama');
        $wilayah = $this->request->getVar('wilayah');

        //update data ke table kategori filter by id
        $this->ProvinceModel->update($id, [
            'nama' => $nama,
            'wilayah' => $wilayah,
        ]);

        return redirect()->to('province/');
    }

    public function delete($id)
    {   
        //delete data table kategori filter by id
        $this->ProvinceModel->delete($id);
        return redirect()->to('province');
    }
}