<?php

namespace App\Repositories\User;

interface UserRepository
{
    public function index();
    public function store($data);
    public function show($data);
    public function update($data);
    public function delete($data);
}