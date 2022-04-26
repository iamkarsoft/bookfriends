<?php

it('only allows authenticated users to store book')
    ->post('/books')
    ->assertStatus(302);
