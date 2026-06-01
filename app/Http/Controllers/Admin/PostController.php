<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Services\PostService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $PostService;
    public function __construct(PostService $PostService){

        $this->PostService = $PostService;

    }
    public function index()
    {
        return view('admin.post');
    }

    public function getPost(Request $request){
        $perPage = 3; // Items per page
        $data = $this->PostService->getPostData($perPage); 
        $html = view('admin.post-list',compact('data'))->render();  
        
        return response()->json(['status'=>true,'html'=>$html]);
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
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
