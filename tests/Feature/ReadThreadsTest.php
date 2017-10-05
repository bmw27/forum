<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadThreadsTest extends TestCase
{
    use RefreshDatabase;

    private $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    public function a_user_can_view_all_threads()
    {
        $response = $this->get('/threads');
        $response->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_view_a_single_thread()
    {
        $response = $this->get('/threads/' . $this->thread->id);
        $response->assertSee($this->thread->title);
    }
    
    /** @test */
    public function a_user_can_read_replied_associated_with_a_thread()
    {
        //
    }
}
