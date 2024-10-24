<?php

use App\Enums\TalkType;
use App\Models\Talk;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->talk = Talk::factory()->create([
        'user_id' => $this->user->id,
        'title' => 'Original Title',
        'length' => '40',
        'type' => TalkType::cases()[0]->value,
    ]);
});

describe('talk update', function () {
    it('shows edit for authorized user', function () {
        $response = $this
            ->actingAs($this->user)
            ->get(route('talks.edit', $this->talk));

        $response->assertOk()
            ->assertViewIs('talks.edit');
    });

    it('updates with valid data', function () {
        $updatedData = [
            'title' => 'Updated Title',
            'length' => '40',
            'type' => TalkType::cases()[0]->value,
        ];

        $response = $this
            ->actingAs($this->user)
            ->patch(route('talks.update', $this->talk), $updatedData);

        $response->assertRedirect(route('talks.show', $this->talk));

        $this->assertDatabaseHas('talks', [
            'id' => $this->talk->id,
            'title' => 'Updated Title',
        ]);

        $this->talk->refresh();

        expect($this->talk)
            ->title->toBe('Updated Title')
            ->type->toBe(TalkType::cases()[0]->value);
    });

});
