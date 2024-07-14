<?php

declare (strict_types = 1);

namespace Laket\Admin\Friendlink;

use Laket\Admin\Facade\Flash;
use Laket\Admin\Flash\Menu;
use Laket\Admin\Flash\Service as BaseService;

class Service extends BaseService
{
    /**
     * 权限菜单 slug
     */
    protected $slug = 'laket-admin.flash.friendlink';
    
    /**
     * 启动
     */
    public function boot()
    {
        Flash::extend('laket/laket-friendlink', __CLASS__);
    }
    
    /**
     * 开始，只有启用后加载
     */
    public function start()
    {
        // 路由
        $this->loadRoutesFrom(__DIR__ . '/../resources/routes/admin.php');
        
        // 视图
        $this->loadViewsFrom(__DIR__ . '/../resources/view', 'laket-friendlink');
        
        // 导入帮助文件
        $this->loadFilesFrom(__DIR__ . '/helper.php');
        
        // 添加事件
        $this->addAction();
    }
    
    /**
     * 安装后
     */
    public function install()
    {
        $slug = $this->slug;
        $menus = include __DIR__ . '/../resources/menus/menus.php';
        
        // 添加菜单
        Menu::create($menus);
        
        // 数据库
        Flash::executeSql(__DIR__ . '/../resources/database/install.sql');
    }
    
    /**
     * 卸载后
     */
    public function uninstall()
    {
        Menu::delete($this->slug);
        
        // 数据库
        Flash::executeSql(__DIR__ . '/../resources/database/uninstall.sql');
    }
    
    /**
     * 更新后
     */
    public function upgrade()
    {}
    
    /**
     * 启用后
     */
    public function enable()
    {
        Menu::enable($this->slug);
    }
    
    /**
     * 禁用后
     */
    public function disable()
    {
        Menu::disable($this->slug);
    }
    
    /**
     * 添加事件
     */
    protected function addAction()
    {
        // 模版行为显示
        add_action('friendlink_html', function ($params) {
            if (!empty($param) && isset($param['cate'])) {
                $cate = $param['cate'];
            } else {
                $cate = '';
            }
            
            if (!empty($param) && isset($param['order'])) {
                $order = $param['order'];
            } else {
                $order = '';
            }
            
            $links = friendlink_links($cate, $order, true);
            
            $link_html = '';
            if (!empty($links)) {
                foreach ($links as $link) {
                    $link_html .= $link['url'];
                }
            }
            
            if (!empty($param) && isset($param['html'])) {
                $tpl = $param['html'];
                
                $html = str_replace([
                    '{link}',
                ], [
                    $link_html,
                ], $tpl);
            } else {
                $html = '
                    <div class="friendlink-container">
                        友情链接：'.$link_html.'
                    </div>    
                ';
            }
            
            echo $html;
        });

    }

}
