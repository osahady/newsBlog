<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\BlogPost;
class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testWhenThereIsNoPost()
    {
        $response = $this->get('/posts');

        $response->assertSeeText('There is no post. . .');
    }

    public function testInsertingOneBlogPost()
    {
        $post = new BlogPost();
        $post->title = 'Erbeen';
        $post->content = 'Erbeen has had a lot of bombardment';
        $post->save();

        $response = $this->get('/posts');

        $response->assertSeeText('Erbeen');

    }
}
