<x-app-layout>
    <x-slot name="title">{{ __('Delete account') }}</x-slot>
    <x-slot name="header">
        <ol class="breadcrumbs" role="list">
            <li><a href="{{ localized_route('dashboard') }}">{{ __('My dashboard') }}</a></li>
            <li><a href="{{ localized_route('settings.show') }}">{{ __('Settings') }}</a></li>
        </ol>
        <h1>
            {{ __('Delete your account') }}
        </h1>
    </x-slot>

    @if ($user->isOnlyAdministratorOfOrganization() || $user->isOnlyAdministratorOfRegulatedOrganization())
        <div role="alert">
            <x-hearth-alert type="warning">
                {{ __('You cannot delete your account because you are the only administrator of your organization. Please make another member from your organization an administrator first.') }}
            </x-hearth-alert>
        </div>
    @endif
    <h2>{{ __('Are you sure you want to delete your account?') }}</h2>
    <p>{{ __('If you delete your account:') }}</p>
    @if ($user->context === 'individual')
        <ul>
            <li>
                <p>{{ __('you will no longer be able to access information about the :count engagements you are participating in', ['count' => 0]) }}
                </p>
            </li>
            <li>
                <p>{{ __('you will no longer be able to access information about the :count projects you are contracted for', ['count' => 0]) }}
                </p>
            </li>
            <li>
                <p>{{ __('you will no longer be able to access your :count training certificates', ['count' => 0]) }}
                </p>
            </li>
            <li>
                <p>{{ __('your public profile will be removed from the platform') }}</p>
            </li>
            <li>
                <p>{{ __('you will no longer be matched to any projects and engagements') }}</p>
            </li>
        </ul>
    @elseif($user->context === 'organization')
        <ul>
            <li>
                <p>{{ __('you will no longer be able to access information about the :count projects you are contracted for', ['count' => 0]) }}
                </p>
            </li>
            <li>
                <p>{{ __('you will no longer be able to access information about the :count projects you are participating in', ['count' => 0]) }}
                </p>
            </li>
            <li>
                <p>{{ __('you will no longer be able to manage the :count projects you are running', ['count' => 0]) }}
                </p>
            </li>
            <li>
                <p>{{ __('you will no longer be able to access your :count training certificates', ['count' => 0]) }}
                </p>
            </li>
            <li>
                <p>{{ __('your public profile will be removed from the platform') }}</p>
            </li>
        </ul>
    @elseif($user->context === 'regulated-organization')
        <ul>
            <li>
                <p>{{ __('you will no longer be able to manage the :count projects you are running', ['count' => 0]) }}
                </p>
            </li>
            <li>
                <p>{{ __('you will no longer be able to access your :count training certificates', ['count' => 0]) }}
                </p>
            </li>
        </ul>
    @endif

    @if (!($user->isOnlyAdministratorOfOrganization() || $user->isOnlyAdministratorOfRegulatedOrganization()))
        <div role="alert">
            <x-hearth-alert type="warning">
                {{ __('Once you delete your account, you will not be able to recover it.') }}
            </x-hearth-alert>
        </div>
    @endif

    <!-- Form Validation Errors -->
    @include('partials.validation-errors')
    <form class="@if ($user->isOnlyAdministratorOfOrganization() || $user->isOnlyAdministratorOfRegulatedOrganization()) disabled @endif" action="{{ localized_route('users.destroy') }}"
        method="post" novalidate>
        @csrf
        @method('delete')

        <div class="field @error('current_password', 'destroyAccount') field--error @enderror">
            <x-hearth-label for="current_password" :value="__('Confirm by typing your current password')" />
            <x-password-input name="current_password"
                disabled="{{ $user->isOnlyAdministratorOfOrganization() || $user->isOnlyAdministratorOfRegulatedOrganization() }}" />
            <x-hearth-error for="current_password" bag="destroyAccount" />
        </div>

        <button
            disabled="{{ $user->isOnlyAdministratorOfOrganization() || $user->isOnlyAdministratorOfRegulatedOrganization() }}">
            {{ __('hearth::user.action_delete_account') }}
        </button>
    </form>
</x-app-layout>
