<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

it('shows the register page')->get('/auth/register')->assertSee('register');

it('has errors if details are not provided',)->post('/register')
    ->assertSessionHasErrors(['name', 'email', 'password']);


it('register the user', function () {
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


it('register the user higher order')
    ->tap(function () {
        $this->post('/register', [
            'name' => 'Kofi Ramos',
            'email' => 'kofiramos@gmail.com',
            'password' => 'hellofresh'
        ])
            ->assertRedirect('/');
    })->assertDatabaseHas('users', [
        'name' => 'Kofi Ramos',
        'email' => 'kofiramos@gmail.com'
    ])->assertAuthenticated();
