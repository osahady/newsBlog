<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
  
    public function testHomePageIsWorkingCorrectly()
    {
        $response = $this->get('/');
        $response->assertSeeText('Home');
        $response->assertStatus(200);
    }

    public function testContactPageWorkingCorrectly()
    {
        $response = $this->get('/contact');

        $response->assertSeeText('This is a contact page!');
    }
}
