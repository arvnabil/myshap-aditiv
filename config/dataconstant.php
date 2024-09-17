<?php
return [
    'roles' => [
        'super_admin',
        'panel_user',
        'panel_employee',
        'Employee',
        'panel_app',
    ],

    "leave_types" => [
        [
            'name' => "Annual leave",
            "description" => "Cuti Tahunan",
            "max_days_allowed" => 12,
            'strict' => true
        ],
        [
            'name' => "Sick leave ",
            "description" => "Izin Sakit",
            "max_days_allowed" => 1,
            'strict' => false
        ],
        [
            'name' => "Other leave",
            "description" => "Cuti Lainnya",
            "max_days_allowed" => 90,
            'strict' => false
        ],
    ],
    'users' => [
        [
            'name'              => 'Shap',
            'username'          => 'myshap',
            'email'             => 'myshap@aditiv.co.id',
            'password'          => 'ADITIV2024!',
            'roles'             => ['super_admin', 'panel_user', 'Employee', 'panel_employee', 'panel_app'],
            'email_verified_at' => '2021-04-06 04:06:00',
            'is_locked'         => 1,
            'employee'          => [

                                'firstname'         => 'Shap',
                                'lastname'          => 'Admin',
                                'account_number'    => 'ADT-000',
                                'phone_number'      => '2150110987',
                                'gender'            => 'male',
                                'position_id'       => 13
            ]
        ],
        [
            'name'              => 'Mohammad Fazrie',
            'username'          => 'fazri',
            'email'             => 'fazri@aditiv.co.id',
            'password'          => 'ADITIV2024!',
            'roles'             => ['super_admin', 'panel_user', 'Employee', 'panel_employee', 'panel_app'],
            'email_verified_at' => '2021-04-06 04:06:00',
            'is_locked'         => 1,
            'employee'          => [

                                'firstname'         => 'Mohammad',
                                'lastname'          => 'Fazrie',
                                'account_number'    => 'ADT-001',
                                'gender'            => 'male',
                                'phone_number'      => '81311523538',
                                'position_id'       => 2
            ]
        ],
        [
            'name'              => 'Nabil',
            'username'          => 'nabil',
            'email'             => 'nabil@aditiv.co.id',
            'password'          => 'ADITIV2024!',
            'roles'             => ['Employee','panel_employee', 'panel_app'],
            'email_verified_at' => '2021-04-06 04:06:00',
            'is_locked'         => 1,
            'employee'          => [

                                'firstname'         => 'Nabil',
                                'lastname'          => '',
                                'account_number'    => 'ADT-002',
                                'gender'            => 'male',
                                'phone_number'      => '87881049606',
                                'position_id'       => 11
            ]
        ],
        [
            'name'              => 'Ade',
            'username'          => 'ade',
            'email'             => 'ade@aditiv.co.id',
            'password'          => 'ADITIV2024!',
            'roles'             => ['Employee', 'panel_employee', 'panel_app'],
            'email_verified_at' => '2021-04-06 04:06:00',
            'is_locked'         => 1,
            'employee'          => [
                'firstname'         => 'Ade',
                'lastname'          => 'Christine',
                'account_number'    => 'ADT-003',
                'gender'            => 'female',
                'phone_number'      => '85860173661',
                'position_id'       => 11
            ]
        ],
        [
            'name'              => 'Tri Mulya Kama Devi',
            'username'          => 'devi',
            'email'             => 'devi@aditiv.co.id',
            'password'          => 'ADITIV2024!',
            'roles'             => ['Employee', 'panel_employee', 'panel_app'],
            'email_verified_at' => '2021-04-06 04:06:00',
            'is_locked'         => 1,
            'employee'          => [

                'firstname'         => 'Tri Mulya',
                'lastname'          => 'Kama Devi',
                'account_number'    => 'ADT-004',
                'gender'            => 'female',
                'phone_number'      => '895329843266',
                'position_id'       => 5
            ]
        ],
        [
            'name'              => 'Fitra Adyasa',
            'username'          => 'fitra',
            'email'             => 'fitra@aditiv.co.id',
            'password'          => 'ADITIV2024!',
            'roles'             => ['Employee','panel_employee', 'panel_app'],
            'email_verified_at' => '2021-04-06 04:06:00',
            'is_locked'         => 1,
            'employee'          => [

                                'firstname'         => 'Fitra',
                                'lastname'          => 'Adyasa',
                                'account_number'    => 'ADT-005',
                                'gender'            => 'male',
                                'phone_number'      => '+62 858-1280-9829',
                                'position_id'       => 4
            ]
        ],
    ],
    'departements' => [
        [
            'name' => 'MD Office',
            'description' => 'MD Office',
            'positions' => [
                [
                    'name' => 'Director',
                    'description' => 'Director',
                ],
                [
                    'name' => 'Director IT & BD',
                    'description' => 'Director',
                ],
                [
                    'name' => 'Komisaris',
                    'description' => 'Komisaris',
                ]
            ]
        ],
        [
            'name' => 'Accounts and  Finances',
            'description' => 'Accounts and  Finances',
            'positions' => [
                [
                    'name' => 'Admin Finance',
                    'description' => 'Admin Finance',
                ],
                [
                    'name' => 'Tax Accounting',
                    'description' => 'Tax Accounting',
                ]
            ]
        ],
        [
            'name' => 'Sales',
            'description' => 'Sales',
            'positions' => [
                [
                    'name' => 'Account Manager',
                    'description' => 'Account Manager',
                ],
                [
                    'name' => 'Sales',
                    'description' => 'Sales',
                ]
            ]
        ],
        [
            'name' => 'Technical',
            'description' => 'Technical',
            'positions' => [
                [
                    'name' => 'Presales Technical Engineer',
                    'description' => 'Presales Technical Engineer',
                ],
                [
                    'name' => 'Technical Engineer',
                    'description' => 'Technical Engineer',
                ]
            ]
        ],
        [
            'name' => 'E-business and Analyst',
            'description' => 'E-business and Analyst',
            'positions' => [
                [
                    'name' => 'Digital Marketing',
                    'description' => 'Digital Marketing',
                ],
                [
                    'name' => 'Web Development & Software Analyst',
                    'description' => 'Web Development & Software Analyst',
                ],

            ]
        ],
        [
            'name' => 'Umum',
            'description' => 'Umum',
            'positions' => [
                [
                    'name' => 'General Affair',
                    'description' => 'General Affair',
                ]
            ]
        ],
        [
            'name' => 'System',
            'description' => 'System',
            'positions' => [
                [
                    'name' => 'System',
                    'description' => 'System',
                ]
            ]
        ],
    ],

];
