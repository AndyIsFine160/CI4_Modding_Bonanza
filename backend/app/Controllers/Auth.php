<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use Config\Services;

class Auth extends BaseController
{
    public function login()
    {
        $request = service('request');
        $session = session();
        $validation = \Config\Services::validation();
        $validation->setRule('email', 'Email', 'required|valid_email');
        $validation->setRule('password', 'Password', 'required');
        $post = $request->getPost();

        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        $email = $request->getPost('email');
        $userModel = new \App\Models\UsersModel();
        $user = $userModel->where('email', $email)->first();

        if (! $user) {
            $session->setFlashdata('errors', ['email' => 'No account available']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        $userArr = is_array($user) ? $user : (method_exists($user, 'toArray') ? $user->toArray() : (array) $user);

        if (! password_verify($request->getPost('password'), $userArr['password_hash'] ?? '')) {
            $session->setFlashdata('errors', ['password' => 'Incorrect password']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        $session->set('user', [
            'user_id'   => $userArr['user_id'] ?? null,
            'email'     => $userArr['email'] ?? null,
            'user_name' => $userArr['user_name'] ?? null,
            'type'      => $userArr['type'] ?? null
        ]);

        $type = strtolower($userArr['type'] ?? 'client');
        if ($type === 'admin') {
            return redirect()->to('/dash');
        }
        if ($type === 'client') {
            return redirect()->to('/');
        }
    }
    public function logout()
    {
        session()->destroy();
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 3600, $params['path'] ?? '/', $params['domain'] ?? '', isset($_SERVER['HTTPS']), true);

        return redirect()->to('/');
    }

    public function signup()
    {
        $session = session();
        $request = service('request');
        $validation = \Config\Services::validation();

        $validation->setRule('email', 'Email', 'required|valid_email');
        $validation->setRule('user_name', 'Username', 'required|min_length[5]'); // Should be unique + has number
        $validation->setRule('password', 'Password', 'required|min_length[5]');
        $validation->setRule('confirm', 'Confirm Password', 'required|matches[password]');
        /*$validation->setRule(
            'user_name',
            'Username',
            'required|min_length[5]|regex_match[/[0-9]/]',
            ['regex_match' => 'Username must contain at least one number.']
        );*/

        $post = $request->getPost();

        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // Initialize model BEFORE using it
        $userModel = new \App\Models\UsersModel();

        // Check if email already exists
        if ($userModel->where('email', $post['email'])->first()) {
            $session->setFlashdata('errors', ['email' => 'Email already exists']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }
        if ($userModel->where('user_name', $post['user_name'])->first()) {
            $session->setFlashdata('errors', ['user_name' => 'Username already exists']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }
        if (!preg_match('/[0-9]/', $post['user_name'])) {
            $session->setFlashdata('errors', ['user_name' => 'Username must contain at least one number.']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }


        // Insert user
        $data = [
            'user_name'      => $post['user_name'],
            'email'          => $post['email'],
            'password_hash'  => password_hash($post['password'], PASSWORD_DEFAULT),
            'type'           => 'client',
            'account_status' => 1
        ];

        $inserted = $userModel->insert($data);

        if ($inserted) {
            return redirect()->to('/login')->with('success', 'Account created successfully.');
        } else {
            $session->setFlashdata('errors', ['db' => 'Failed to create account.']);
            return redirect()->back()->withInput();
        }
    }
}
