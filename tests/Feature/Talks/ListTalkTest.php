<?php

use App\Models\Talk;
use App\Models\User;

it('allows user to view all talks', function () {
    $user = User::factory()
        ->has(Talk::factory()->count(3))
        ->create();

    $response = $this
        ->actingAs($user)
        ->get('/talks');

    $response->assertSee($user->talks->first()->title);
    $response->assertOk();
});

it('prevents user to view other users talks', function () {
    $user = User::factory()
        ->has(Talk::factory()->count(3))
        ->create();

    $othersTalk = Talk::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/talks');

    $response->assertDontSee($othersTalk->title);
    $response->assertOk();
});
