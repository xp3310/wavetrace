	<el-menu default-active="2-1">
		<el-submenu index="1">
			<template slot="title"><i class="el-icon-document"></i>訂單與顧客</template>
			<el-menu-item index="1-1">訂房狀況</el-menu-item>
			<el-menu-item index="1-2">訂單管理</el-menu-item>
			<el-menu-item index="1-3">顧客信件</el-menu-item>
		<!-- 	<el-submenu index="1-4">
				<template slot="title">item four</template>
				<el-menu-item index="1-4-1">item one</el-menu-item>
			</el-submenu> -->
		</el-submenu>
		<el-submenu index="2">
			<template slot="title"><i class="el-icon-menu"></i>產品管理</template>
			<el-menu-item index="2-1"><a href="/admin/room">房型管理</a></el-menu-item>
			<el-menu-item index="2-2">其他服務、商品</el-menu-item>
			<el-menu-item index="2-3">優惠方案</el-menu-item>
		</el-submenu>
		<el-submenu index="3">
			<template slot="title"><i class="el-icon-setting"></i>網站資訊</template>
			<el-menu-item index="3-1">基本資訊</el-menu-item>
			<el-menu-item index="3-2">首頁設定</el-menu-item>
			<el-menu-item index="3-3">關於民宿</el-menu-item>
			<el-menu-item index="3-4">交通方式</el-menu-item>
		</el-submenu>
	</el-menu>
