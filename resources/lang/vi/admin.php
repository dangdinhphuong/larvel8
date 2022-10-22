<?php
return [
    'button' => [
        'create' => "Tạo mới",
        'edit' => "Chỉnh sửa",
        'delete' => "Xóa",
        'save' => "Lưu",
        'browse_server' => "Duyệt máy chủ",
        'action' => "Hành động",
        'clear_cache' => "Xóa bộ nhớ đệm",
        'select_language' => "Chọn ngôn ngữ",
    ],
    'action' => [
        'create' => "Tạo mới",
        'edit' => "Chỉnh sửa",
        'delete' => "Xóa",
        'updated' => 'Cập nhật thành công',
        'created' => 'Tạo mới thành công',
        'deleted' => 'Xóa thành công',
        'search' => 'Tìm kiếm',
        'reset' => 'Đặt lại',
    ],
    'status' => [
        'pending' => 'Chờ phê duyệt',
        'approved' => 'Được phê duyệt',
        'activated' => 'Kích hoạt',
        'deactivated' => 'Không kích hoạt',
    ],
    'page' => [
        'dashboard' => [
            'title' => "Dashboard",
        ],
        'category' => [
            'title' => "Danh mục",
            'index' => "Danh sách danh mục",
            'create' => "Tạo danh mục",
            'attribute' => [
                'name' => "Tên",
                'type' => "Loại",
                'slug' => "Slug",
                'parent_id' => "Danh mục cha"
            ],
            'type' => [
                'faq' => 'FAQ',
                'product' => "Sản phẩm",
                'blog' => "Bài viết",
                'recruit' => "Tuyển dụng",
            ],
            'form' => [
                'category_info' => "Thông tin danh mục",
                'parent_category' => 'Danh mục cha'
            ]

        ],
        'post' => [
            'title' => "Tin tức",
            'status' => [
                'Chờ phê duyệt',
                'Đã phê duyệt'
            ],
            'index' => "Danh sách tin tức",
            'create' => "Tạo mới tin tức",
            'attribute' => [
                'name' => "Tên",
                'slug' => "Slug",
                'short_description' => "Mô tả ngắn",
                'content' => "Nội dung",
                'category_ids' => "Danh mục cha",
                'type' => "Loại",
                'status' => "Trạng thái",
                'author' => "Tác giả",
                'thumbnail' => "Hình ảnh",
            ],
            'form' => [
                'category_info' => "Thông tin danh mục",
                'parent_category' => 'Danh mục cha'
            ]
        ],
        'contact-info' => [
            'title' => "Thông tin liên hệ",
            'status' => [
                'Kích hoạt',
                'Không kích hoạt'
            ],
            'index' => "Danh sách thông tin liên hệ",
            'create' => "Thêm mới thông tin liên hệ",
            'attribute' => [
                'name' => "Tên",
                'address' => "Địa chỉ",
                'email' => "Email",
                'phone' => "Số điện thoại",
                'status' => "Trạng thái",
                'position' => "Vị trí",
            ],
            'form' => [
            ]
        ],
        'email-subscriber' => [
            'title' => "Email đăng kí",
            'status' => [
                'Kích hoạt',
                'Không kích hoạt'
            ],
            'attribute' => [
                'email' => "Email",
                'phone' => "Điện thoại",
                'option' => "Sản phẩm / Dịch vụ",
                'status' => "Trạng thái",
            ],
            'form' => [
            ]
        ],
        'contact' => [
            'title' => "Liên hệ",
            'attribute' => [
                'name' => "Tên",
                'phone' => "Số điện thoại",
                'address' => "Địa chỉ",
                'business_type' => "Ngành nghề kinh doanh",
                'company_name' => "Tên công ty",
                'content' => "Nội dung",
                'email' => "Email",
            ],
            'form' => [
            ]
        ],
        'partner' => [
            'title' => "Đối tác",
            'status' => [
                'Kích hoạt',
                'Khôn kích hoạt'
            ],
            'index' => "Danh sách đối tác",
            'create' => "Tạo mới đối tác",
            'attribute' => [
                'logo' => "Logo",
                'type' => "Loại",
                'status' => "Trạng thái"
            ],
            'form' => [
            ],
            'type' => [
                'vendor' => 'Nhà cung cấp',
                'sponsor' => 'Quỹ đầu tư',
                'customer' => 'Khách hàng',
            ]
        ],
        'slider' => [
            'title' => "Slider",
            'status' => [
                'Kích hoạt',
                'Hủy kích hoạt'
            ],
            'index' => " Danh sách slider ",
            'create' => "Tạo mới slider",
            'attribute' => [
                'thumbnail' => "Hình ảnh",
                'content' => "Nội dung",
                'status' => "Trạng thái",
                'position' => "Vị trí",
            ],
            'form' => [
            ]
        ],
        'user' => [
            'title' => "Người dùng",
            'status' => [
                'Kích hoạt',
                'Không kích hoạt'
            ],
            'index' => "Danh sách người dùng",
            'create' => "Tạo mới người dùng",
            'attribute' => [
                'name' => "Tên",
                'email' => "Email",
                'phone' => "Số điện thoại",
                'status' => "Trạng thái",
                'role_ids' => "Chức vụ",

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
            'index' => "Danh sách cấu hình",
            'create' => "Tạo mới cấu hình",
            'attribute' => [
                'value' => "Giá trị",
                'key' => "Khóa",
                'status' => "Trạng thái",
                'type' => "Loại",
            ],
            'form' => [
                'type' => [
                    'image' => 'Ảnh',
                    'textarea' => 'Textarea',
                    'flat' => 'Bình thường',
                ]
            ]
        ],
        'permission' => [
            'title' => "Quyền",
            'index' => "Danh sách quyền",
            'create' => "Tạo mới quyền",
            'attribute' => [
                'name' => "Tên",
                'router' => "Router",
                'group' => "Nhóm",
            ],
            'form' => [
            ]
        ],
        'role' => [
            'title' => "Chức vụ",
            'index' => "Danh sách chức vụ",
            'create' => "Tạo mới chức vụ",
            'attribute' => [
                'name' => "Tên",
                'description' => "Mô tả",
                'permission_ids' => "Quyền",
                'form' => [
                    'get_all_permissions' => 'Nhận tất cả quyền',
                    'all_permissions' => 'Tất cả quyền',
                ]
            ],
            'seo-manager' => [
                'title' => "Quản lý Seo",
            ],
        ],
    ],
    'notify' => [
        'confirm-delete' => [
            'title' => 'Bạn chắc chắn?',
            'subtitle' => "Bạn sẽ không thể khôi phục việc này!"
        ],
    ]

];
