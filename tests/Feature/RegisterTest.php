<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

it('shows the register page')->get('/auth/register')->assertSee('register');

it('has errors if details are not provided',)->post('/register')
    ->assertSessionHasErrors(['name', 'email', 'password']);


test('register', function () {
    post('/register', [
        'name' => 'Kofi Ramos',
        'email' => 'kofiramos@gmail.com',
        'password' => 'hellofresh'
    ])->assertRedirect('/');


    $this->assertDatabaseHas('users', [
        'name' => 'Kofi Ramos',
        'email' => 'kofiramos@gmail.com'
    ])->assertAuthenticated();
});
