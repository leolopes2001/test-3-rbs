<?php 

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;


class User extends BaseController
{
    protected $userService;

    public function __construct()
    {
        $this->userService = Services::userService();
        helper('url');
        helper('check_valid_id');
    }

    public function index()
    {
        $data['users'] = $this->userService->getAllUsers();
        return view('user_list', $data);
    }

    public function create()
    {
        return view('user_form');
    }

    public function store()
    {
        $validation = Services::validation();

        $validation->setRules([
            'name'  => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]'
        ]);

        if (! $validation->withRequest($this->request)->run()) {
            return view('user_form', [
                'validation' => $validation
            ]);
        }

        $name = htmlspecialchars(filter_input(INPUT_POST,'name', FILTER_SANITIZE_SPECIAL_CHARS));
        $email = htmlspecialchars(filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL));

        $this->userService->createUser([
            'name' => $name ,
            'email' => $email
        ]);

        return redirect()->to('/');
    }

    public function edit($id = null)
    {
        check_valid_id($id);
     
        $user = $this->userService->getUser($id);
        if (!$user) {
            throw new PageNotFoundException("User with id $id not found");
        }

        return view('user_form', ['user' => $user]);
    }

    public function update($id = null)
    {
        check_valid_id($id);
    
        $validation = Services::validation();

        $validation->setRules([
            'name'  => 'required|min_length[3]',
            'email' => [
                'rules'  => "required|valid_email|is_unique[users.email,id,$id]",
                'errors' => [
                    'is_unique' => 'Email already exists!'
                ]
            ]
        ]);

        if (! $validation->withRequest($this->request)->run()) {
            return view('user_form', [
                'validation' => $validation,
                'user'       => $this->userService->getUser($id)
            ]);
        }

        $name = htmlspecialchars(filter_input(INPUT_POST,'name', FILTER_SANITIZE_SPECIAL_CHARS));
        $email = htmlspecialchars(filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL));

        $this->userService->updateUser($id, [
            'name' => $name,
            'email' => $email
        ]);

        return redirect()->to('/');
    }

    public function delete($id = null)
    {
        check_valid_id($id);
        
        if (!$this->userService->getUser($id)) {
            throw new PageNotFoundException("User with ID $id not found");
        }

        $this->userService->deleteUser($id);
        return redirect()->to('/');
    }
}
