<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserRepositoryImplement implements UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return User::orderBy('id', 'desc')->get();
    }

    public function store($data)
    {
        // $dataUser = [
        //     "name" => $data->name,
        //     "email" => $data->email,
        //     "password" => Hash::make($data->password)
        // ];

        // $user = User::create($dataUser);

        // return $user;

        $this->user::create($data);
    }

    public function show($data)
    {
        return User::find($data);
    }

    public function update($data)
    {
        $dataUser = [
            "name" => $data->name,
            "email" => $data->email,
            "password" => Hash::make($data->password)
        ];

        $user = User::find($data->id)->update($dataUser);

        return $user;
    }

    public function delete($data)
    {
        $user = User::find($data)->delete();

        return $user;
    }
}
