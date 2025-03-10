<?php

use App\Models\Individual;

test('adding a translation succeeds for a valid translatable model', function () {
    $individual = Individual::factory()->create(['roles' => ['consultant']]);

    $response = $this->actingAs($individual->user)
        ->from(localized_route('individuals.edit', $individual))
        ->put(localized_route('translations.add'), [
            'translatable_type' => get_class($individual),
            'translatable_id' => $individual->id,
            'new_language' => 'asl',
        ]);

    $response->assertSessionHasNoErrors();
    $individual = $individual->fresh();

    expect(in_array('asl', $individual->languages))->toBeTrue();
});

test('removing a translation succeeds for a valid translatable model', function () {
    $individual = Individual::factory()->create(['roles' => ['consultant']]);

    $response = $this->actingAs($individual->user)
        ->from(localized_route('individuals.edit', $individual))
        ->put(localized_route('translations.destroy'), [
            'translatable_type' => get_class($individual),
            'translatable_id' => $individual->id,
            'language' => 'fr',
        ]);

    $response->assertSessionHasNoErrors();
    $individual = $individual->fresh();

    expect(in_array('fr', $individual->languages))->toBeFalse();
});
