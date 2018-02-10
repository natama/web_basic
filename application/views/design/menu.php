<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?=base_url('dashboard');?>" class="navbar-brand"><b>Web</b> - Basic</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
			<ul class="nav navbar-nav">
					<?php
					$this->db->select("a.*, b.*");
					$this->db->from("tb_menu a");
					$this->db->join('tb_menu_user b','a.id_menu=b.id_menu');
					$this->db->where("kat_menu", 0);
					$this->db->where("b.id_user", $this->session->userdata('userid'));
					$query = $this->db->get();

					foreach ($query->result() as $row)
					{

					  $this->db->select("*");
					  $this->db->from("tb_menu");
					  $this->db->where("kat_menu", $row->id_menu);
					  $sub = $this->db->get();

					  if($sub->num_rows() > 0){

						echo '<li class="dropdown">';
						echo '<a href="'.base_url().''.$row->link.'" class="dropdown-toggle" data-toggle="dropdown">';
						echo '<i class="'.$row->icon.'"></i> <span>'.$row->nama_menu.'</span> <i class="fa fa-sort-down pull-right"></i>';
						echo '</a>';
						echo '<ul class="dropdown-menu" role="menu">';

						  foreach ($sub->result() as $key) {
							echo '<li><a href="'.base_url().''.$key->link.'"><i class="'.$key->icon.'"></i> '.$key->nama_menu.'</a></li>';
						  }
						  
						
						echo '</ul>';
						echo '</li>';
				 


					  }
					  else{

						  echo '<li>';
							echo '<a href="'.base_url().''.$row->link.'">';
							  echo '<i class="'.$row->icon.'"></i> <span>'.$row->nama_menu.'</span>';
							echo '</a>';
						  echo '</li>';

					  }


					}


					?> 


					<?php $level = $this->session->userdata('level');
						if($level==1){
					?>

					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="fa fa-user-secret"></span>  Administrator  <span class="fa fa-sort-down pull-right"></span>
					  </a>
					  <ul class="dropdown-menu">
						<li><a href="<?=base_url('users');?>"><i class="fa fa-user-plus"></i> <span>Management User</span></a></li>
					  </ul>
					</li>
					<?php
					  }
					?>

				<li>
				  <a href="<?=base_url('laporan/laporan');?>">
					<i class="fa fa-file-text-o"></i> <span>Laporan</span>
				  </a>
				</li>
			</ul>
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
				</div>
			</form>
			<ul class="nav navbar-nav pull-right">
				<!-- User Account Menu -->
				<li class="dropdown user user-menu">
				  <!-- Menu Toggle Button -->
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<!-- The user image in the navbar-->
					<img src="<?=base_url('assets/dist/img/user.jpg');?>" class="user-image" alt="User Image"/>
					  <span class="hidden-xs">Selamat Datang, <b><?php echo $this->session->userdata('nama');?></b></span>
				  </a>
				  <ul class="dropdown-menu">
					  <!-- User image -->
					  <li class="user-header">
						<img src="<?=base_url('assets/dist/img/User-blue.png');?>" class="img-circle" alt="User Image" />
						<p>
						  <?php echo $this->session->userdata('username');?> - <?php echo $this->session->userdata('jabatan');?>
						  <small>Member Since : <?php echo $this->session->userdata('time');?></small>
						</p>
					  </li>
					  <!-- Menu Footer-->
					  <li class="user-footer">
						<div class="pull-right">
						  <a href="<?=base_url('access/logout');?>" class="btn btn-default btn-flat">Sign out</a>
						</div>
					  </li>
					</ul>
				</li>
			</ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>