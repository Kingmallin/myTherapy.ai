<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Response\Blog\BlogResponse;
use App\Http\Validation\Blog\CreateBlogValidation;
use App\Http\Validation\Blog\UpdateBlogValidation;
use App\Models\Blog\Repositorys\BlogRepository;
use App\Models\Blog\Services\BlogService;
use Illuminate\Http\Response;

class BlogController extends Controller {

    public function index(BlogRepository $blogRepository)
    {
        return new Response(BlogResponse::many($blogRepository->find()));
    }

    public function create(CreateBlogValidation $validation, BlogService $service)
    {
        return new Response(BlogResponse::many(
        $service->create($validation->post('author'),
        $validation->post('content'),
        $validation->post('subject'),
        $validation->post('name'),
        $validation->post('keywords')
        )));
    }

    public function update(UpdateBlogValidation $validation, BlogService $service)
    {
        return new Response(BlogResponse::many($service->update(
            $validation->post('id'), 
            $validation->post('author'), 
            $validation->post('content'), 
            $validation->post('subject'), 
            $validation->post('name'), 
            $validation->post('keywords')
        )));
    }

    public function delete(int $id, BlogRepository $blogRepository)
    {
        $blogRepository->delete($id);
        return new Response(BlogResponse::many($blogRepository->find()));
    }
}