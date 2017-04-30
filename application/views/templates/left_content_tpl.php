<div class="col-sm-3 col-md-2 sidebar">
	<div class="breadLine">            
		<div class="arrow"></div>
		<div class="adminControl active"> Info Login User </div>
	</div>
	<div class="admin">
		<div class="image">
			<?php 
			if ($this->session->userdata('pengguna')->foto != '') $img_photo = $this->session->userdata('pengguna')->foto;
			else $img_photo = "foto_default.jpg"; 
			?>
			<img src="<?php echo base_url('foto/foto_pengguna/thumbnails/'.$img_photo); ?>" class="img-responsive img-thumbnail" alt="Responsive image" />
		</div>
		<ul class="control"> 
			<li><span class="glyphicon glyphicon-user"></span>  <?php echo $this->session->userdata('pengguna')->nama; ?></li>               
			<li><span class="glyphicon glyphicon-log-out"></span>  <a href="<?php echo site_url('/site/logout'); ?>">Logout</a></li>
		</ul>
	</div>
	<ul class="navigation">
		<?php
		$id_pengguna_grup = $this->session->userdata('pengguna')->id_pengguna_grup;
		$query = "
			SELECT m.*, ma.id AS id_menu_akses 
			FROM menu AS m 
			JOIN (SELECT * FROM menu_akses WHERE id_pengguna_grup = '{$id_pengguna_grup}') AS ma 
			ON ma.id_menu = m.id 
			WHERE m.id_menu_induk = 0
			ORDER BY m.id	
		";
		$parents = $this->db->query($query);
		if($parents->num_rows() > 0) :
			foreach ($parents->result() as $parent) :
		?>
				<li class="openable">
					<a href="<?php echo site_url($parent->uri); ?>"><span class="isw-list"></span><span class="text"><?php echo $parent->nama; ?></span></a>
					<?php
						$query = "
							SELECT m.*, ma.id AS id_menu_akses 
							FROM menu AS m 
							JOIN (SELECT * FROM menu_akses WHERE id_pengguna_grup = '{$id_pengguna_grup}') AS ma 
							  ON ma.id_menu = m.id 
							WHERE m.id_menu_induk = '{$parent->id}'
							ORDER BY m.id 		
						";
						$childs = $this->db->query($query);
					?>
					<ul>
						<?php foreach($childs->result() as $child) : ?>
							<li><a href="<?php echo site_url($child->uri); ?>"><span class="text"><span class="fa fa-tags"></span> <?php echo $child->nama; ?></span></a></li>
						<?php endforeach; ?>
					</ul>
				</li>
		<?php
			endforeach;
		endif;
		?>
	</ul>
	
	<div class="dr"><span></span></div>
	
</div>