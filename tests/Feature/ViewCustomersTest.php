<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewCustomersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function viewCustomersTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}