<?php

return [

    'create_users'      => false,

    'truncate_tables'   => true,

    'roles_structure'   => [
        'super_admin' => [
            'countries'    => 'c,r,u,d',
            'cities'       => 'c,r,u,d',
            'users'        => 'c,r,u,d',
            'roles'        => 'c,r,u,d',
            'settings'     => 'c,r,u,d',
        ],
        'admin'       => []
    ],

    'permissions_map'   => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
