<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = ['title' => "Login"];
        return view('auth/login', $data);
    }

    public function registerView()
    {
        $data = [
            'title' => "Register",
            'validation' => \Config\Services::Validation()
        ];
        return view('auth/register', $data);
    }

    public function login()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $model->getData($username, $password);

        if (($cek['username'] == $username) && ($cek['password'] == $password)) {
            session()->set('id', $cek['id']);
            session()->set('fullname', $cek['fullname']);
            session()->set('nim', $cek['nim']);
            session()->set('profile', $cek['profile']);
            return redirect()->to(base_url('home'));
        } else {
            session()->setFlashdata('gagal', 'username / password salah');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function register()
    {
        // Form validation
        // Rules : aturan untuk masing masing form
        // errors : menampilkan pesan error sesuai aturan yang di gunakan

        if (!$this->validate([
            'fullname' => [
                'rules' => 'required|max_length[30]',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'max_length' => '{field} tidak boleh lebih dari 30 karakter',
                ]
            ],
            'nim' => [
                'rules' => 'required|max_length[10]|numeric',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'max_length' => '{field} hanya boleh berisi 10 karakter',
                    'numeric' => '{field} hanya boleh diisi dengan angka'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.',                
                ]
            ],
            'password' => [
                'rules' => 'trim|required|min_length[8]|regex_match[/^((?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})$/]',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'min_length' => '{field} harus berisi 8 karakter',
                    'regex_match' => '{field} harus minimal memiliki 1 huruf besar , 1 huruf kecil dan memiliki 1 karakter spesial.'
                ]
            ],
            'profile' => [
                'rules' => 'uploaded[profile]|max_size[profile,500]|is_image[profile]|mime_in[profile,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar profile terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar max : 500 kB',
                    'is_image' => 'Tipe file salah, file yang di perbolehkan .jpg .jpeg dan .png *',
                    'mime_in' => 'Tipe file salah, file yang di perbolehkan .jpg .jpeg dan .png *'
                ]
            ]
        ])) {

            return redirect()->to('registerView')->withInput();
        }

        // Store Data ke database
        $fileProfile = $this->request->getFile('profile');
        $fileProfile->move('img');
        $namaGambar = $fileProfile->getName();

        $data = array(
            'fullname' => $this->request->getPost('fullname'),
            'nim' => $this->request->getPost('nim'),
            'username' => strtolower($this->request->getPost('username')),
            'password' => $this->request->getPost('password'),
            'profile' => $namaGambar
        );

        $this->userModel->save($data);
        session()->setFlashdata('berhasil', 'Anda Berhasil Registrasi');

        return redirect()->to('/');
    }
}
