<?php

use think\facade\Event;

use Laket\Admin\Friendlink\Model\Friendlink as FriendlinkModel;
use Laket\Admin\Friendlink\Model\FriendlinkCate as FriendlinkCateModel;

/**
 * 分类列表
 */
function friendlink_cates($order = '') 
{
    if (empty($order)) {
        $order = "sort ASC, id DESC";
    }
    
    $map = [
        ['status', '=', 1],
    ];
    $data = DFriendlinkCateModel::field("name,title,description")
        ->where($map)
        ->order($order)
        ->select()
        ->toArray();

    return $data;
}

/**
 * 链接列表
 */
function friendlink_links($cate = '', $order = '', $html = false) 
{
    if (empty($order)) {
        $order = "sort DESC, id DESC";
    }
    
    $map = [
        ['status', '=', 1],
    ];
    
    if (!empty($cate)) {
        if (strpos($cate, ',') !== false) {
            $map[] = ['name', 'in', explode(',', $cate)];
        } else {
            $map[] = ['name', '=', $cate];
        }
    }
    
    $data = FriendlinkModel::with(['cate'])
        ->where($map)
        ->order($order)
        ->select()
        ->toArray();
    
    if (!empty($data)) {
        foreach ($data as $k => $v) {
            $data[$k]['logo'] = laket_attachment_url($v['logo']);
            if ($html) {
                $data[$k]['url'] = sprintf(
                    '<a href="%s" target="%s" title="%s">%s</a>',
                    $v['url'],
                    $v['target'],
                    $v['description'],
                    $v['name']
                );
            }
        }
    }

    return $data;
}

/**
 * 链接列表显示
 */
function friendlink_links_html($html = '', $cate = '', $order = '') 
{
    $links = lfriendlink_links($cate, $order, true);
    
    $link_html = '';
    if (!empty($links)) {
        foreach ($links as $link) {
            if (!empty($html)) {
                $link_html = str_replace([
                    '{url}',
                    '{target}',
                    '{name}',
                    '{description}',
                    '{logo}',
                    '{type}',
                    '{cate_name}',
                    '{cate_title}',
                ], [
                    $link['url'],
                    $link['target'],
                    $link['name'],
                    $link['description'],
                    $link['logo'],
                    $link['type'],
                    $link['cate']['name'] ?? '',
                    $link['cate']['title'] ?? '',
                ], $html);
            } else {
                $link_html .= $link['url'];
            }
        }
    }
    
    return $link_html;
}
