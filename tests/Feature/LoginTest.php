<?php

use App\Models\User;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
it('redirect an authenticated user', function () {

    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/auth/login')
        ->assertStatus(302);
});


it('shows an error when details not provided')
    ->post('/login')
    ->assertSessionHasErrors(['email', 'password']);


it('logs the user in', function () {

    $user = User::factory()->create([
        'password' => bcrypt('hellofresh')
    ]);

    post('/login', [
        'email' => $user->email,
        'password' => 'hellofresh',
    ]);
    $this->assertDatabaseHas('users', [
        'email' => $user->email,
        'password' => $user->password,
    ])
        ->assertAuthenticated();
});
