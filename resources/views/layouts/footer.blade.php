<footer class="darker" role="contentinfo">
    <div class="center center:wide">
        <div class="switcher">
            <div class="stack">
                <!-- Brand -->
                <a class="brand" href="{{ localized_route('welcome') }}" rel="home">
                    @if (locale() == 'en' || locale() == 'asl')
                        @svg('tae-logo-mono-en', ['class' => 'logo-footer'])
                    @elseif(locale() == 'fr' || locale() == 'lsq')
                        @svg('tae-logo-mono-fr', ['class' => 'logo-footer'])
                    @endif
                    <span class="visually-hidden">{{ __('app.name') }}</span>
                </a>
                <nav aria-label="{{ __('secondary') }}">
                    <ul class="stack" role="list">
                        <li><a href="{{ localized_route('welcome') }}">{{ __('About the Accessibility Exchange') }}</a>
                        </li>
                        {{-- TODO: Add glossary feature --}}
                        {{-- <li><a href="">{{ __('Glossary') }}</a></li> --}}
                        <li><a href="{{ localized_route('about.terms-of-service') }}">{{ __('Terms of Service') }}</a>
                        </li>
                        <li><a href="{{ localized_route('about.privacy-policy') }}">{{ __('Privacy Policy') }}</a></li>
                    </ul>
                </nav>
            </div>
            <div class="switcher grow:2">
                <div class="stack" id="contact" tabindex="-1">
                    <h2 id="footer-contact">{{ __('Contact') }}</h2>
                    <x-interpretation class="interpretation--start" name="{{ __('Contact', [], 'en') }}"
                        namespace="contact-footer" />
                    <address class="stack">
                        <h3>{{ __('Email') }}</h3>
                        <p><a href="mailto:{{ settings('email') }}">{{ settings('email') }}</a>
                        </p>
                        <h3>{{ safe_inlineMarkdown('Call or :!vrs', [
                            'vrs' =>
                                '<a href="https://srvcanadavrs.ca/en/resources/resource-centre/vrs-basics/register/" rel="external">' .
                                htmlentities(__('VRS')) .
                                '</a>',
                        ]) }}
                        </h3>
                        <p>{{ phone(settings('phone'), 'CA')->formatForCountry('CA') }}</p>
                        <h3>{{ __('Mailing Address') }}</h3>
                        {!! nl2br(htmlentities(settings('address'))) !!}
                    </address>
                </div>
                <nav class="stack" aria-labelledby="social">
                    <h2 id="social">{{ __('Social Media') }}</h2>
                    <ul class="stack" role="list">
                        <li><a href="{{ settings('linkedin') }}" rel="external">LinkedIn</a></li>
                        <li><a href="{{ settings('facebook') }}" rel="external">Facebook</a></li>
                        <li><a href="{{ settings('twitter') }}" rel="external">Twitter</a></li>
                        <li><a href="{{ settings('youtube') }}" rel="external">YouTube</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>
@livewireScripts()
@stack('livewireScripts')
@stack('infusionScripts')
