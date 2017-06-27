<el-menu default-active="2-1">
	<el-submenu index="1">
		<template slot="title"><i class="el-icon-document"></i>{{ trans('order.andCustomer') }}</template>
		<a href="#"><el-menu-item index="1-1">{{ trans('room.status') }}</el-menu-item></a>
		<a href="#"><el-menu-item index="1-2">{{ trans('order.mgr')   }}</el-menu-item></a>
		<a href="#"><el-menu-item index="1-3">{{ trans('admin.userMail')  }}</el-menu-item></a>
	</el-submenu>
	<el-submenu index="2">
		<template slot="title"><i class="el-icon-menu"></i>{{ trans('product.mgr') }}</template>
		<a href="/admin/room"><el-menu-item index="2-1">   {{ trans('room.typeMgr') }}</el-menu-item></a>
		<a href="/admin/product"><el-menu-item index="2-2">{{ trans('product.others') }}</el-menu-item></a>
		<a href="#"><el-menu-item index="2-3">{{ trans('admin.discounts')}}</el-menu-item></a>
	</el-submenu>
	<el-submenu index="3">
		<template slot="title"><i class="el-icon-setting"></i>{{ trans('admin.webInfo') }}</template>
		<a href="#"><el-menu-item index="3-1">{{ trans('admin.siteInfo')    }}</el-menu-item></a>
		<a href="#"><el-menu-item index="3-2">{{ trans('admin.homeSetting') }}</el-menu-item></a>
		<a href="#"><el-menu-item index="3-3">{{ trans('admin.aboutHouse')  }}</el-menu-item></a>
		<a href="#"><el-menu-item index="3-4">{{ trans('admin.traffic')     }}</el-menu-item></a>
	</el-submenu>
</el-menu>
