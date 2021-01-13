<?php
/**
 * 菜单栏配置
 * User: Woozee
 * Date: 2020/10/29
 * Time: 11:10
 */

return [
    [
        'id' => 100,
        'title' => '文章管理',
        'icon' => 'mdi-file-outline',
        'children' => [
            [
                'id' => 100001,
                'title' => '文章列表',
                'route' => '/admin/article',
            ],
            [
                'id' => 100002,
                'title' => '发布文章',
                'route' => '/admin/article/add',
            ],
        ],
    ],
    [
        'id' => 200,
        'title' => '评论管理',
        'icon' => 'mdi-message-outline',
        'route' => '/admin/comment',
    ],
    [
        'id' => 300,
        'title' => '分类管理',
        'icon' => 'mdi-bullseye-arrow',
        'route' => '/admin/category',
    ],
    [
        'id' => 400,
        'title' => '标签管理',
        'icon' => 'mdi-label-outline',
        'route' => '/admin/label',
    ],
    [
        'id' => 500,
        'title' => '友情链接',
        'icon' => 'mdi-link',
        'route' => '/admin/friendlink',
    ],
    [
        'id' => 600,
        'title' => '七牛云资源',
        'icon' => 'mdi-cloud-upload',
        'route' => '/admin/qiniu',
    ],
//    [
//        'id' => 700,
//        'title' => '图片管理',
//        'icon' => 'mdi-image-outline',
//        'route' => '/admin/image',
//    ],
    [
        'id' => 800,
        'title' => '系统管理',
        'icon' => 'mdi-cog-outline',
        'children' => [
            [
                'id' => 800001,
                'title' => '系统设置',
                'route' => '/admin/system/config',
            ],
        ],
    ],
];
