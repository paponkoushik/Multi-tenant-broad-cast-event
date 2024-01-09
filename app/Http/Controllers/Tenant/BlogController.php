<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Services\LecturerService;
use App\Services\Tenant\BlogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected $service;

    public function __construct(BlogService $service)
    {
        $this->service = $service;
    }

    public function create()
    {
        return view('blog');
    }

    public function store(BlogRequest $request): JsonResponse
    {
        $this->service
            ->storeBlog($request->only('title', 'description'))
            ->SendNotification();

        return response()->json(['message' => "Blog posted successfully"], 201);
    }
}
