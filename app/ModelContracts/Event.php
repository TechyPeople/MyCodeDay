<?php
namespace CodeDay\Clear\ModelContracts;

use \CodeDay\Clear\Models;

class Event extends ModelContract
{
    public static function getFields()
    {
        return [

            'id' => [
                'name'          => 'ID',
                'description'   => 'The ID of the event.',
                'example'       => 'q01pkMQc0dwb',
                'value'         => function($model) { return $model->id; }
            ],

            /* Name-Related Properties */
            'name' => [
                'name'          => 'Event Name',
                'description'   => 'The full name of the event, including the batch.',
                'example'       => 'CodeDay Seattle Fall 2014',
                'value'         => function($model) { return $model->full_name; }
            ],

            'region_name' => [
                'name'          => 'Region Name',
                'description'   => 'The name of the region of the event.',
                'example'       => 'Seattle',
                'value'         => function($model) { return $model->name; }
            ],

            'webname' => [
                'name'          => 'Webname Name',
                'description'   => 'The webname for the event.',
                'example'       => 'seattle',
                'value'         => function($model) { return $model->webname; }
            ],

            /* Time-Related Properties */
            'starts_at' => [
                'name'          => 'Starts At',
                'description'   => 'The start time of the event, as a UTC UNIX timestamp. This will generally be noon'
                                 . ' local time on a Saturday.',
                'example'       => '1415476800',
                'value'         => function ($model) { return $model->starts_at; }
            ],

            'ends_at' => [
                'name'          => 'Ends At',
                'description'   => 'The end time of the event, as a UTC UNIX timestamp. This will generally be noon'
                               . ' local time on a Sunday.',
                'example'       => '1415563200',
                'value'         => function ($model) { return $model->ends_at; }
            ],

            /* Location-Related Properties */
            'venue' => [
                'name'          => 'Venue',
                'description'   => 'Information related to the space hosting this event.',
                'type'          => 'Venue',
                'rich'          => true,
                'value'         => function ($model, $permissions) {
                        if ($model->venue) {
                            return new Venue($model, $permissions, true);
                        } else {
                            return null;
                        }
                    }
            ],

            /* People */
            'manager' => [
                'name'          => 'Manager',
                'description'   => 'The person in charge of any before-the-event tasks.',
                'type'          => 'User',
                'requires'      => ['internal', 'int', 'x'],
                'rich'          => true,
                'value'         => function ($model, $permissions) {
                    return new User($model->manager, $permissions, true);
                }
            ],

            'evangelist' => [
                'name'          => 'Evangelist',
                'description'   => 'The person in charge of running the event day-of.',
                'type'          => 'User',
                'requires'      => ['internal', 'int'],
                'rich'          => true,
                'value'         => function ($model, $permissions) {
                    return new User($model->evangelist, $permissions, true);
                }
            ],

            /* Other Properties */
            'registration_info' => [
                'name'          => 'Registration Info',
                'description'   => 'Information about the state of registrations',
                'example'       => '{ is_open: true }',
                'value'         => function ($model) {
                    return (object)[
                        'estimate' => $model->registration_estimate,
                        'max' => $model->max_registrations,
                        'is_open' => $model->AllowRegistrationsCalculated,
                        'remaining' => $model->remaining_registrations,
                        'is_earlybird_ending' => $model->is_earlybird_ending
                    ];
                }
            ],

            'emergency_phone' => [
                'name'          => 'Emergency Phone',
                'description'   => 'The phone number to call in case of an emergency at the event. This will usually,'
                                 . ' though not always, be someone on-site, such as an Evangelist.',
                'example'       => '15551231234',
                'requires'      => ['internal'],
                'value'         => function ($model) { return $model->emergency_phone; }
            ],

            'waiver' => [
                'name'          => 'Waiver',
                'description'   => 'If a waiver is required for this event, the URL to the waiver. Otherwise null.',
                'example'       => 'https://www.dropbox.com/s/tf3g3txhdg947gg/waiver.pdf?dl=1',
                'value'         => function ($model) { return $model->waiver_link; }
            ],

            'stripe_public_key' => [
                'name'          => 'Stripe Public Key',
                'description'   => 'The public key to use when creating a charge token, for use with the registration'
                                 . ' endpoint.',
                'example'       => 'pk_dSWdf9Dxb8nrKUroTF0kHrwNoSNor',
                'value'         => function () { return \Config::get('stripe.public'); }
            ],

            'is_early_bird_pricing' => [
                'name'          => 'Is Early Bird Pricing',
                'description'   => 'True if early bird pricing is in effect.',
                'value'         => function ($model) { return $model->is_early_bird_pricing; }
            ],

            'schedule' => [
                'name'          => 'Schedule',
                'description'   => 'The full event schedule.',
                'example'       => '{ ... }',
                'rich'          => true,
                'value'         => function ($model) { return $model->schedule; }
            ],

            'sponsors' => [
                'name'          => 'Custom CSS',
                'description'   => 'Custom CSS for inclusion on the main site.',
                'example'       => '{ ... }',
                'rich'          => true,
                'value'         => function ($model) { return $model->sponsors_info; }
            ],

            'custom_css' => [
                'name'          => 'Custom CSS',
                'description'   => 'Custom CSS for inclusion on the main site.',
                'requires'      => ['internal'],
                'rich'          => true,
                'example'       => '* { display: none; }',
                'value'         => function ($model) { return $model->custom_css; }
            ],

            'cost' => [
                'name'          => 'Cost',
                'description'   => 'The price per ticket.',
                'example'       => '10.00',
                'value'         => function ($model) { return $model->cost; }
            ],

            'notice' => [
                'name'          => 'Notice',
                'description'   => 'If an important notice exists for the event, the notice. Otherwise null.',
                'example'       => 'This event is postponed due to snow.',
                'value'         => function ($model) { return $model->notice; }
            ],

            /* Ownership Relations */
            'region' => [
                'name' => 'Region',
                'description' => 'The region hosting the event. This may be a city, county, metropolitan area, state or'
                               . ' something else.',
                'type' => 'Region',
                'rich' => true,
                'value' => function ($model, $permissions) {return new Region($model->region, $permissions, true); }
            ],

            'batch' => [
                'name' => 'Batch',
                'description' => 'Batches are groups of events happening at the same time. This represents the group of'
                               . ' events happening alongside this event.',
                'type' => 'Batch',
                'rich' => true,
                'value' => function ($model, $permissions) {return new Batch($model->batch, $permissions, true); }
            ],

            'overflow_event' => [
                'name'          => 'Overflow Event',
                'description'   => 'The event to redirect to when this event is sold-out. DEPRECATED in favor of'
                                   . ' related_events.',
                'type'          => 'Event',
                'value'         => function($model, $permissions, $sparse) {
                    return new Event($model->overflow_event, $permissions, true);
                }
            ],

            'related_events' => [
                'name'          => 'Related Events',
                'description'   => 'An array of events taking place in the same region.',
                'type'          => 'Event',
                'rich'          => true,
                'value'         => function($model, $permissions, $sparse) {
                    foreach ($model->related_events as $event) {
                        yield new Event($event, $permissions, true);
                    }
                }
            ]
        ];
    }
} 