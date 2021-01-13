<?php

return [
    'roles_structure'   => [
        'super_admin' => [
            'trade_marks'       => 'c,r,u,d',
            'departments'       => 'c,r,u,d',
            'categories'        => 'c,r,u,d',
            'sub_categories'    => 'c,r,u,d',
            'products'          => 'c,r,u,d',
            'manufacturers'     => 'c,r,u,d',
            'shippings'         => 'c,r,u,d',
            'orders'            => 'c,r,u,d',
            'malls'             => 'c,r,u,d',
            'sliders'           => 'c,r,u,d',
            'brands'            => 'c,r,u,d',
            'notifications'     => 'c,r,u,d',
            'contacts'          => 'c,r,u,d',
            'countries'         => 'c,r,u,d',
            'cities'            => 'c,r,u,d',
            'states'            => 'c,r,u,d',
            'colors'            => 'c,r,u,d',
            'weights'           => 'c,r,u,d',
            'sizes'             => 'c,r,u,d',
            'users'             => 'c,r,u,d',
            'roles'             => 'c,r,u,d',
            'settings'          => 'c,r,u,d',
        ],
        'admin'       => [
            'roles'         => 'r',
            'users'         => 'r',
        ]
    ],

    'permissions_map'   => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'p' => 'print'
    ]
];
