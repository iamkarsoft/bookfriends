<?php

use App\Models\User;
use function Pest\Laravel\get;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
it('redirect an authenticated user', function () {

    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/auth/login')
        ->assertStatus(302);

    // $this->actingAs($user)


});
