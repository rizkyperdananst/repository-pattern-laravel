<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Repositories\User\UserRepository;
use App\Services\User\UserInterfaceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userInterfaceService;

    public function __construct(UserInterfaceService $userInterfaceService)
    {
        $this->userInterfaceService = $userInterfaceService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // pastikan di postman pada headers menyertakan key nya accept dan valuenya application/json
        $data = $this->userInterfaceService->index();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'get all users',
            'data' => $data,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $storeUserRequest)
    {
        $data = $this->userInterfaceService->store($storeUserRequest->validated());

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'created successfully',
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->userInterfaceService->show($id);

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'showing successfully',
            'data' => $data,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->userInterfaceService->update($request);

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'updated successfully',
            'data' => $data,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->userInterfaceService->delete($id);

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'deleted successfully',
            'data' => $data,
        ], 201);
    }
}
