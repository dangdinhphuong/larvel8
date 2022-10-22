<?php
return [
    'button' => [
        'create' => "Create",
        'edit' => "Edit",
        'delete' => "Delete",
        'save' => "Save",
        'browse_server' => "Browse Server",
        'action' => "Action",
        'clear_cache' => "Clear cache",
        'select_language' => "Select language",
    ],
    'action' => [
        'create' => "Create",
        'edit' => "Edit",
        'delete' => "Delete",
        'updated' => 'Update success',
        'created' => 'Create success',
        'deleted' => 'Delete success',
        'search' => 'Search',
        'reset' => 'Reset',
    ],
    'status' => [
        'pending' => 'Pending',
        'approved' => 'Approved',
        'activated' => 'Activated',
        'deactivated' => 'Deactivated',
    ],
    'page' => [
        'dashboard' => [
            'title' => "Dashboard",
        ],
        'category' => [
            'title' => "Category",
            'index' => "Category List",
            'create' => "Create Category",
            'attribute' => [
                'name' => "Name",
                'type' => "Type",
                'slug' => "Slug",
                'parent_id' => "Parent Category"
            ],
            'type' => [
                'faq' => 'FAQ',
                'product' => "Product",
                'blog' => "Blog",
                'recruit' => "Recruit",
            ],
            'form' => [
                'category_info' => "Category Info",
                'parent_category' => 'Parent Category'
            ]

        ],
        'post' => [
            'title' => "Post",
            'status' => [
                'Pending',
                'Approved'
            ],
            'index' => "Post List",
            'create' => "Create Post",
            'attribute' => [
                'name' => "Name",
                'slug' => "Slug",
                'short_description' => "Short description",
                'content' => "Content",
                'category_ids' => "Parent Category(ies)",
                'type' => "Type",
                'status' => "Status",
                'author' => "Author",
                'thumbnail' => "Thumbnail",
            ],
            'form' => [
                'category_info' => "Category Info",
                'parent_category' => 'Parent Categories'
            ]
        ],
        'contact-info' => [
            'title' => "Contact Info",
            'status' => [
                'Activated',
                'Deactivated'
            ],
            'index' => "Contact Info List",
            'create' => "Create Contact Info",
            'attribute' => [
                'name' => "Name",
                'address' => "Address",
                'email' => "Email",
                'phone' => "Phone",
                'status' => "Status",
                'position' => "Position",
            ],
            'form' => [
            ]
        ],
        'email-subscriber' => [
            'title' => "Email subscriber",
            'status' => [
                'Activated',
                'Deactivated'
            ],
            'attribute' => [
                'email' => "Email",
                'phone' => "Phone",
                'option' => "Product/Service",
                'status' => "status",
            ],
            'form' => [
            ]
        ],
        'contact' => [
            'title' => "Contact",
            'attribute' => [
                'name' => "Name",
                'phone' => "Phone",
                'address' => "Address",
                'business_type' => "Business type",
                'company_name' => "Company name",
                'content' => "Content",
                'email' => "Email",
            ],
            'form' => [
            ]
        ],
        'partner' => [
            'title' => "Partner",
            'status' => [
                'Activated',
                'Deactivated'
            ],
            'index' => "Partner List",
            'create' => "Create Partner",
            'attribute' => [
                'logo' => "Logo",
                'type' => "Type",
                'status' => "Status"
            ],
            'form' => [
            ],
            'type' => [
                'vendor' => 'Vendor',
                'sponsor' => 'Sponsor',
                'customer' => 'Customer',
            ]
        ],
        'slider' => [
            'title' => "Slider",
            'status' => [
                'Activated',
                'Deactivated'
            ],
            'index' => "Slider List",
            'create' => "Create Slider",
            'attribute' => [
                'thumbnail' => "Thumbnail",
                'content' => "Content",
                'status' => "Status",
                'position' => "Position",
            ],
            'form' => [
            ]
        ],
        'user' => [
            'title' => "User",
            'status' => [
                'Activated',
                'Deactivated'
            ],
            'index' => "User List",
            'create' => "Create User",
            'attribute' => [
                'name' => "Name",
                'email' => "Email",
                'phone' => "Phone",
                'status' => "Status",
                'role_ids' => "Role(s)",

            ],
            'form' => [
            ]
        ],
        'config' => [
            'title' => "Config",
            'status' => [
                'Activated',
                'Deactivated'
            ],
            'index' => "Config List",
            'create' => "Create Config",
            'attribute' => [
                'value' => "Value",
                'key' => "Key",
                'status' => "Status",
                'type' => "Type",
            ],
            'form' => [
                'type' => [
                    'image' => 'Image',
                    'textarea' => 'Textarea',
                    'flat' => 'Normal',
                ]
            ]
        ],
        'permission' => [
            'title' => "Permission",
            'index' => "Permission List",
            'create' => "Create Permission",
            'attribute' => [
                'name' => "Name",
                'router' => "Router",
                'group' => "Group",
            ],
            'form' => [
            ]
        ],
        'role' => [
            'title' => "Role",
            'index' => "Role List",
            'create' => "Create Role",
            'attribute' => [
                'name' => "Name",
                'description' => "Description",
                'permission_ids' => "Permission(s)",
            ],
            'form' => [
                'get_all_permissions' => 'Get all permissions',
                'all_permissions' => 'All permissions',
            ]
        ],
        'seo-manager' => [
            'title' => "Seo Manager",
        ],
    ],
    'notify' => [
        'confirm-delete' => [
            'title' => 'Are you sure?',
            'subtitle' => "You will not be able to revert this!"
        ],
    ]
];
