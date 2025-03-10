<form action="{{ localized_route('individuals.update-interests', $individual) }}" method="POST"
    enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')

    <div class="with-sidebar with-sidebar:last">
        @include('individuals.partials.progress')

        <div class="stack">
            <h2>
                {{ __('Step :current of :total', ['current' => request()->get('step') ?? 1, 'total' => $individual->isConnector() ? 5 : 4]) }}<br />
                {{ __('Interests') }}
            </h2>
            <x-interpretation class="interpretation--start" name="{{ __('Interests', [], 'en') }}" />
            <hr class="divider--thick">
            <fieldset class="field @error('sectors') field--error @enderror">
                <legend>
                    {{ __('What types of Regulated Organization are you interested consulting with on accessibility planning and design?') . ' ' . __('(optional)') }}
                </legend>
                <x-interpretation class="interpretation--start"
                    name="{{ __('What types of Regulated Organization are you interested consulting with on accessibility planning and design?', [], 'en') }}"
                    namespace="regulated_organization_sectors_you_are_interested_working-optional" />
                <x-hearth-checkboxes name="sectors" :options="$sectors" :checked="old('sectors', $individual->sectorsOfInterest->pluck('id')->toArray())" />
                <x-hearth-error for="sectors" />
            </fieldset>

            <fieldset class="field @error('impacts') field--error @enderror">
                <legend>
                    {{ __('What areas of accessibility planning and design are you most interested in consulting on?') . ' ' . __('(optional)') }}
                </legend>
                <x-hearth-hint for="impacts">
                    {{ __('These are the seven areas listed within the Accessible Canada Act. Federally regulated organizations must work to improve their accessibility in all of these areas.') }}
                </x-hearth-hint>
                <x-interpretation class="interpretation--start"
                    name="{{ __('What areas of accessibility planning and design are you most interested in consulting on?', [], 'en') }}"
                    namespace="areas_of_accessible_canada_act_you_are_interested_working-optional" />
                <x-hearth-checkboxes name="impacts" :options="$impacts" :checked="old('impacts', $individual->impactsOfInterest->pluck('id')->toArray())" />
                <x-hearth-error for="impacts" />
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
                    <div>
                        <button name="save_and_next" value="1">{{ __('Save and next') }}</button>
                        <x-interpretation class="interpretation--start" name="{{ __('Save and next', [], 'en') }}"
                            namespace="save_next" />
                    </div>
                @else
                    <button class="secondary" name="save_and_previous"
                        value="1">{{ __('Save and previous') }}</button>
                    <button class="secondary" name="save" value="1">{{ __('Save') }}</button>
                    <button name="save_and_next" value="1">{{ __('Save and next') }}</button>
                @endif
            </p>
        </div>
    </div>
</form>
