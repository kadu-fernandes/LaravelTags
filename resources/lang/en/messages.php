<?php

return [
    'main' => [
        'title' => 'Tag Files',
    ],
    'shared' => [
        'add' => 'Add',
        'back' => 'Back',
        'cancel' => 'Cancel',
        'delete' => 'Delete',
        'normalized_path' => 'Normalized path',
        'save' => 'Save',
        'tag' => 'Tag',
        'slug' => 'Slug',
        'view' => 'View',
        'edit' => 'Edit',
        'description' => 'Description',
        'placeholder' => [
            'directory_path' => '/path/to/the/directory',
            'tag' => 'This is your tag',
            'description' => 'This is your description.'
        ],
        'errors' => [
            '404' => [
                'title' => 'Are you lost?'
            ],
            '500' => [
                'title' => 'Something bad happened!'
            ]
        ]
    ],
    'tracked' => [
        'directory' => [
            'titles' => [
                'add' => 'Tracked directory: Add',
                'index' => 'Tracked directory',
                'show' => 'Tracked directory: View',
            ],
        ],
        'file' => [
            'titles' => [
                'add' => 'Tracked file: Add',
                'edit' => 'Tracked file: Edit',
                'index' => 'Tracked file',
                'show' => 'Tracked file: View',
            ],

        ],
        'tag' => [
            'titles' => [
                'add' => 'Tracked tag: Add',
                'edit' => 'Tracked tag: Edit',
                'index' => 'Tracked tag',
                'show' => 'Tracked tag: View',
            ],
        ],
    ],
    'validation' => [
        'tracked_directory_not_exist' => 'The Directory does not exist!',
        'tracked_file_not_a_children' => 'The File is not a children of the given directory!',
    ],
];
