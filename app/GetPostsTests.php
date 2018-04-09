<?php

namespace Tests\Feature;

use Tests\TestCase;

class GetAllPostsTest extends TestCase
{
    public function testGetAllPosts()
    {
        $post = factory(\App\Post::class)->create();

        $this->get('api/posts')
        ->assertJsonFragment([
            'id' => $post->id,
            'title' => $post->title,
        ]);
    }
}