<?php

namespace Database\Seeders;

use App\Models\ContentType;
use App\Models\Impact;
use App\Models\Organization;
use App\Models\Resource;
use App\Models\ResourceCollection;
use App\Models\Sector;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // option to use environment to restore or backup to different environment files
        if (config('seeder.environment') !== null && in_array(config('seeder.environment'), config('backup.filament_seeders.environments')) === true) {
            $environment = config('seeder.environment');
        } else {
            $environment = config('app.env');
        }

        // TODO need to write handling of attachments
        if (false && Storage::disk('seeds')->exists(sprintf('resources.%s.json', $environment))) {
            // if trucate was set via seeder restore command then truncate the table prior to seeding data
            if (config('seeder.truncate')) {
                DB::statement('SET foreign_key_checks=0');
                Resource::truncate();
                DB::statement('SET foreign_key_checks=1');
            }

            $resources = json_decode(Storage::disk('seeds')->get(sprintf('resources.%s.json', $environment)), true);

            foreach ($resources as $resource) {
                if ($resource['content_type_id']) {
                    if (ContentType::where('id', $resource['content_type_id'])->doesntExist()) {
                        printf("Skipping insert because content type with id %s is missing \r\n", $resource['content_type_id']);

                        continue;
                    }
                }
                if ($resource['organization_id']) {
                    if (Organization::where('id', $resource['organization_id'])->doesntExist()) {
                        printf("Skipping insert because organization with id %s is missing \r\n", $resource['organization_id']);

                        continue;
                    }
                }
                $item = Resource::firstOrCreate([
                    'title' => json_decode($resource['title'], true),
                    'slug' => json_decode($resource['slug'], true),
                    'summary' => json_decode($resource['summary'], true),
                    'url' => json_decode($resource['url'], true),
                    'formats' => json_decode($resource['formats'], true),
                    'phases' => json_decode($resource['phases'], true),
                    'author' => json_decode($resource['author'], true),
                    'content_type_id' => $resource['content_type_id'],
                    'organization_id' => $resource['organization_id'],
                ]);
            }
        } else {
            echo "Seeder file wasn't found, using default values\r\n";
            $resources = [
                [
                    'title' => ['en' => 'The Accessible Canada Act, Accessibility Regulations and Standards'],
                    'author' => ['en' => 'ARCH Disability Law Centre'],
                    'url' => [
                        'en' => 'https://archdisabilitylaw.ca/the-accessible-canada-act-accessibility-regulations-and-standards/',
                        'asl' => 'https://www.youtube.com/watch?v=CE8OFr9jdXw',
                        'fr' => 'https://archdisabilitylaw.ca/fr/la-loi-canadienne-sur-laccessibilite-les-reglements-daccessibilite-et-les-normes-daccessibilite/',
                        'lsq' => 'https://www.youtube.com/watch?v=D5D6J8QFyX4',
                    ],
                    'phases' => ['design'],
                    'type' => ContentType::firstWhere('name->en', 'Guidelines and best practices'),
                    'sectors' => [Sector::firstWhere('name->en', 'Government of Canada')->id],
                    'impacts' => [Impact::firstWhere('name->en', 'Policy and programs')->id, Impact::firstWhere('name->en', 'Communications')->id],
                    'topics' => [],
                    'resourceCollections' => [ResourceCollection::firstWhere('title->en', 'The Accessible Canada Act')->id],
                ],
                [
                    'title' => ['en' => 'An Introduction To The Accessible Canada Act'],
                    'author' => ['en' => 'ARCH Disability Law Centre'],
                    'url' => ['en' => 'https://archdisabilitylaw.ca/an-introduction-to-the-accessible-canada-act/'],
                    'phases' => ['design'],
                    'sectors' => [Sector::firstWhere('name->en', 'Government of Canada')->id],
                    'impacts' => [Impact::firstWhere('name->en', 'Policy and programs')->id, Impact::firstWhere('name->en', 'Communications')->id],
                    'topics' => [],
                    'resourceCollections' => [ResourceCollection::firstWhere('title->en', 'The Accessible Canada Act')->id],
                ],
            ];

            foreach ($resources as $resource) {
                $item = Resource::firstOrCreate([
                    'title' => $resource['title'],
                    'author' => $resource['author'] ?? '',
                    'summary' => $resource['summary'] ?? '',
                    'url' => $resource['url'],
                    'phases' => $resource['phases'] ?? [],
                ]);

                if (isset($resource['type'])) {
                    $item->contentType()->associate($resource['type']);
                    $item->save();
                }

                if (isset($resource['sectors'])) {
                    $item->sectors()->attach($resource['sectors']);
                }

                if (isset($resource['impacts'])) {
                    $item->impacts()->attach($resource['impacts']);
                }

                if (isset($resource['topics'])) {
                    $item->topics()->attach($resource['topics']);
                }

                if (isset($resource['resourceCollections'])) {
                    $item->resourceCollections()->attach($resource['resourceCollections']);
                }
            }
        }
    }
}
