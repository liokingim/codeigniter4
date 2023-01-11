<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    public function create()
    {
        $model = model(UsersModel::class);

        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $validation->reset();
            $data = [
                'name' => $this->request->getPost('name'),
                'email'  => $this->request->getPost('email'),
            ];
            $validation->run($data, 'users');
            $errors = $validation->getErrors();

var_dump($errors);

            $model->save([
                'name' => $this->request->getPost('name'),
                'email'  => $this->request->getPost('email'),
            ]);

            return view('users/success');
        }

        return view('templates/header', ['title' => 'Create a User'])
            . view('users/create')
            . view('templates/footer');
    }
}