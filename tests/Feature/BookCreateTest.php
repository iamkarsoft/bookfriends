<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;


uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
});


test('have access to create book page', function () {

    $this->actingAs($this->user)
        ->get('/books')
        ->assertSeeText('Create Books');
});
