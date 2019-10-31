<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'room' => [
        'title' => 'Rooms',

        'actions' => [
            'index' => 'Rooms',
            'create' => 'New Room',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'name' => 'Name',
            'description' => 'Description',
            
        ],
    ],

    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'item' => [
        'title' => 'Items',

        'actions' => [
            'index' => 'Items',
            'create' => 'New Item',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'name' => 'Name',
            'description' => 'Description',
            'storable_id' => 'Storable',
            'storable_type' => 'Storable type',
            
        ],
    ],

    'person' => [
        'title' => 'People',

        'actions' => [
            'index' => 'People',
            'create' => 'New Person',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'full_name' => 'Full name',
            'name' => 'Name',
            'description' => 'Description',
            'is_self' => 'Is self',
            'always_on_person' => 'Always on person',
            'location' => 'Location',
            
        ],
    ],

    'exit' => [
        'title' => 'Exits',

        'actions' => [
            'index' => 'Exits',
            'create' => 'New Exit',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'direction' => 'Direction',
            'is_locked' => 'Is locked',
            'key' => 'Key',
            'password' => 'Password',
            'room_a' => 'Room a',
            'room_b' => 'Room b',
            
        ],
    ],

    'door' => [
        'title' => 'Doors',

        'actions' => [
            'index' => 'Doors',
            'create' => 'New Door',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'direction' => 'Direction',
            'is_locked' => 'Is locked',
            'key' => 'Key',
            'password' => 'Password',
            'room_a' => 'Room a',
            'room_b' => 'Room b',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];