<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo site_url('/dashboard'); ?>">Aplikasi Penggajian</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="no-dropdown"><a href="<?php echo site_url('/dashboard'); ?>">Beranda</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $this->session->userdata('pengguna')->nama;?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('/account/ubah_password'); ?>">Ubah Password</a></li>
						<li><a href="<?php echo site_url('/site/logout'); ?>">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>