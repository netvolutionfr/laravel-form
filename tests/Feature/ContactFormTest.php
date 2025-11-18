<?php

use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

test('le formulaire de contact est accessible', function (): void {
    get(route('contact.create'))->assertOk()->assertSeeText('Contact');
});

test('les champs sont obligatoires', function (): void {
    post(route('contact.store'), [])->assertSessionHasErrors([
        'name',
        'email',
        'message',
    ]);
});

test('le formulaire accepte des données valides', function (): void {
    post(route('contact.store'), [
        'name' => 'Marie Dupont',
        'email' => 'marie@example.com',
        'message' => 'Bonjour, ceci est un premier message de contact.',
    ])->assertSessionHasNoErrors()->assertSessionHas('status');

    assertDatabaseHas('contact_messages', [
        'name' => 'Marie Dupont',
        'email' => 'marie@example.com',
    ]);
});

test('la page des messages affiche toutes les demandes', function (): void {
    $messages = ContactMessage::factory()->count(2)->create();

    $response = get(route('contact.messages'));

    $response->assertOk()->assertSeeText('Messages reçus');

    $messages->each(function (ContactMessage $message) use ($response): void {
        $response->assertSeeText($message->name);
        $response->assertSeeText($message->email);
    });
});
