<?php

namespace App\Controllers;

use App\Model\User;
use MyFramework\Framework\Http\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = (new User())->all();
        return $this->render('users', $users);
    }
    public function show($id)
    {
        $user = (new User())->find($id);
        return $user;
//        если перенаправлять во вьюху
//        return $this->render('users', $user);
    }
    public function create()
    {
        $data = $this->json();
        $user = new User();
        $user->create($data);
        return $data;
//        если перенаправлять во вьюху
//        return $this->render('users', $data);
    }
    public function update($id)
    {
        $data = $this->json();
        $user = new User();
        $user->update(['id' => $id], $data);
        return $data;
//        если перенаправлять во вьюху
//        return $this->render('users', $data);

    }

    public function delete($id)
    {
        $user = new User();
        return $user->where(['id' => $id])->delete();
    }
}