<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepository;
use App\Services\User\UserInterfaceService;

class UserImplementService implements UserInterfaceService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return User::orderBy('id', 'desc')->get();
    }

    public function store($data)
    {
        // semua logika bisnis ada disini bukan di controller
        $data['password'] = Hash::make($data['password']);

        $this->userRepository->store($data);
    }

    public function show($data)
    {
        return User::findOrFail($data);
    }

    public function update($data)
    {
        return User::where('id', $data['id'])->update($data);
    }

    public function delete($data)
    {
        return User::destroy($data);
    }
}
