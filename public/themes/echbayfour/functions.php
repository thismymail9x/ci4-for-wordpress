<?php

/**
 * ngôn ngữ hiển thị của website
 * các ngôn ngữ được hỗ trợ
 **/
/*
define(
    'SITE_LANGUAGE_SUPPORT',
    [
        [
            'value' => 'vn',
            'text' => 'Tiếng Việt',
            'css_class' => 'text-muted'
        ],
        // muốn chạy bao nhiêu ngôn ngữ thì thêm bằng đấy mảng vào đây
        [
            'value' => 'en',
            'text' => 'English',
            'css_class' => 'text-success'
        ],
    ]
);
*/


/*
// khi cần thay label cho trang /admin/translates để dễ hiểu hơn thì thêm các thông số vào đây
define( 'TRANS_TRANS_LABEL', [
    'custom_text0' => 'Bản dịch số 0',
    //'custom_textarea0' => 'Bản dịch số 0',
] );
*/

// khi cần thay label cho trang /admin/nummons để dễ hiểu hơn thì thêm các thông số vào đây
/*
define(
    'TRANS_NUMS_LABEL',
    [
        'custom_num_mon0' => 'Tùy chỉnh số 0',
    ]
);
*/

// khi cần thay label cho trang /admin/checkboxs để dễ hiểu hơn thì thêm các thông số vào đây
/*
define(
    'TRANS_CHECKBOXS_LABEL',
    [
        'custom_checkbox0' => 'Checkbox số 0',
    ]
);
*/

/**
 * Thêm menu cho admin
 * Ngoài các menu mặc định, với mỗi website có thể thêm các menu tùy chỉnh khác nhau vào đây theo công thức mẫu
 **/
/*
function register_admin_menu()
{
    return [
        'admin/controller' => [
            // nếu có phân quyền thì nhập phân quyền vào đây, không thì xóa nó đi -> quyền admin
            'role' => [
                UsersType::ADMIN
            ],
            'name' => 'Custom admin menu',
            'icon' => 'fa fa-bug',
            'arr' => [
                'admin/sub_controller' => [
                    'name' => 'Sub menu',
                    'icon' => 'fa fa-plus',
                    //'target' => '_blank',
                ],
            ],
            'order' => 95,
        ]
    ];
}
*/

/**
 * đăng ký taxonomy riêng nếu muốn taxonomy này được public ra ngoài
 **/
/*
register_taxonomys([
    'custom_taxonomy1' => [
        'name' => 'Custom taxonomy name',
        // cho phép lấy nhóm cha
        'set_parent' => true,
        'slug' => '',
        // mặc định public = on -> sẽ hiển thị ra ngoài
        //'public' => 'off',
    ],
    'custom_taxonomy2' => [
        'name' => 'Custom taxonomy name',
        // cho phép lấy nhóm cha
        'set_parent' => true,
        'slug' => '',
        // mặc định public = on -> sẽ hiển thị ra ngoài
        //'public' => 'off',
    ],
]);
*/

/**
 * đăng ký post type riêng nếu muốn post type này được public ra ngoài
 **/
/*
register_posts_type([
    'custom_post_type1' => [
        'name' => 'Custom type name',
        // mặc định public = on -> sẽ hiển thị ra ngoài
        //'public' => 'off',
    ],
    'custom_post_type2' => [
        'name' => 'Custom type name',
        // mặc định public = on -> sẽ hiển thị ra ngoài
        //'public' => 'off',
    ],
]);
*/

/**
 * đăng ký post meta riêng nếu muốn post meta này được public ra ngoài
 **/
/*
register_posts_meta([
    'custom_post_type1' => [
        'post_category' => [
            'name' => 'Danh mục',
        ],
        'custom_post_meta2' => [
            'name' => 'Custom meta name',
        ],
    ],
    'custom_post_type2' => [
        'post_category' => [
            'name' => 'Danh mục',
        ],
        'custom_post_meta2' => [
            'name' => 'Custom meta name',
        ],
    ],
]);
*/

/**
 * đăng ký user type riêng nếu muốn, user type này sẽ có trong select select trong admin khi sửa quyền tài khoản
 **/
/*
register_users_type([
    'custom_user_type1' => [
        'name' => 'Custom type name',
        // Khi có tham số này -> custom type sẽ được thêm vào admin menu
        'controller' => 'admin_controller',
    ],
    'custom_user_type2' => [
        'name' => 'Custom type name',
        // Khi có tham số này -> custom type sẽ được thêm vào admin menu
        'controller' => 'admin_controller',
    ],
]);
*/

// URL tùy chỉnh của từng tags hoặc custom taxonomy
//define('WGR_CUS_TAX_PERMALINK', []);