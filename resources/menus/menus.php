<?php

return [
    "title" => "友情链接",
    "url" => "friendlink/index",
    "method" => "GET",
    "slug" => $slug,
    "menu_show" => 1,
    "icon" => "icon-shiyongwendang",
    "remark" => "",
    "listorder" => 115,
    "children" => [
        [
            "title" => "链接管理",
            "url" => "friendlink/index",
            "method" => "GET",
            "slug" => "admin.friendlink.index",
            "menu_show" => 1,
            "icon" => "icon-shiyongwendang",
            "listorder" => 15,
            "children" => [
                [
                    "title" => "链接管理",
                    "url" => "friendlink/index",
                    "method" => "GET",
                    "slug" => "admin.friendlink.index",
                    "listorder" => 15,
                    "menu_show" => 0,
                ],
                [
                    "title" => "添加链接",
                    "url" => "friendlink/add",
                    "method" => "GET",
                    "slug" => "admin.friendlink.add",
                    "listorder" => 14,
                    "menu_show" => 0,
                ],
                [
                    "title" => "添加链接",
                    "url" => "friendlink/add",
                    "method" => "POST",
                    "slug" => "admin.friendlink.add-save",
                    "listorder" => 13,
                    "menu_show" => 0,
                ],
                [
                    "title" => "编辑链接",
                    "url" => "friendlink/edit",
                    "method" => "GET",
                    "slug" => "admin.friendlink.edit",
                    "listorder" => 12,
                    "menu_show" => 0,
                ],
                [
                    "title" => "编辑链接",
                    "url" => "friendlink/edit",
                    "method" => "GET",
                    "slug" => "admin.friendlink.edit-save",
                    "listorder" => 11,
                    "menu_show" => 0,
                ],
                [
                    "title" => "删除链接",
                    "url" => "friendlink/delete",
                    "method" => "POST",
                    "slug" => "admin.friendlink.delete",
                    "listorder" => 10,
                    "menu_show" => 0,
                ],
                [
                    "title" => "设置状态",
                    "url" => "friendlink/status",
                    "method" => "POST",
                    "slug" => "admin.friendlink.status",
                    "listorder" => 9,
                    "menu_show" => 0,
                ],
                [
                    "title" => "设置排序",
                    "url" => "friendlink/sort",
                    "method" => "POST",
                    "slug" => "admin.friendlink.sort",
                    "listorder" => 8,
                    "menu_show" => 0,
                ],
            ],
        ],
        
        [
            "title" => "分类管理",
            "url" => "friendlink/cate/index",
            "method" => "GET",
            "slug" => "admin.friendlink-cate.index",
            "icon" => "icon-shiyongwendang",
            "menu_show" => 1,
            "listorder" => 10,
            "children" => [
                [
                    "title" => "分类管理",
                    "url" => "friendlink/cate/index",
                    "method" => "GET",
                    "slug" => "admin.friendlink-cate.index",
                    "listorder" => 15,
                    "menu_show" => 0,
                ],
                [
                    "title" => "添加分类",
                    "url" => "friendlink/cate/add",
                    "method" => "GET",
                    "slug" => "admin.friendlink-cate.add",
                    "listorder" => 14,
                    "menu_show" => 0,
                ],
                [
                    "title" => "添加分类",
                    "url" => "friendlink/cate/add",
                    "method" => "POST",
                    "slug" => "admin.friendlink-cate.add-save",
                    "listorder" => 13,
                    "menu_show" => 0,
                ],
                [
                    "title" => "编辑分类",
                    "url" => "friendlink/cate/edit",
                    "method" => "GET",
                    "slug" => "admin.friendlink-cate.edit",
                    "listorder" => 12,
                    "menu_show" => 0,
                ],
                [
                    "url" => "friendlink/cate/edit",
                    "method" => "POST",
                    "slug" => "admin.friendlink-cate.edit-save",
                    "listorder" => 11,
                    "menu_show" => 0,
                    "title" => "编辑分类",
                ],
                [
                    "title" => "删除分类",
                    "url" => "friendlink/cate/delete",
                    "method" => "POST",
                    "slug" => "admin.friendlink-cate.delete",
                    "listorder" => 10,
                    "menu_show" => 0,
                ],
                [
                    "title" => "设置状态",
                    "url" => "friendlink/cate/status",
                    "method" => "POST",
                    "slug" => "admin.friendlink-cate.status",
                    "listorder" => 9,
                    "menu_show" => 0,
                ],
                [
                    "title" => "设置排序",
                    "url" => "friendlink/cate/sort",
                    "method" => "POST",
                    "slug" => "admin.friendlink-cate.sort",
                    "listorder" => 8,
                    "menu_show" => 0,
                ],

            ],
        ],
    ],
];