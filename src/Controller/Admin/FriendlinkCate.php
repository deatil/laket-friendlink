<?php

declare (strict_types = 1);

namespace Laket\Admin\Friendlink\Controller\Admin;

use Laket\Admin\Friendlink\Model\FriendlinkCate as FriendlinkCateModel;

/**
 * 友情链接分类
 *
 * @create 2024-7-13
 * @author deatil
 */
class FriendlinkCate extends Base 
{    
    /**
     * 列表
     */
    public function index() 
    {
        if ($this->request->isAjax()) {
            $limit = $this->request->param('limit/d', 20);
            $page = $this->request->param('page/d', 1);
            $map = $this->buildparams();
            
            $data = FriendlinkCateModel::where($map)
                ->order("sort DESC, id DESC")
                ->page($page, $limit)
                ->select()
                ->toArray();
            $total = FriendlinkCateModel::where($map)
                ->count();

            $result = [
                "code" => 0, 
                "count" => $total, 
                "data" => $data,
            ];
            return json($result);
        } else {            
            return $this->fetch("laket-friendlink::friendlink-cate.index");
        }
    }

    /**
     * 添加
     */
    public function add() 
    {
        if (request()->isPost()) {
            $data = request()->post();
            $validate = $this->validate($data, '\\Laket\\Admin\\Friendlink\\Validate\\FriendlinkCate.add');
            if (true !== $validate) {
                return $this->error($validate);
            }
            
            $data = array_merge($data, [
                'add_time' => time(),
                'add_ip' => request()->ip(),
            ]);
            
            $result = FriendlinkCateModel::create($data);
            if (false === $result) {
                return $this->error('添加失败！');
            }
            
            return $this->success('添加成功！');
        } else {
            return $this->fetch("laket-friendlink::friendlink-cate.add");
        }
    }

    /**
     * 编辑
     */
    public function edit() 
    {
        if (request()->isPost()) {
            $data = request()->post();
            $validate = $this->validate($data, '\\Laket\\Admin\\Friendlink\\Validate\\FriendlinkCate.edit');
            if (true !== $validate) {
                return $this->error($validate);
            }
            
            $id = request()->post('id');
            if (empty($id)) {
                return $this->error('ID错误！');
            }
            
            $info = FriendlinkCateModel::where([
                    'id' => $id,
                ])
                ->find();
            if (empty($info)) {
                return $this->error('链接分类不存在！');
            }
            
            $data = array_merge($data, [
                'edit_time' => time(),
                'edit_ip' => request()->ip(),
            ]);
            
            $result = FriendlinkCateModel::where([
                    'id' => $id,
                ])
                ->update($data);
            if (false === $result) {
                return $this->error('修改失败！');
            }
            
            return $this->success('修改成功！');
        } else {
            $id = request()->param('id');
            if (empty($id)) {
                return $this->error('ID错误！');
            }
            
            $info = FriendlinkCateModel::where([
                    'id' => $id ,
                ])
                ->find();

            $this->assign([
                'info' => $info,
            ]);
            
            return $this->fetch("laket-friendlink::friendlink-cate.edit");
        }
    }

    /**
     * 删除
     */
    public function delete($id = '') 
    {
        $info = FriendlinkCateModel::where([
                'id' => $id,
            ])
            ->find();
        if (empty($info)) {
            return $this->error('链接分类不存在！');
        }
        
        $result = FriendlinkCateModel::where([
                'id' => $id,
            ])
            ->delete();
        if (false === $result) {
            return $this->error('删除失败！');
        }
        
        return $this->success('删除成功！');
    }
    
    /**
     * 修改状态
     */
    public function status() 
    {
        $id = request()->param('id');
        $status = input('status', '0', 'trim,intval');

        if (!$id) {
            return $this->error("非法操作！");
        }

        $result = FriendlinkCateModel::where([
                'id' => $id,
            ])
            ->data([
                'status' => $status,
            ])
            ->update();
        if (false === $result) {
            return $this->error("设置失败！");
        }
        
        return $this->success("设置成功！");
    } 
    
    /**
     * 排序
     */
    public function sort() 
    {
        $id = request()->param('id');
        $value = request()->param('value', '100', 'trim,intval');

        if (! $id) {
            return $this->error("非法操作！");
        }

        $result = FriendlinkCateModel::where([
                'id' => $id,
            ])
            ->update([
                'sort' => $value,
            ]);
        if (false === $result) {
            return $this->error("排序设置失败！");
        }
        
        return $this->success("排序设置成功！");
    } 

}