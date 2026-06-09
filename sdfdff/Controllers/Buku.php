<?php
namespace App\Controllers;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new \App\Models\BukuModel();
    }

    public function index()
    {
        $data['buku'] = $this->bukuModel->findAll();
        return view('buku/index', $data);
    }

    public function create()
    {
        session();
        $data['validation'] = \Config\Services::validation();
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
                'rules' => 'required|numeric|greater_than[1800]|less_than[2024]',
                'errors' => [
                    'required' => 'Tahun harus diisi',
                    'numeric' => 'Tahun harus angka',
                    'greater_than' => 'Tahun harus lebih dari 1800',
                    'less_than' => 'Tahun harus kurang dari 2024'
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
        $data['validation'] = \Config\Services::validation();
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
                'rules' => 'required|numeric|greater_than[1800]|less_than[2024]',
                'errors' => [
                    'required' => 'Tahun harus diisi',
                    'numeric' => 'Tahun harus angka',
                    'greater_than' => 'Tahun harus lebih dari 1800',
                    'less_than' => 'Tahun harus kurang dari 2024'
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