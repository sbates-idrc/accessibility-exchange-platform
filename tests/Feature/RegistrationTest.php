<?php

use App\Models\Engagement;
use App\Models\Invitation;
use App\Models\RegulatedOrganization;
use App\Models\User;

test('registration screen can be rendered', function () {
    $response = $this->get(localized_route('register'));

    $response->assertOk();
});

test('new users can register', function () {
    User::factory()->create(['email' => 'me@here.com']);

    $response = $this->from(localized_route('register', ['step' => 1]))
        ->post(localized_route('register-languages'), [
            'locale' => 'en',
        ]);
    $response->assertRedirect(localized_route('register', ['step' => 2]));
    $response->assertSessionHas('locale', 'en');

    $response = $this->from(localized_route('register', ['step' => 2]))
        ->withSession([
            'locale' => 'en',
        ])
        ->post(localized_route('register-context'), [
            'context' => 'individual',
        ]);
    $response->assertRedirect(localized_route('register', ['step' => 3]));
    $response->assertSessionHas('context', 'individual');
    $response->assertSessionHas('isNewOrganizationContext', false);

    $response = $this->from(localized_route('register', ['step' => 3]))
        ->withSession([
            'locale' => 'en',
            'context' => 'individual',
        ])
        ->post(localized_route('register-details'), [
            'name' => 'Test User',
            'email' => 'me@here.com',
        ]);

    $response->assertSessionHasErrors(['email']);
    $response->assertRedirect(localized_route('register', ['step' => 3]));

    $response = $this->from(localized_route('register', ['step' => 3]))
        ->withSession([
            'locale' => 'en',
            'context' => 'individual',
        ])
        ->post(localized_route('register-details'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    $response->assertRedirect(localized_route('register', ['step' => 4]));
    $response->assertSessionHas('name', 'Test User');
    $response->assertSessionHas('email', 'test@example.com');

    $response = $this->withSession([
        'locale' => 'en',
        'name' => 'Test User',
        'email' => 'test@example.com',
        'context' => 'individual',
    ])->post(localized_route('register-store'), [
        'password' => 'correctHorse-batteryStaple7',
        'password_confirmation' => 'correctHorse-batteryStaple7',
        'accepted_terms_of_service' => true,
        'accepted_privacy_policy' => true,
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(localized_route('users.show-introduction'));
});

test('new users can register - organization', function () {
    User::factory()->create(['email' => 'me@here.com']);

    $response = $this->from(localized_route('register', ['step' => 1]))
        ->post(localized_route('register-languages'), [
            'locale' => 'en',
        ]);
    $response->assertRedirect(localized_route('register', ['step' => 2]));
    $response->assertSessionHas('locale', 'en');

    $response = $this->from(localized_route('register', ['step' => 2]))
        ->withSession([
            'locale' => 'en',
        ])
        ->post(localized_route('register-context'), [
            'context' => 'organization',
        ]);
    $response->assertRedirect(localized_route('register', ['step' => 3]));
    $response->assertSessionHas('context', 'organization');
    $response->assertSessionHas('isNewOrganizationContext', true);

    $response = $this->from(localized_route('register', ['step' => 3]))
        ->withSession([
            'locale' => 'en',
            'context' => 'organization',
        ])
        ->post(localized_route('register-details'), [
            'name' => 'Test User',
            'email' => 'me@here.com',
        ]);

    $response->assertSessionHasErrors(['email']);
    $response->assertRedirect(localized_route('register', ['step' => 3]));

    $response = $this->from(localized_route('register', ['step' => 3]))
        ->withSession([
            'locale' => 'en',
            'context' => 'organization',
        ])
        ->post(localized_route('register-details'), [
            'name' => 'Test User',
            'email' => 'test-org@example.com',
        ]);

    $response->assertRedirect(localized_route('register', ['step' => 4]));
    $response->assertSessionHas('name', 'Test User');
    $response->assertSessionHas('email', 'test-org@example.com');

    $response = $this->withSession([
        'locale' => 'en',
        'name' => 'Test User',
        'email' => 'test@example.com',
        'context' => 'organization',
    ])->post(localized_route('register-store'), [
        'password' => 'correctHorse-batteryStaple7',
        'password_confirmation' => 'correctHorse-batteryStaple7',
        'accepted_terms_of_service' => true,
        'accepted_privacy_policy' => true,
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(localized_route('users.show-introduction'));
});

test('new users can not register without valid context', function () {
    $response = $this->from(localized_route('register', ['step' => 1]))
        ->post(localized_route('register-context'), [
            'context' => 'superadmin',
        ]);
    $response->assertRedirect(localized_route('register', ['step' => 1]));
    $response->assertSessionHasErrors();
});

test('users can register via invitation to (regulated) organization', function () {
    $regulatedOrganization = RegulatedOrganization::factory()->create();
    $invitation = Invitation::factory()->create([
        'invitationable_id' => $regulatedOrganization->id,
        'invitationable_type' => get_class($regulatedOrganization),
        'email' => 'test@example.com',
    ]);

    $response = $this->get(localized_route('register', [
        'context' => 'regulated-organization',
        'invitation' => 1,
        'email' => 'test@example.com',
    ]));

    $response->assertSee('<input name="context" type="hidden" value="regulated-organization" />', false);
    $response->assertSee('<input name="invitation" type="hidden" value="1" />', false);
    $response->assertSee('<input name="email" type="hidden" value="test@example.com" />', false);

    $response = $this->post(localized_route('register-languages'), [
        'locale' => 'en',
        'context' => 'regulated-organization',
        'invitation' => 1,
        'email' => 'test@example.com',
    ]);

    $response->assertSessionHas('context', 'regulated-organization');
    $response->assertSessionHas('isNewOrganizationContext', false);
    $response->assertSessionHas('invitation', '1');
    $response->assertSessionHas('email', 'test@example.com');

    $response = $this->withSession([
        'locale' => 'en',
        'name' => 'Test User',
        'email' => 'test@example.com',
        'context' => 'regulated-organization',
        'invitation' => 1,
    ])->post(localized_route('register-store'), [
        'password' => 'correctHorse-batteryStaple7',
        'password_confirmation' => 'correctHorse-batteryStaple7',
        'accepted_terms_of_service' => true,
        'accepted_privacy_policy' => true,
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(localized_route('users.show-introduction'));

    $user = Auth::user();

    expect($user->extra_attributes->invitation)->toEqual(1);

    expect($user->teamInvitation()->id)->toEqual($invitation->id);

    $user->update(['finished_introduction' => 1]);
    $user = $user->fresh();

    $response = $this->actingAs($user)->get(localized_route('dashboard'));
    $response->assertSee('Invitation');
});

test('users can register via invitation to engagement', function () {
    $engagement = Engagement::factory()->create();
    $invitation = Invitation::factory()->create([
        'invitationable_id' => $engagement->id,
        'invitationable_type' => get_class($engagement),
        'email' => 'test@example.com',
        'role' => 'participant',
    ]);

    $response = $this->get(localized_route('register', [
        'context' => 'individual',
        'role' => 'participant',
        'invitation' => 1,
        'email' => 'test@example.com',
    ]));

    $response->assertSee('<input name="context" type="hidden" value="individual" />', false);
    $response->assertSee('<input name="invitation" type="hidden" value="1" />', false);
    $response->assertSee('<input name="role" type="hidden" value="participant" />', false);
    $response->assertSee('<input name="email" type="hidden" value="test@example.com" />', false);

    $response = $this->post(localized_route('register-languages'), [
        'locale' => 'en',
        'context' => 'individual',
        'invitation' => 1,
        'role' => 'participant',
        'email' => 'test@example.com',
    ]);

    $response->assertSessionHas('context', 'individual');
    $response->assertSessionHas('invitation', '1');
    $response->assertSessionHas('invited_role', 'participant');
    $response->assertSessionHas('email', 'test@example.com');

    $response = $this->withSession([
        'locale' => 'en',
        'name' => 'Test User',
        'email' => 'test@example.com',
        'context' => 'individual',
        'invitation' => 1,
        'invited_role' => 'participant',
    ])->post(localized_route('register-store'), [
        'password' => 'correctHorse-batteryStaple7',
        'password_confirmation' => 'correctHorse-batteryStaple7',
        'accepted_terms_of_service' => true,
        'accepted_privacy_policy' => true,
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(localized_route('users.show-introduction'));

    $user = Auth::user();

    expect($user->extra_attributes->invitation)->toEqual(1);
    expect($user->extra_attributes->invited_role)->toEqual('participant');

    expect($user->participantInvitations()->pluck('id'))->toContain($invitation->id);

    $user = $user->fresh();

    expect($user->individual->roles)->toContain('participant');

    $response = $this->actingAs($user)->get(localized_route('individuals.show-role-edit'));
    $response->assertSee('<input x-model="roles" type="checkbox" name="roles[]" id="roles-participant" value="participant" aria-describedby="roles-participant-hint" checked  />', false);
});
