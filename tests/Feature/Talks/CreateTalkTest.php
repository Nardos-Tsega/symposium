<?php

use App\Models\Talk;
use App\Models\User;

it('allows authenticated user to create talks', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('/talks', [
            'title' => 'My First Talk',
            'length' => '30',
            'type' => 'Keynote',
            'description' => 'This is my first talk',
        ]);

    expect(Talk::where('title', 'My First Talk')->exists())->toBeTrue();
    $response->assertRedirect('/talks');
});

it('prevents unauthenticated user from creating a talk', function () {

    $response = $this
        ->post('/talks', [
            'title' => 'My Second Talk',
            'length' => '30',
            'type' => 'Keynote',
            'description' => 'This is my first talk',
        ]);

    $response->assertRedirect('/login');
    expect(Talk::where('title', 'My Second Talk')->exists())->toBeFalse();
});

it('shows create page', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('talks.create'));

    $response->assertOk()
        ->assertViewIs('talks.create');
});
