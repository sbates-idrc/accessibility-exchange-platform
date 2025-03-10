<?php

namespace App\Http\Controllers;

use App\Enums\ContactPerson;
use App\Enums\EngagementFormat;
use App\Enums\MeetingType;
use App\Enums\NotificationChannel;
use App\Enums\NotificationMethod;
use App\Enums\OrganizationNotificationChannel;
use App\Enums\ProvinceOrTerritory;
use App\Enums\TeamRole;
use App\Enums\Theme;
use App\Http\Requests\UpdateAccessNeedsRequest;
use App\Http\Requests\UpdateAreasOfInterestRequest;
use App\Http\Requests\UpdateCommunicationAndConsultationPreferencesRequest;
use App\Http\Requests\UpdateLanguagePreferencesRequest;
use App\Http\Requests\UpdateNotificationPreferencesRequest;
use App\Http\Requests\UpdatePaymentInformationRequest;
use App\Http\Requests\UpdateWebsiteAccessibilityPreferencesRequest;
use App\Models\AccessSupport;
use App\Models\Engagement;
use App\Models\Impact;
use App\Models\PaymentType;
use App\Models\Sector;
use App\Traits\UserEmailVerification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Gate;
use Spatie\LaravelOptions\Options;

class SettingsController extends Controller
{
    use UserEmailVerification;

    public function __construct()
    {
        $this->middleware('localize')->only('editLanguagePreferences');
    }

    public function settings(): View
    {
        return view(
            'settings.show',
            [
                'user' => Auth::user(),
            ]
        );
    }

    public function editAccessNeeds(): View
    {
        Gate::allowIf(fn ($user) => $user->context === 'individual');

        $individual = Auth::user()->individual;

        return view('settings.access-needs', [
            'individual' => $individual,
            'generalAccessSupports' => Options::forModels(AccessSupport::where([
                ['in_person', true],
                ['virtual', true],
                ['documents', true],
                ['name->en', '!=', 'I would like to speak to someone to discuss additional access needs or concerns'],
            ]))->toArray(),
            'meetingAccessSupports' => Options::forModels(AccessSupport::where([
                ['in_person', true],
                ['virtual', true],
                ['documents', false],
            ]))->toArray(),
            'signLanguageInterpretation' => AccessSupport::where('name->en', 'Sign language interpretation')->first()->id,
            'spokenLanguageInterpretation' => AccessSupport::where('name->en', 'Spoken language interpretation')->first()->id,
            'followUpCallsOrEmails' => AccessSupport::where('name->en', 'Follow-up calls or emails')->first()->id,
            'bringMySupportPerson' => AccessSupport::where('name->en', 'Bring my support person')->first()->id,
            'inPersonAccessSupports' => Options::forModels(AccessSupport::where([
                ['in_person', true],
                ['virtual', false],
                ['documents', false],
            ]))->toArray(),
            'documentAccessSupports' => Options::forModels(AccessSupport::where([
                ['in_person', false],
                ['virtual', false],
                ['documents', true],
            ]))->toArray(),
            'signLanguageTranslation' => AccessSupport::where('name->en', 'Sign language translation')->first()->id,
            'writtenLanguageTranslation' => AccessSupport::where('name->en', 'Written language translation')->first()->id,
            'printedVersion' => AccessSupport::where('name->en', 'Printed version of engagement documents')->first()->id,
            'additionalNeedsOrConcerns' => AccessSupport::where('name->en', 'I would like to speak to someone to discuss additional access needs or concerns')->first(),
            'selectedAccessSupports' => $individual->accessSupports->pluck('id')->toArray(),
            'signedLanguages' => Options::forArray([
                'asl' => __('locales.asl'),
                'lsq' => __('locales.lsq'),
            ])->nullable(__('Choose a sign language…'))->toArray(),
            'spokenOrWrittenLanguages' => Options::forArray(get_available_languages(true, false))->nullable(__('Choose a language…'))->toArray(),
            'regions' => Options::forEnum(ProvinceOrTerritory::class)->nullable(__('Choose a province or territory…'))->toArray(),
            'guessedSpokenOrWrittenLanguage' => $individual->first_language && ! is_signed_language($individual->first_language) ? $individual->first_language : false,
            'guessedSignedLanguage' => $individual->first_language && is_signed_language($individual->first_language) ? $individual->first_language : false,
            'returnToEngagement' => Engagement::find(request()->input('engagement'))?->id,
        ]);
    }

