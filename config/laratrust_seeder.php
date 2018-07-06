<?php

return [
    'role_structure' => [
        'super-administrator' => [
            'users' => 'c,r,u,d',
            'examples' => 'c,r,u,d',
        ]
    ],
    'permission_structure' => [
        'users' => 'c,r,u,d',
        'examples' => 'c,r,u,d'
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
