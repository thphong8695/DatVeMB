<!-- Horizontal-menu -->
<div class="horizontal-main hor-menu clearfix">
	<div class="horizontal-mainwrapper container clearfix">
		<nav class="horizontalMenu clearfix">
			<ul class="horizontalMenu-list">
				<li aria-haspopup="true"><a href="{{ route('datvemb.index') }}" class="sub-icon {{Request::is('datvemb*') ? 'active' : '' }}"><i class="fa fa-windows"></i>Đặt vé</a>
				</li>
			</ul>
			@can('hangbay-list')
			<ul class="horizontalMenu-list">
				<li aria-haspopup="true"><a href="{{ route('hangbay.index') }}" class="sub-icon {{Request::is('hangbay*') ? 'active' : '' }}"><i class="fa fa-space-shuttle"></i>Hãng bay</a>
				</li>
			</ul>
			@endcan
			@can('user-list')
			<ul class="horizontalMenu-list">
				<li aria-haspopup="true"><a href="{{ route('users.index') }}" class="sub-icon {{Request::is('users*') ? 'active' : '' }}"><i class="fa fa-user"></i>User</a>
				</li>
			</ul>
			@endcan
			@can('role-list')
			<ul class="horizontalMenu-list">
				<li aria-haspopup="true"><a href="{{ route('roles.index') }}" class="sub-icon {{Request::is('roles*') ? 'active' : '' }}"><i class="fa fa-database"></i>Role</a>
				</li>
			</ul>
			@endcan
			@can('datvemb-export')
			<ul class="horizontalMenu-list">
				<li aria-haspopup="true"><a href="{{ route('datvemb.getExport') }}" class="sub-icon {{Request::is('datvemb-view-export*') ? 'active' : '' }}"><i class="fa fa-folder-open"></i>Export</a>
				</li>
			</ul>
			@endcan
		</nav>
		<!--Nav end -->
	</div>
</div>