    public function updateAccessNeeds(UpdateAccessNeedsRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $signLanguageInterpretation = AccessSupport::where('name->en', 'Sign language interpretation')->first()->id;
        $spokenLanguageInterpretation = AccessSupport::where('name->en', 'Spoken language interpretation')->first()->id;
        $signLanguageTranslation = AccessSupport::where('name->en', 'Sign language translation')->first()->id;
        $writtenLanguageTranslation = AccessSupport::where('name->en', 'Written language translation')->first()->id;
        $printedVersion = AccessSupport::where('name->en', 'Printed version of engagement documents')->first()->id;

        $individual = Auth::user()->individual;

        if (! isset($data['meeting_access_needs']) || (isset($data['meeting_access_needs']) && ! in_array($signLanguageInterpretation, $data['meeting_access_needs']))) {
            $data['signed_language_for_interpretation'] = null;
        }

        if (! isset($data['meeting_access_needs']) || (isset($data['meeting_access_needs']) && ! in_array($spokenLanguageInterpretation, $data['meeting_access_needs']))) {
            $data['spoken_language_for_interpretation'] = null;
        }

        if (! isset($data['document_access_needs']) || (isset($data['document_access_needs']) && ! in_array($signLanguageTranslation, $data['document_access_needs']))) {
            $data['signed_language_for_translation'] = null;
        }

        if (! isset($data['document_access_needs']) || (isset($data['document_access_needs']) && ! in_array($writtenLanguageTranslation, $data['document_access_needs']))) {
            $data['written_language_for_translation'] = null;
        }

        if (! isset($data['document_access_needs']) || (isset($data['document_access_needs']) && ! in_array($printedVersion, $data['document_access_needs']))) {
            $data['street_address'] = null;
            $data['unit_apartment_suite'] = null;
            $data['postal_code'] = null;
        }

        $individual->fill($data);

        $individual->save();

        $access_supports = array_merge(
            $data['general_access_needs'] ?? [],
            $data['meeting_access_needs'] ?? [],
            $data['in_person_access_needs'] ?? [],
            $data['document_access_needs'] ?? []
        );

        if (isset($data['additional_needs_or_concerns'])) {
            $access_supports[] = $data['additional_needs_or_concerns'];
        }

        $individual->accessSupports()->sync($access_supports);

        flash(__('Your access needs have been updated.'), 'success');

        if (isset($data['return_to_engagement'])) {
            return redirect(localized_route('engagements.confirm-access-needs', ['engagement' => $data['return_to_engagement']]));
        }

        return redirect(localized_route('settings.edit-access-needs'));
    }

    public function editCommunicationAndConsultationPreferences(): View
    {
        Gate::allowIf(fn ($user) => $user->context === 'individual');

        $individual = Auth::user()->individual;

        return view('settings.communication-and-consultation-preferences', [
            'individual' => $individual,
            'contactPeople' => Options::forEnum(ContactPerson::class)->toArray(),
            'meetingTypes' => Options::forEnum(MeetingType::class)->toArray(),
            'consultingMethods' => Options::forEnum(EngagementFormat::class)->toArray(),
        ]);
    }

