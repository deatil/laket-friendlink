<?php

use think\facade\Route;
use Laket\Admin\Facade\Flash;

use Laket\Admin\Friendlink\Controller\Admin\Friendlink;
use Laket\Admin\Friendlink\Controller\Admin\FriendlinkCate;

/**
 * 插件路由
 */
Flash::routes(function() {
    // 分类
    Route::get('friendlink/cate/index', FriendlinkCate::class . '@index')->name('admin.friendlink-cate.index');
    Route::get('friendlink/cate/add', FriendlinkCate::class . '@add')->name('admin.friendlink-cate.add');
    Route::post('friendlink/cate/add', FriendlinkCate::class . '@add')->name('admin.friendlink-cate.add-save');
    Route::get('friendlink/cate/edit', FriendlinkCate::class . '@edit')->name('admin.friendlink-cate.edit');
    Route::post('friendlink/cate/edit', FriendlinkCate::class . '@edit')->name('admin.friendlink-cate.edit-save');
    Route::post('friendlink/cate/delete', FriendlinkCate::class . '@delete')->name('admin.friendlink-cate.delete');
    Route::post('friendlink/cate/status', FriendlinkCate::class . '@status')->name('admin.friendlink-cate.status');
    Route::post('friendlink/cate/sort', FriendlinkCate::class . '@sort')->name('admin.friendlink-cate.sort');
    
    // 内容
    Route::get('friendlink/index', Friendlink::class . '@index')->name('admin.friendlink.index');
    Route::get('friendlink/add', Friendlink::class . '@add')->name('admin.friendlink.add');
    Route::post('friendlink/add', Friendlink::class . '@add')->name('admin.friendlink.add-save');
    Route::get('friendlink/edit', Friendlink::class . '@edit')->name('admin.friendlink.edit');
    Route::post('friendlink/edit', Friendlink::class . '@edit')->name('admin.friendlink.edit-save');
    Route::post('friendlink/delete', Friendlink::class . '@delete')->name('admin.friendlink.delete');
    Route::post('friendlink/status', Friendlink::class . '@status')->name('admin.friendlink.status');
    Route::post('friendlink/sort', Friendlink::class . '@sort')->name('admin.friendlink.sort');
});