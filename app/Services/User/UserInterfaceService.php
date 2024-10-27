<?php

namespace App\Services\User;

interface UserInterfaceService
{
    public function index();
    public function store($data);
    public function show($data);
    public function update($data);
    public function delete($data);
}
