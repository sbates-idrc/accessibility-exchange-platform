<form action="{{ localized_route('individuals.update-communication-and-consultation-preferences', $individual) }}"
    method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')
    <div class="with-sidebar with-sidebar:last">
        @include('individuals.partials.progress')

        <div class="stack">
            <h2>
                {{ __('Step :current of :total', ['current' => request()->get('step') ?? 1, 'total' => $individual->isConnector() ? 5 : 4]) }}<br />
                {{ __('Communication and consultation preferences') }}
            </h2>
            <x-interpretation class="interpretation--start"
                name="{{ __('Communication and consultation preferences', [], 'en') }}" />

            <hr class="divider--thick">

            <div class="stack" x-data="{ contactPerson: '{{ old('preferred_contact_person', $individual->user->preferred_contact_person ?? 'me') }}' }">
                <fieldset>
                    <legend>{{ __('Contact person') . ' ' . __('(required)') }}</legend>
                    <x-interpretation class="interpretation--start mt-0" name="{{ __('Contact person', [], 'en') }}"
                        namespace="contact_person-required" />

                    <x-hearth-radio-buttons name="preferred_contact_person" :options="$contactPeople" :checked="old('preferred_contact_person', $individual->user->preferred_contact_person ?? 'me')"
                        x-model="contactPerson" />
                </fieldset>

                <fieldset x-show="contactPerson == 'me'">
                    <legend>{{ __('Contact information') }}</legend>
                    <x-interpretation class="interpretation--start mt-0"
                        name="{{ __('Contact information', [], 'en') }}" namespace="contact_information" />
                    <div class="field @error('email') field-error @enderror mt-10">
                        <x-hearth-label for="email" :value="__('My email') . ' ' . __('(required)')" />
                        <x-hearth-hint for="email">
                            {{ __('This is also the email you use to log into this account.') }}
                        </x-hearth-hint>
                        <x-interpretation class="interpretation--start" name="{{ __('My email', [], 'en') }}"
                            namespace="my_email-required" />
                        <x-hearth-input name="email" type="email" :value="old(
                            'email',
                            !empty($individual->user->email) ? $individual->user->email : $individual->user->email,
                        )" />
                        <x-hearth-error for="email" />
                    </div>
                    <div class="field @error('phone') field-error @enderror mt-10">
                        <x-hearth-label for="phone" :value="__('My phone number')" />
                        <x-interpretation class="interpretation--start" name="{{ __('My phone number', [], 'en') }}" />
                        <x-hearth-input name="phone" type="tel" :value="old(
                            'phone',
                            $individual->user->phone ? $individual->user->phone->formatForCountry('CA') : '',
                        )" />
                        <x-hearth-error for="phone" />
                    </div>

                    <div class="field @error('vrs') field-error @enderror">
                        <x-hearth-checkbox name="vrs" :checked="old('vrs', $individual->user->vrs) ?? false" />
                        <x-hearth-label for="vrs" :value="__('I require Video Relay Service (VRS) for phone calls')" />
                        <x-interpretation class="interpretation--start"
                            name="{{ __('I require Video Relay Service (VRS) for phone calls', [], 'en') }}" />
                        <x-hearth-error for="vrs" />
                    </div>
                </fieldset>

                <fieldset x-show="contactPerson == 'support-person'">
                    <legend>{{ __('Contact information') }}</legend>
                    <x-interpretation class="interpretation--start" name="{{ __('Contact information', [], 'en') }}"
                        namespace="contact_information" />
                    <div class="field @error('support_person_name') field-error @enderror">
                        <x-hearth-label for="support_person_name" :value="__('My support person’s name') . ' ' . __('(required)')" />
                        <x-interpretation class="interpretation--start"
                            name="{{ __('My support person’s name', [], 'en') }}"
                            namespace="my_support_person_name-required" />
                        <x-hearth-hint for="support_person_name">{{ __('This does not have to be their legal name.') }}
                        </x-hearth-hint>
                        <x-hearth-input id="support_person_name" name="support_person_name" :value="old('support_person_name', $individual->user->support_person_name)" required
                            hinted />
                        <x-hearth-error for="support_person_name" field="support_person_name" />
                    </div>
                    <div class="field @error('support_person_email') field-error @enderror">
                        <x-hearth-label for="support_person_email" :value="__('My support person’s email') . ' ' . __('(required)')" />
                        <x-interpretation class="interpretation--start"
                            name="{{ __('My support person’s email', [], 'en') }}"
                            namespace="my_support_person_email-required" />
                        <x-hearth-input name="support_person_email" type="email" :value="old('support_person_email', $individual->user->support_person_email)" />
                        <x-hearth-error for="support_person_email" />
                    </div>
                    <div class="field @error('support_person_phone') field-error @enderror">
                        <x-hearth-label for="support_person_phone" :value="__('My support person’s phone number')" />
                        <x-interpretation class="interpretation--start"
                            name="{{ __('My support person’s phone number', [], 'en') }}" />
                        <x-hearth-input name="support_person_phone" type="tel" :value="old(
                            'support_person_phone',
                            $individual->user->support_person_phone
                                ? $individual->user->support_person_phone->formatForCountry('CA')
                                : '',
                        )" />
                        <x-hearth-error for="support_person_phone" />
                    </div>

                    <div class="field @error('support_person_vrs') field-error @enderror">
                        <x-hearth-checkbox name="support_person_vrs" :checked="old('support_person_vrs', $individual->user->support_person_vrs) ?? false" />
                        <x-hearth-label for="support_person_vrs" :value="__('My support person requires Video Relay Service (VRS) for phone calls')" />
                        <x-interpretation class="interpretation--start"
                            name="{{ __('My support person requires Video Relay Service (VRS) for phone calls', [], 'en') }}" />
                        <x-hearth-error for="support_person_vrs" />
                    </div>
                </fieldset>

                <div class="field @error('preferred_contact_method') field-error @enderror">
                    <x-hearth-label for="preferred_contact_method">
                        {{ __('Preferred contact method') . ' ' . __('(required)') }}
                    </x-hearth-label>
                    <x-interpretation class="interpretation--start"
                        name="{{ __('Preferred contact method', [], 'en') }}"
                        namespace="preferred_contact_method-required" />
                    <x-hearth-select name="preferred_contact_method" :options="Spatie\LaravelOptions\Options::forArray([
                        'email' => __('Email'),
                        'phone' => __('Phone'),
                    ])->toArray()" :selected="old('preferred_contact_method', $individual->user->preferred_contact_method ?? 'email')" />
                    <x-hearth-error for="preferred_contact_method" />
                </div>
            </div>

            <fieldset class="@error('meeting_types') field--error @enderror">
                <legend>{{ __('What types of meetings are you able to attend?') . ' ' . __('(required)') }}</legend>
                <x-interpretation class="interpretation--start mt-0"
                    name="{{ __('What types of meetings are you able to attend?', [], 'en') }}"
                    namespace="meeting_types_you_can_attend-required" />
                <x-hearth-checkboxes name="meeting_types" :options="$meetingTypes" :checked="old('meeting_types', $individual->meeting_types ?? [])" />
                <x-hearth-error for="meeting_types" />
            </fieldset>

            <hr class="divider--thick">

            <p class="flex flex-wrap gap-7">
                @if (locale() === 'asl' || locale() === 'lsq')
                    <div>
                        <button class="secondary" name="save_and_previous"
                            value="1">{{ __('Save and previous') }}</button>
                        <x-interpretation class="interpretation--start" name="{{ __('Save and previous', [], 'en') }}"
                            namespace="save_previous" />
                    </div>
                    <div>
                        <button class="secondary" name="save" value="1">{{ __('Save') }}</button>
                        <x-interpretation class="interpretation--start" name="{{ __('Save', [], 'en') }}"
                            namespace="save" />
                    </div>
                @else
                    <button class="secondary" name="save_and_previous"
                        value="1">{{ __('Save and previous') }}</button>
                    <button class="secondary" name="save" value="1">{{ __('Save') }}</button>
                @endif
            </p>
        </div>
    </div>
</form>
