<?php

namespace Database\Seeders;

use App\Enums\ProvinceOrTerritory;
use App\Models\Engagement;
use App\Models\Identity;
use App\Models\Impact;
use App\Models\Language;
use App\Models\Meeting;
use App\Models\Organization;
use App\Models\Project;
use App\Models\RegulatedOrganization;
use App\Models\Scopes\ReachableIdentityScope;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    public function run(): void
    {
        $individualsForTesting = [
            [
                'user' => [
                    'name' => 'Mostafa Ayhan',
                    'email' => 'ayhan@accessibilityexchange.ca',
                    'preferred_contact_person' => 'me',
                    'phone' => '4165064567',
                    'preferred_contact_method' => 'email',
                ],
                'constituentLanguages' => ['tr', 'ar', 'hi', 'fa'],
                'ethnoracial' => ['Middle Eastern'],
                'ageBrackets' => ['Working age adults (15–64)', 'Older people (65+)'],
                'genderIdentities' => [],
                'constituencies' => ['Refugees', 'Immigrants'],
                'indigenousIdentities' => [],
                'areaTypes' => ['Urban areas'],
                'disabilityTypes' => [],
                'livedExperiences' => [],
                'sectors' => ['Government of Canada', 'Federally Regulated private sector'],
                'impacts' => ['Built environment', 'Procurement'],
                'individualDetails' => [
                    'published_at' => now(),
                    'roles' => ['consultant', 'connector'],
                    'region' => 'AB',
                    'locality' => 'Edmonton',
                    'pronouns' => ['en' => 'he/him'],
                    'working_languages' => ['en', 'tr', 'ar'],
                    'social_links' => [
                        'linked_in' => 'https://www.linkedin.com',
                        'twitter' => 'https://twitter.com/',
                        'instagram' => 'https://www.instagram.com/',
                        'facebook' => 'https://www.facebook.com/',
                    ],
                    'consulting_services' => ['booking-providers', 'designing-consultation', 'writing-reports'],
                    'lived_experience' => [
                        'en' => 'Knows from lived experience as a person who has used a wheelchair for more than 2 decades how the built environment can either restrict or enable independence and fulfillment.',
                    ],
                    'skills_and_strengths' => [
                        'en' => 'Delivered extensive workshops and presentations in-person and virtually on the topic of accessible design and universal design and is an advocate for making our built environment more accessible.',
                    ],
                    'website_link' => 'https://www.Mysite.com',
                    'bio' => [
                        'en' => 'As a person with living experiences of mobility disabilities, I have advocated for a barrier free environment for the past two decades. have conducted accessibility audits of interior and exterior spaces; providing workshops on built environment accessibility, barrier free and universal design; performing policy audits; conducting needs assessments and other research; and preparing community report card on issues affecting people with disabilities.',
                    ],
                    'meeting_types' => ['in_person', 'web_conference', 'phone'],
                    'connection_lived_experience' => 'yes-all',
                ],
            ],
            [
                'user' => [
                    'name' => 'K Torres',
                    'email' => 'k@accessibilityexchange.ca',
                    'preferred_contact_person' => 'me',
                    'preferred_contact_method' => 'email',
                ],
                'constituentLanguages' => ['asl', 'lsq', 'en', 'fr'],
                'ethnoracial' => [],
                'ageBrackets' => ['Working age adults (15–64)', 'Older people (65+)'],
                'genderIdentities' => [],
                'constituencies' => ['Trans people'],
                'indigenousIdentities' => [],
                'areaTypes' => ['Urban areas'],
                'disabilityTypes' => ['Deaf'],
                'livedExperiences' => [],
                'sectors' => [
                    'Government of Canada',
                    'Federally Regulated private sector',
                ],
                'impacts' => [
                    'Employment',
                    'Built environment',
                    'Information technology',
                    'Procurement',
                    'Service delivery',
                ],
                'individualDetails' => [
                    'published_at' => now(),
                    'roles' => ['consultant', 'connector'],
                    'region' => 'NS',
                    'locality' => 'Halifax',
                    'pronouns' => ['en' => 'they/him'],
                    'working_languages' => ['asl', 'en'],
                    'consulting_services' => ['designing-consultation'],
                    'social_links' => [
                        'linked_in' => 'https://www.linkedin.com',
                        'twitter' => 'https://twitter.com/',
                        'instagram' => 'https://www.instagram.com/',
                        'facebook' => 'https://www.facebook.com/',
                    ],
                    'lived_experience' => [
                        'en' => 'I have been born Deaf and attended regular school and faced all the challenges that many other people in the Deaf community have to encouter to fit in. I am a member of the Trans community in Halifax.  ',
                    ],
                    'skills_and_strengths' => [
                        'en' => 'I have been part of many different focus groups and advisory committees to make provincial services and programs more accessible and inclusive for the Deaf as well as the 2SLGBTQIA+ community. ',
                    ],
                    'bio' => [
                        'en' => 'As a Deaf trans person I can bring in unique intersections of experiences to any conversation revolving around the issues of accessibility and inclusion. I have been one of the few people leading the inclusion and equaity efforts in my region. ',
                    ],
                    'meeting_types' => ['in_person', 'web_conference', 'phone'],
                    'connection_lived_experience' => 'yes-all',
                ],
            ],
            [
                'user' => [
                    'name' => 'Han Roy',
                    'email' => 'Han@accessibilityexchange.ca',
                    'preferred_contact_person' => 'me',
                    'preferred_contact_method' => 'email',
                ],
                'constituentLanguages' => ['en', 'fr', 'moh', 'cr', 'iu', 'oj'],
                'ethnoracial' => [],
                'ageBrackets' => ['Working age adults (15–64)', 'Older people (65+)'],
                'genderIdentities' => [],
                'constituencies' => [],
                'indigenousIdentities' => ['First Nations'],
                'areaTypes' => ['Rural areas', 'Remote areas'],
                'disabilityTypes' => [
                    'Pain-related disabilities',
                    'Physical and mobility disabilities',
                    'Mental health-related disabilities',
                ],
                'livedExperiences' => [
                    'Supporters',
                ],
                'sectors' => [
                    'Government of Canada',
                    'Federally Regulated private sector',
                ],
                'impacts' => [
                    'Employment',
                    'Built environment',
                    'Information technology',
                    'Procurement',
                    'Service delivery',
                ],
                'individualDetails' => [
                    'published_at' => now(),
                    'roles' => ['consultant', 'connector'],
                    'region' => 'ON',
                    'locality' => 'Toronto',
                    'pronouns' => ['en' => 'He/him'],
                    'working_languages' => ['en', 'fr', 'moh'],
                    'social_links' => [
                        'linked_in' => 'https://www.linkedin.com',
                        'twitter' => 'https://twitter.com/',
                        'instagram' => 'https://www.instagram.com/',
                        'facebook' => 'https://www.facebook.com/',
                    ],
                    'consulting_services' => ['running-consultation', 'writing-reports'],
                    'lived_experience' => [
                        'en' => 'I am a Mohawk (Kanienkehaka) person from Akwesasne who is a member of the Bear clan. I have been supporting my community members who face mental health and subtance use and addiction for the past 12 years. ',
                    ],
                    'skills_and_strengths' => ['en' => 'Personal support worker'],
                    'bio' => [
                        'en' => 'I have been advocating for Indigenous with mental health and addiction since the 80s. ',
                    ],
                    'meeting_types' => ['in_person', 'web_conference', 'phone'],
                    'connection_lived_experience' => 'yes-some',
                ],
            ],
            [
                'user' => [
                    'name' => 'Rose Wilson',
                    'email' => 'Rose@accessibilityexchange.ca',
                    'preferred_contact_person' => 'me',
                    'phone' => '6476041456',
                    'preferred_contact_method' => 'email',
                ],
                'constituentLanguages' => ['fr'],
                'ethnoracial' => ['Black', 'Asian', 'Middle Eastern'],
                'ageBrackets' => ['Working age adults (15–64)'],
                'genderIdentities' => ['Gender fluid people', 'Gender non-conforming people', 'Non-binary people'],
                'constituencies' => ['2SLGBTQIA+ people'],
                'indigenousIdentities' => [],
                'areaTypes' => ['Urban areas'],
                'disabilityTypes' => [],
                'livedExperiences' => [],
                'sectors' => [
                    'Government of Canada',
                    'Federally Regulated private sector',
                ],
                'impacts' => [
                    'Employment',
                    'Built environment',
                    'Information technology',
                    'Procurement',
                    'Service delivery',
                ],
                'individualDetails' => [
                    'published_at' => now(),
                    'roles' => ['connector'],
                    'region' => 'QC',
                    'locality' => 'Montreal',
                    'pronouns' => ['en' => 'she/Them'],
                    'working_languages' => ['fr'],
                    'social_links' => [
                        'linked_in' => 'https://www.linkedin.com',
                        'twitter' => 'https://twitter.com/',
                        'instagram' => 'https://www.instagram.com/',
                        'facebook' => 'https://www.facebook.com/',
                    ],
                    'lived_experience' => [
                        'en' => 'I am middle aged queer individual. I have become blind in my early 20s and since then I have learned to use braille. ',
                    ],
                    'skills_and_strengths' => ['en' => 'Addiction support worker'],
                    'bio' => [
                        'en' => 'I have been advocating for building safer work environments for the 2SLGBTQIA+ community in Quebec for the past five years. I have conducted many workshops, presentations, and websinars to help employers from local businesses to large corporations to rethink their current practices and make their work space more welcoming for the queer and Trans employees. ',
                    ],
                    'meeting_types' => ['in_person', 'web_conference', 'phone'],
                    'connection_lived_experience' => 'yes-some',
                ],
            ],
            [
                'user' => [
                    'name' => 'Alan Chang',
                    'email' => 'Alan@accessibilityexchange.ca',
                    'preferred_contact_person' => 'me',
                    'preferred_contact_method' => 'email',
                ],
                'constituentLanguages' => ['en', 'zh', 'yue'],
                'ethnoracial' => ['Black', 'Asian'],
                'ageBrackets' => ['Older people (65+)'],
                'genderIdentities' => [],
                'constituencies' => [],
                'indigenousIdentities' => [],
                'areaTypes' => ['Urban areas'],
                'disabilityTypes' => [
                    'Mental health-related disabilities',
                    'Communication disabilities',
                    'Developmental disabilities',
                ],
                'livedExperiences' => [
                    'Supporters',
                ],
                'sectors' => [
                    'Government of Canada',
                    'Federally Regulated private sector',
                ],
                'impacts' => [
                    'Employment',
                    'Built environment',
                    'Information technology',
                    'Procurement',
                    'Service delivery',
                ],
                'individualDetails' => [
                    'published_at' => now(),
                    'roles' => ['connector', 'participant'],
                    'region' => 'BC',
                    'locality' => 'Richmond',
                    'pronouns' => ['en' => 'he/him'],
                    'working_languages' => ['en', 'zh'],
                    'social_links' => [
                        'linked_in' => 'https://www.linkedin.com',
                        'twitter' => 'https://twitter.com/',
                        'instagram' => 'https://www.instagram.com/',
                        'facebook' => 'https://www.facebook.com/',
                    ],
                    'lived_experience' => [
                        'en' => 'I have supported both my parents who suffered from dementia later in life. ',
                    ],
                    'skills_and_strengths' => [
                        'en' => 'Many years of working directly with individuals in the disability community who also have intersecting identities.',
                    ],
                    'website_link' => 'https://www.Mysite.com',
                    'bio' => [
                        'en' => 'I am a second generation Chinese who is advocating for senior immigrants who may suffer from Alzheimer’s and dementia',
                    ],
                    'meeting_types' => ['in_person', 'web_conference', 'phone'],
                    'connection_lived_experience' => 'yes-some',
                ],
            ],
        ];

        foreach ($individualsForTesting as $individualUser) {
            $user = User::factory()->create($individualUser['user'] ?? []);
            $user->individual->impactsOfInterest()->attach(Impact::whereIn('name->en', $individualUser['impacts'] ?? [])->get()->modelKeys());
            $user->individual->sectorsOfInterest()->attach(Sector::whereIn('name->en', $individualUser['sectors'] ?? [])->get()->modelKeys());
            $user->individual->identityConnections()->attach(
                Identity::withoutGlobalScope(ReachableIdentityScope::class)
                    ->whereIn('name->en', $individualUser['livedExperiences'] ?? [])
                    ->orWhereIn('name->en', $individualUser['disabilityTypes'] ?? [])
                    ->orWhereIn('name->en', $individualUser['areaTypes'] ?? [])
                    ->orWhereIn('name->en', $individualUser['indigenousIdentities'] ?? [])
                    ->orWhereIn('name->en', $individualUser['constituencies'] ?? [])
                    ->orWhereIn('name->en', $individualUser['genderIdentities'] ?? [])
                    ->orWhereIn('name->en', $individualUser['ageGroups'] ?? [])
                    ->orWhereIn('name->en', $individualUser['ethnoracialIdentities'] ?? [])
                    ->get()
                    ->modelKeys()
            );
            foreach ($individualUser['constituentLanguages'] ?? [] as $code) {
                $language = Language::firstOrCreate(
                    ['code' => $code],
                    [
                        'name' => [
                            'en' => get_language_exonym($code, 'en'),
                            'fr' => get_language_exonym($code, 'fr'),
                        ],
                    ],
                );
                $user->individual->languageConnections()->attach($language->id);
            }
            $user->individual->update($individualUser['individualDetails'] ?? []);
        }

        $frosForTesting = [
            [
                'user' => [
                    'name' => 'Jannet Chow',
                    'email' => 'chow@accessibilityexchange.ca',
                    'context' => 'regulated-organization',
                ],
                'froSector' => 'Federally Regulated private sector',
                'froDetails' => [
                    'published_at' => now(),
                    'type' => 'business',
                    'name' => ['en' => 'BlueSky Airlines'],
                    'languages' => ['en'],
                    'region' => 'ON',
                    'locality' => 'Hamilton',
                    'social_links' => [
                        'linked_in' => 'https://www.linkedin.com',
                        'twitter' => 'https://twitter.com/',
                        'instagram' => 'https://www.instagram.com/',
                        'facebook' => 'https://www.facebook.com/',
                    ],
                    'accessibility_and_inclusion_links' => [
                        ['title' => 'Our path towards accessibility and inclusion', 'url' => 'https://example.com'],
                    ],
                    'website_link' => 'https://example.com',
                    'contact_person_name' => 'Jerome Ford',
                    'contact_person_email' => 'ford@accessibilityexchange.ca',
                    'preferred_contact_method' => 'email',
                    'about' => [
                        'en' => 'We are a Canadian airline headquartered in Hamilton Ontario. We operate short range domestic flights to different Canadian major cities. ',
                    ],
                ],
            ],
            [
                'user' => [
                    'name' => 'Murlio Durado',
                    'email' => 'md@accessibilityexchange.ca',
                    'context' => 'regulated-organization',
                ],
                'froSector' => 'Government of Canada',
                'froDetails' => [
                    'published_at' => now(),
                    'type' => 'government',
                    'name' => ['en' => 'Agriculture and Agri-Food Canada'],
                    'languages' => ['en', 'fr'],
                    'region' => 'ON',
                    'locality' => 'Ottawa',
                    'social_links' => [
                        'linked_in' => 'https://www.linkedin.com',
                        'twitter' => 'https://twitter.com/',
                        'instagram' => 'https://www.instagram.com/',
                        'facebook' => 'https://www.facebook.com/',
                    ],
                    'accessibility_and_inclusion_links' => [
                        ['title' => 'Making food and agriculture sector accessible', 'url' => 'https://example.com'],
                    ],
                    'website_link' => 'https://example.com',
                    'contact_person_name' => 'Alia Joshi',
                    'contact_person_email' => 'aj@accessibilityexchange.ca',
                    'preferred_contact_method' => 'email',
                    'about' => [
                        'en' => 'Agriculture and Agri-Food Canada supports the Canadian agriculture and agri-food sector through initiatives that promote innovation and competitiveness.',
                    ],
                ],
            ],
            [
                'user' => [
                    'name' => 'Ali Selim',
                    'email' => 'aselim@accessibilityexchange.ca',
                    'context' => 'regulated-organization',
                ],
                'froSector' => 'Government of Canada',
                'froDetails' => [
                    'published_at' => now(),
                    'type' => 'public-sector',
                    'name' => ['en' => 'Canada Post'],
                    'languages' => ['en'],
                    'region' => 'ON',
                    'locality' => 'Ottawa',
                    'social_links' => [
                        'linked_in' => 'https://www.linkedin.com',
                        'twitter' => 'https://twitter.com/',
                        'instagram' => 'https://www.instagram.com/',
                        'facebook' => 'https://www.facebook.com/',
                    ],
                    'accessibility_and_inclusion_links' => [
                        ['title' => 'Accessibility at Canada Post', 'url' => 'https://example.com'],
                    ],
                    'website_link' => 'https://example.com',
                    'contact_person_name' => 'Sarah Vogel',
                    'contact_person_email' => 'sv@accessibilityexchange.ca',
                    'preferred_contact_method' => 'email',
                    'about' => ['en' => 'We are the primary postal operator in Canada. '],
                ],
            ],
        ];

        foreach ($frosForTesting as $froUser) {
            $fro = RegulatedOrganization::factory()
                ->hasAttached(User::factory()->state($froUser['user'] ?? []), ['role' => 'admin'])
                ->create($froUser['froDetails'] ?? []);
            $fro->sectors()->attach(Sector::where('name->en', $froUser['froSector'] ?? '')->first()->id);
        }

        $orgsForTesting = [
            // [
            //     'user' => [
            //         'name' => '',
            //     ],
            //     'organization' => [

            //     ],
            // ],
        ];

        foreach ($orgsForTesting as $orgUser) {
            $org = Organization::factory()
                ->hasAttached(User::factory()->state($orgUser['user'] ?? []), ['role' => 'admin'])
                ->create($orgUser['organization'] ?? []);
        }

        $regions = array_column(ProvinceOrTerritory::cases(), 'value');

        $projectsForTesting = [
            [
                'project' => [
                    'name' => ['en' => 'BlueSky Airlines Accessibility project'],
                    'languages' => ['en', 'fr'],
                    'goals' => ['en' => 'In this project we focus on online ticketing and check in services on the BlueSky website. We want to make sure these online services are fully accessible for customers with diverse needs.'],
                    'scope' => ['en' => 'In this project aims to engage a diverse group of our potential customers who may have different lived experiences of disability and being Deaf. Particularly, we would like to work with individuals who use assistive technologies, such as screen readers to access our website and use our online services. '],
                    'regions' => $regions,
                    'out_of_scope' => ['en' => 'Accessibility of the physical services at check-in, and experiences inside the airplanes is out of scope for this project.'],
                    'start_date' => now(),
                    'end_date' => now()->addMonths(5),
                    'outcome_analysis' => ['internal'],
                    'outcomes' => ['en' => 'An accessibility report with a set of recommendations for change on the BlueSky website. '],
                    'public_outcomes' => true,
                    'team_size' => ['en' => '5'],
                    'team_has_disability_or_deaf_lived_experience' => false,
                    'contact_person_name' => 'Mario Miller',
                    'contact_person_email' => 'mm@accessibilityexchange.ca',
                    'preferred_contact_method' => 'email',
                    'contact_person_response_time' => ['en' => '48 hours'],
                    'estimate_requested_at' => now(),
                    'estimate_returned_at' => now(),
                    'estimate_approved_at' => now(),
                    'agreement_received_at' => now(),
                ],
                'organization' => 'BlueSky Airlines',
                'impact' => 'Information technology',
            ],
            [
                'project' => [
                    'name' => ['en' => 'Agriculture and Agri-Food Canada (AAFC) Accessibility project'],
                    'languages' => ['en', 'fr'],
                    'goals' => ['en' => 'In this project we will work on the accessibility of delivering information about our new programs and services to our members.'],
                    'scope' => ['en' => 'We aim to engage people with disabilities who are involved in the agriculture and agri-food related industries and businesses. '],
                    'regions' => $regions,
                    'out_of_scope' => ['en' => 'Design and delivery of programs and services	Accessibility and inclusion of work spaces, employment strategies, and agricultural tools and equipment is out of scope for this project. '],
                    'start_date' => now()->addMonth(),
                    'end_date' => now()->addMonths(6),
                    'outcome_analysis' => ['internal'],
                    'outcomes' => ['en' => 'A final online report will be available on our website. '],
                    'public_outcomes' => true,
                    'team_size' => ['en' => '3'],
                    'team_has_disability_or_deaf_lived_experience' => false,
                    'contact_person_name' => 'Cecilia Leyva',
                    'contact_person_email' => 'cl@accessibilityexchange.ca',
                    'preferred_contact_method' => 'email',
                    'contact_person_response_time' => ['en' => '5 business days'],
                ],
                'organization' => 'Agriculture and Agri-Food Canada',
                'impact' => 'Policy and programs',

            ],
            [
                'project' => [
                    'name' => ['en' => 'Accessibility at Canada Post'],
                    'languages' => ['en', 'fr'],
                    'goals' => ['en' => 'In this project we are focusing on the customer experience at Canada Post retail offices across the country.'],
                    'scope' => ['en' => 'We look forward to working with people with disabilities who have used Canada Post offices in their towns or cities to send mail or a parcel. '],
                    'regions' => $regions,
                    'out_of_scope' => ['en' => 'Accessibility of Canada post online services and mail boxes are out of scope for this project. '],
                    'start_date' => now()->subMonths(6),
                    'end_date' => now()->subMonth(),
                    'outcome_analysis' => ['internal'],
                    'outcomes' => ['en' => 'A final online report will be available on our website. '],
                    'public_outcomes' => true,
                    'team_size' => ['en' => '10'],
                    'team_has_disability_or_deaf_lived_experience' => true,
                    'contact_person_name' => 'Ian Thompson',
                    'contact_person_email' => 'it@accessibilityexchange.ca',
                    'preferred_contact_method' => 'email',
                    'contact_person_response_time' => ['en' => '24 hours'],
                ],
                'organization' => 'Canada Post',
                'impact' => 'Built environment',
            ],
        ];

        foreach ($projectsForTesting as $project) {
            $proj = Project::factory()->create(array_merge(['projectable_id' => RegulatedOrganization::where('name->en', $project['organization'])->first()->id], $project['project']));
            $proj->impacts()->attach(Impact::where('name->en', $project['impact'])->first()->id);
        }

        $connectorUser = User::whereBlind('email', 'email_index', 'ayhan@accessibilityexchange.ca')->first();

        $engagementsForTesting = [
            [
                'engagement' => [
                    'name' => ['en' => 'Workshop'],
                    'languages' => config('locales.supported'),
                    'who' => 'individuals',
                    'format' => 'workshop',
                    'recruitment' => 'open-call',
                    'ideal_participants' => 25,
                    'minimum_participants' => 15,
                    'paid' => true,
                    'description' => ['en' => 'This is what we are doing'],
                    'signup_by_date' => now()->addMonth(),
                    'published_at' => now(),
                ],
                'meetings' => [
                    [
                        'title' => 'Workshop 1',
                        'date' => now()->addMonths(2),
                    ],
                ],
            ],
            [
                'engagement' => [
                    'name' => ['en' => 'Focus Group'],
                    'languages' => config('locales.supported'),
                    'who' => 'individuals',
                    'format' => 'focus-group',
                    'recruitment' => 'connector',
                    'ideal_participants' => 25,
                    'minimum_participants' => 15,
                    'paid' => true,
                    'description' => ['en' => 'This is what we are doing'],
                    'signup_by_date' => now()->addMonth(),
                    'published_at' => now(),
                    'individual_connector_id' => $connectorUser->individual->id,
                ],
                'meetings' => [
                    [
                        'title' => 'Focus Group 1',
                        'date' => now()->addMonths(2),
                    ],
                ],
            ],
            [
                'engagement' => [
                    'name' => ['en' => 'Expert Analysis'],
                    'languages' => config('locales.supported'),
                    'who' => 'organization',
                    'paid' => true,
                    'description' => ['en' => 'This is what we are doing'],
                    'published_at' => now(),
                ],
            ],
        ];

        $project = Project::find(1);

        foreach ($engagementsForTesting as $engagement) {
            $eng = Engagement::factory()
                ->for($project)
                ->create($engagement['engagement']);

            foreach ($engagement['meetings'] ?? [] as $meeting) {
                Meeting::factory()
                    ->for($eng)
                    ->create($meeting);
            }
        }
    }
}
