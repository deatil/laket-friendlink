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
class Friendlink extends Validate 
{
    protected $rule = [
        'name' => 'require',
        'type' => 'require',
    ];
    
    protected $message = [
        'name.require' => '链接名称不能为空',
        'type.require' => '链接类型不能为空！',
    ];
    
    protected $scene = [
        'add' => [
            'name',
            'type',
        ],
        'edit' => [
            'name',
            'type',
        ]
    ];
}