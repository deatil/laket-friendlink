<?php

declare (strict_types = 1);

namespace Laket\Admin\Friendlink\Model;

use think\Model as BaseModel;

/**
 * 内容
 *
 * @create 2024-7-13
 * @author deatil
 */
class Friendlink extends BaseModel
{
    // 数据表名称
    protected $name = 'friendlink';
    
    // 主键名
    protected $pk = 'id';
    
    // 时间字段取出后的默认时间格式
    protected $dateFormat = false;
    
    // 追加字段
    protected $append = [
        'contents',
    ];
    
    public static function onBeforeInsert($model)
    {
        $model->setAttr('edit_time', time());
        $model->setAttr('edit_ip', request()->ip());
        $model->setAttr('add_time', time());
        $model->setAttr('add_ip', request()->ip());
    }
    
    public static function onBeforeUpdate($model)
    {
        $model->setAttr('edit_time', time());
        $model->setAttr('edit_ip', request()->ip());
    }
    
    /**
     * 分类
     */
    public function cate()
    {
        return $this->hasOne(FriendlinkCate::class, 'id', 'cate_id');
    }
}
