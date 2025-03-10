<?php

use App\Http\Livewire\LanguagePicker;
use Spatie\LaravelOptions\Options;

test('language can be added', function () {
    $this->livewire(LanguagePicker::class, ['languages' => ['en'], 'availableLanguages' => Options::forArray(['en', 'fr', 'es', 'de', 'pt'])->toArray()])
        ->call('addLanguage')
        ->assertSet('languages', ['en', '']);
});

test('no more than five languages can be added', function () {
    $this->livewire(LanguagePicker::class, ['languages' => ['en', 'fr', 'es', 'de', 'pt'], 'availableLanguages' => Options::forArray(['en', 'fr', 'es', 'de', 'pt'])->toArray()])
        ->call('addLanguage')
        ->assertCount('languages', 5);
});

test('language can be removed', function () {
    $this->livewire(LanguagePicker::class, ['languages' => ['en'], 'availableLanguages' => Options::forArray(['en', 'fr', 'es', 'de', 'pt'])->toArray()])
        ->call('removeLanguage', 0)
        ->assertSet('languages', []);
});
