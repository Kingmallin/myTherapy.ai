<?php

namespace App\Http\Response\Blog;

use App\Models\Blog\BlogPost;

class BlogResponse
{
    /**
     * Transform a single blog post.
     *
     * @param BlogPost $blogPost
     * @return array
     */
    public static function one(BlogPost $blogPost): array
    {
        return [
            'id' => $blogPost->getId(),
            'name' => $blogPost->getName(),
            'author' => $blogPost->getAuthor(),
            'subject' => $blogPost->getSubject(),
            'content' => $blogPost->getContent(),
            'keywords' => $blogPost->getKeywords(),
        ];
    }

    /**
     * Transform multiple blog posts.
     *
     * @param array $blogPosts
     * @return array
     */
    public static function many(array $blogPosts): array
    {
        $response = [];
        foreach ($blogPosts as $blogPost) {
            $response[] = self::one($blogPost);
        }
        return $response;
    }
}
