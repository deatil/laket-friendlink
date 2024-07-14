<?php

declare (strict_types = 1);

namespace Laket\Admin\Friendlink\Validate;

use think\Validate;

/**
 * 设置模型
 *
 * @create 2024-7-13
 * @author deatil
 */
class FriendlinkCate extends Validate 
{
    protected $rule = [
        'name' => 'require|unique:FriendlinkCate|/^[a-zA-Z\w]{0,39}$/',
        'title' => 'require',
    ];
    
    protected $message = [
        'name.require' => '分类标识不能为空',
        'name.unique' => '分类标识已存在',
        'title.require' => '分类名称不能为空！',
    ];
    
    protected $scene = [
        'add' => [
            'name',
            'title',
        ],
        'edit' => [
            'name',
            'title',
        ]
    ];
}