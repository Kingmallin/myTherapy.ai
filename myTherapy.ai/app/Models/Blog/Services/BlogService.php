<?php

namespace App\Models\Blog\Services;

use App\Models\Blog\BlogPost;
use App\Models\Blog\Repositorys\BlogRepository;

class BlogService {

    public function __construct(public BlogRepository $blogRepository)
    {
    }

    public function create($author, $content, $subject, $name, $keywords)
    {
        $this->blogRepository->save(new BlogPost(
        $author,
        $content,
        $subject,
        $name,
        $keywords));

        return $this->blogRepository->find();
    }

    public function update($id, $author, $content, $subject, $name, $keywords)
    {
        $blog = $this->blogRepository->findById($id);
        $blog->setAuthor($author);
        $blog->setContent($content);
        $blog->setSubject($subject);
        $blog->setName($name);
        $blog->setKeywords($keywords);
        $this->blogRepository->save($blog);

        return $this->blogRepository->find();
    }
}