    public function updateCommunicationAndConsultationPreferences(UpdateCommunicationAndConsultationPreferencesRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($data['preferred_contact_person'] === 'me') {
            $data['support_person_name'] = '';
            $data['support_person_email'] = '';
            $data['support_person_phone'] = '';
            $data['support_person_vrs'] = 0;
        }

        if ($data['preferred_contact_person'] === 'support-person') {
            $data['phone'] = '';
            $data['vrs'] = 0;
        }

        $user = Auth::user();

        $individual = $user->individual;

        if (
            isset($data['email']) && $data['email'] !== $user->email && $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $data['email']);
        }

        $user->fill($data);

        $user->save();

        $individual->fill($data);

        $individual->save();

        flash(__('Your communication and consultation preferences have been updated.'), 'success');

        return redirect(localized_route('settings.edit-communication-and-consultation-preferences'));
    }

    public function editLanguagePreferences(): View
    {
        $user = Auth::user();
        $individual = $user->individual;

        $workingLanguages = [
            $user->locale,
        ];

        return view('settings.language-preferences', [
            'user' => $user,
            'individual' => $individual,
            'languages' => Options::forArray(get_available_languages(true))->nullable(__('Choose a language…'))->toArray(),
            'workingLanguages' => $workingLanguages,
        ]);
    }

    public function updateLanguagePreferences(UpdateLanguagePreferencesRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = Auth::user();

        $user->fill($data);

        $user->save();

        if ($individual = $user->individual) {
            $individual->fill($data);

            $individual->save();
        }

        Cookie::queue('locale', $data['locale']);

        flash(__('Your language preferences have been updated.'), 'success');

        return redirect(localized_route('settings.edit-language-preferences'));
    }

    public function editPaymentInformation(): View
    {
        Gate::allowIf(fn ($user) => $user->context === 'individual');

        return view('settings.payment-information', [
            'individual' => Auth::user()->individual,
            'paymentTypes' => Options::forModels(PaymentType::class)->toArray(),
        ]);
    }

    public function updatePaymentInformation(UpdatePaymentInformationRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (! $request->has('other') || $data['other'] == 0) {
            $data['other_payment_type'] = '';
        }

        $individual = Auth::user()->individual;

        $individual->fill($data);

        $individual->save();

        $individual->paymentTypes()->sync($data['payment_types'] ?? []);

        flash(__('Your payment information has been updated.'), 'success');

        return redirect(localized_route('settings.edit-payment-information'));
    }

    public function editAreasOfInterest(): View
    {
        Gate::allowIf(fn ($user) => $user->context === 'individual');

        return view('settings.areas-of-interest', [
            'individual' => Auth::user()->individual,
            'sectors' => Options::forModels(Sector::class)->toArray(),
            'impacts' => Options::forModels(Impact::class)->toArray(),
        ]);
    }

    public function updateAreasOfInterest(UpdateAreasOfInterestRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $individual = Auth::user()->individual;

        $individual->sectorsOfInterest()->sync($data['sectors'] ?? []);

        $individual->impactsOfInterest()->sync($data['impacts'] ?? []);

        flash(__('Your areas of interest have been updated.'), 'success');

        return redirect(localized_route('settings.edit-areas-of-interest'));
    }

    public function editWebsiteAccessibilityPreferences(): View
    {
        return view('settings.website-accessibility-preferences', [
            'user' => Auth::user(),
            'themes' => Options::forEnum(Theme::class)->toArray(),
        ]);
    }

    public function updateWebsiteAccessibilityPreferences(UpdateWebsiteAccessibilityPreferencesRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $data = $request->validated();

        $user->fill($data);
        $user->save();

        flash(__('Your website accessibility preferences have been updated.'), 'success');

        Cookie::queue('theme', $data['theme']);

        return redirect(localized_route('settings.edit-website-accessibility-preferences'));
    }

    public function editNotificationPreferences(): View
    {
        $user = Auth::user();

        Gate::allowIf(fn ($user) => $user->context === 'individual' || ($user->context === 'organization' && $user->organization && $user->isAdministratorOf($user->organization)));

        $projectNotificationTypes = config('lived-experience-notifications') ? ['lived-experience' => __('Projects that are looking for someone with my lived experience'), 'of-interest' => __('Projects by organizations that I have saved on my notification list')] : ['of-interest' => __('Projects by organizations that I have saved on my notification list')];
        $engagementNotificationTypes = config('lived-experience-notifications') ? ['lived-experience' => __('Engagements that are looking for someone with my lived experience'),  'of-interest' => __('Engagements by organizations that I have saved on my notification list')] : ['of-interest' => __('Engagements by organizations that I have saved on my notification list')];

        return view('settings.notifications', [
            'user' => $user,
            'notificationMethods' => Options::forEnum(NotificationMethod::class)->nullable(__('Choose a notification method…'))->toArray(),
            'emailNotificationMethods' => Options::forEnum(NotificationMethod::class)->reject(fn (NotificationMethod $method) => $method === NotificationMethod::Phone || $method === NotificationMethod::Text)->nullable(__('Choose a notification method…'))->toArray(),
            'phoneNotificationMethods' => Options::forEnum(NotificationMethod::class)->reject(fn (NotificationMethod $method) => $method === NotificationMethod::Email)->nullable(__('Choose a notification method…'))->toArray(),
            'notificationChannels' => Options::forEnum(NotificationChannel::class)->toArray(),
            'organizationNotificationChannels' => Options::forEnum(OrganizationNotificationChannel::class)->toArray(),
            'projectNotificationTypes' => Options::forArray($projectNotificationTypes)->toArray(),
            'engagementNotificationTypes' => Options::forArray($engagementNotificationTypes)->toArray(),
        ]);
    }

    public function updateNotificationPreferences(UpdateNotificationPreferencesRequest $request): RedirectResponse
    {
        $user = Auth::user();

        Gate::allowIf(fn ($user) => $user->context === 'individual' || ($user->context === 'organization' && $user->organization && $user->isAdministratorOf($user->organization)));

        $data = $request->validated();

        if ($user->context === 'individual') {
            $user->notification_settings = $data['notification_settings'] ?? [];
            unset($data['notification_settings']);
            $user->fill($data);
            $user->save();
        }

        if ($user->context === 'organization' && $user->organization) {
            $organization = $user->organization;
            $organization->notification_settings = $data['notification_settings'] ?? [];
            unset($data['notification_settings']);
            $organization->fill($data);
            $organization->save();
        }

        flash(__('Your notification preferences have been updated.'), 'success');

        return redirect(localized_route('settings.edit-notification-preferences'));
    }

    public function editRolesAndPermissions(): View
    {
        $user = Auth::user();

        $this->authorize('editRolesAndPermissions', $user);

        $membershipable = null;

        if ($user->context === 'regulated-organization') {
            $membershipable = $user->regulatedOrganization ?? null;
        } elseif ($user->context === 'organization') {
            $membershipable = $user->organization ?? null;
        }

        return view('settings.roles-and-permissions', [
            'user' => $user,
            'roles' => Options::forEnum(TeamRole::class)->toArray(),
            'membershipable' => $membershipable,
        ]);
    }

    public function inviteToInvitationable(): View|RedirectResponse
    {
        $user = Auth::user();

        $this->authorize('editRolesAndPermissions', $user);

        $invitationable = null;

        if ($user->context === 'regulated-organization') {
            $invitationable = $user->regulatedOrganization ?? null;
        } elseif ($user->context === 'organization') {
            $invitationable = $user->organization ?? null;
        }

        if ($invitationable) {
            return view('settings.roles-and-permissions.invite', [
                'user' => $user,
                'invitationable' => $invitationable,
                'roles' => Options::forEnum(TeamRole::class)->toArray(),
            ]);
        }

        return redirect(localized_route('settings.edit-roles-and-permissions'));
    }

    public function editAccountDetails(): View
    {
        return view('settings.account-details', ['user' => Auth::user()]);
    }

    public function deleteAccount(): View
    {
        return view('settings.delete-account', ['user' => Auth::user()]);
    }
}
