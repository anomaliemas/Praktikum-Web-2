<?php

namespace App\Controllers;

use App\Models\BukuModel;
use Config\Database;
use Config\Services;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $db = Database::connect();
        
        if (!$db->tableExists('tabel_buku')) {
            $db->query("CREATE TABLE `tabel_buku` (
                `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                `judul` VARCHAR(255) NOT NULL,
                `penulis` VARCHAR(255) NOT NULL,
                `penerbit` VARCHAR(255) NOT NULL,
                `tahun_terbit` YEAR NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8");
        }

        $data['buku'] = $this->bukuModel->findAll();
        return view('buku/index', $data);
    }

    public function create()
    {
        session();
        $data['validation'] = Services::validation();
        return view('buku/form', $data);
    }

    public function store()
    {
        $rules = [
            'judul' => [
                'rules' => 'required|string',
                'errors' => ['required' => 'Judul harus diisi', 'string' => 'Judul harus berupa teks']
            ],
            'penulis' => [
                'rules' => 'required|string',
                'errors' => ['required' => 'Penulis harus diisi', 'string' => 'Penulis harus berupa teks']
            ],
            'penerbit' => [
                'rules' => 'required|string',
                'errors' => ['required' => 'Penerbit harus diisi', 'string' => 'Penerbit harus berupa teks']
            ],
            'tahun_terbit' => [
                'rules' => 'required|numeric|greater_than[1800]|less_than[2027]',
                'errors' => [
                    'required' => 'Tahun harus diisi',
                    'numeric' => 'Tahun harus angka',
                    'greater_than' => 'Tahun harus lebih dari 1800',
                    'less_than' => 'Tahun harus kurang dari 2027'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/buku/create')->withInput();
        }

        $this->bukuModel->save([
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ]);
        
        return redirect()->to('/buku');
    }

    public function edit($id)
    {
        session();
        $data['validation'] = Services::validation();
        $data['buku'] = $this->bukuModel->find($id);
        return view('buku/form', $data);
    }

    public function update($id)
    {
        $rules = [
            'judul' => [
                'rules' => 'required|string',
                'errors' => ['required' => 'Judul harus diisi', 'string' => 'Judul harus berupa teks']
            ],
            'penulis' => [
                'rules' => 'required|string',
                'errors' => ['required' => 'Penulis harus diisi', 'string' => 'Penulis harus berupa teks']
            ],
            'penerbit' => [
                'rules' => 'required|string',
                'errors' => ['required' => 'Penerbit harus diisi', 'string' => 'Penerbit harus berupa teks']
            ],
            'tahun_terbit' => [
                'rules' => 'required|numeric|greater_than[1800]|less_than[2027]',
                'errors' => [
                    'required' => 'Tahun harus diisi',
                    'numeric' => 'Tahun harus angka',
                    'greater_than' => 'Tahun harus lebih dari 1800',
                    'less_than' => 'Tahun harus kurang dari 2027'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/buku/edit/'.$id)->withInput();
        }

        $this->bukuModel->save([
            'id' => $id,
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ]);
        
        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        $this->bukuModel->delete($id);
        return redirect()->to('/buku');
    }
}