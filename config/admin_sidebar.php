<?php

return [
    [
        'route' => 'dashboard',
        'name' => 'admin.page.dashboard.title',
        'icon' => 'pe-7s-rocket',
    ],
    [
        'route' => 'category.index',
        'name' => 'admin.page.category.title',
        'icon' => 'pe-7s-rocket',
        'sub_menu' => [
            [
                'route' => 'category.index',
                'name' => 'admin.page.category.index',
            ],
            [
                'route' => 'category.create',
                'name' => 'admin.page.category.create',
            ],
        ]
    ],
    [
        'route' => 'post.index',
        'name' => 'admin.page.post.title',
        'icon' => 'pe-7s-rocket',
        'sub_menu' => [
            [
                'route' => 'post.index',
                'name' => 'admin.page.post.title',
            ],
            [
                'route' => 'post.create',
                'name' => 'admin.page.post.create',
            ],
        ]
    ],
    [
        'route' => 'contact-info.index',
        'name' => 'admin.page.contact-info.title',
        'icon' => 'pe-7s-rocket',
        'sub_menu' => [
            [
                'route' => 'contact-info.index',
                'name' => 'admin.page.contact-info.index',
            ],
            [
                'route' => 'contact-info.create',
                'name' => 'admin.page.contact-info.create',
            ],
        ]
    ],
//    [
//        'route' => 'email-subscriber.index',
//        'name' => 'admin.page.email-subscriber.title',
//        'icon' => 'pe-7s-rocket',
//    ],
    [
        'route' => 'contact.index',
        'name' => 'admin.page.contact.title',
        'icon' => 'pe-7s-rocket',
    ],
    [
        'route' => 'partner.index',
        'name' => 'admin.page.partner.title',
        'icon' => 'pe-7s-rocket',
        'sub_menu' => [
            [
                'route' => 'partner.index',
                'name' => 'admin.page.partner.index',
            ],
            [
                'route' => 'partner.create',
                'name' => 'admin.page.partner.create',
            ],
        ]
    ],
    [
        'route' => 'slider.index',
        'name' => 'admin.page.slider.title',
        'icon' => 'pe-7s-rocket',
        'sub_menu' => [
            [
                'route' => 'slider.index',
                'name' => 'admin.page.slider.index',
            ],
            [
                'route' => 'slider.create',
                'name' => 'admin.page.slider.create',
            ],
        ]
    ],
    [
        'route' => 'user.index',
        'name' => 'admin.page.user.title',
        'icon' => 'pe-7s-rocket',
        'sub_menu' => [
            [
                'route' => 'user.index',
                'name' => 'admin.page.user.index',
            ],
            [
                'route' => 'user.create',
                'name' => 'admin.page.user.create',
            ],
        ]
    ],
    [
        'route' => 'config.index',
        'name' => 'admin.page.config.title',
        'icon' => 'pe-7s-rocket',
        'sub_menu' => [
            [
                'route' => 'config.index',
                'name' => 'admin.page.config.index',
            ],
            [
                'route' => 'config.create',
                'name' => 'admin.page.config.create',
            ],
        ]
    ],
    [
        'route' => 'permissions.index',
        'name' => 'admin.page.permission.title',
        'icon' => 'pe-7s-rocket',
        'sub_menu' => [
            [
                'route' => 'permission.index',
                'name' => 'admin.page.permission.index',
            ],
            [
                'route' => 'permission.create',
                'name' => 'admin.page.permission.create',
            ],
            [
                'route' => 'role.index',
                'name' => 'admin.page.role.index',
            ],
            [
                'route' => 'role.create',
                'name' => 'admin.page.role.create',
            ],
        ]
    ], [
        'route' => 'seo::dashboard.index',
        'name' => 'admin.page.seo-manager.title',
        'icon' => 'pe-7s-rocket',
    ],
];
