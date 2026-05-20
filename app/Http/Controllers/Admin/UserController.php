<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use \App\Repositories\UserRepository;
use App\Http\Requests\UpdateUserRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $userRepository;
    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }   
    public function index()
    {
        return view('admin.user');
    }

    public function userData(){
        $data = $this->userRepository->getAllUser();
        $html = view('admin.user-list',compact('data'))->render();
    
        return response()->json([
            'status' => true,
            'html' => $html
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User  $user)
    {
        return response()->json([
            'status' => true,
            'data' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
         return response()->json([
            'status' => true,
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {   
        $validated = $request->validated();
        $this->userRepository->updateUser($validated, $user);
        return response()->json([
            'status' => true,
            'message' => 'User Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(c $c)
    {
        //
    }
}
