<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Panel administratora</a>
          <div class="nav-collapse collapse">

            <ul class="nav pull-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-user icon-white"></i> <?php echo $this->session->userdata('username');?> <b class="caret"></b>
                </a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url();?>admin/settings"><i class="icon-user"></i> Profi</a></li>
                      <li><a href="<?php echo base_url();?>admin/settings/account"><i class="icon-cog"></i> Ustawienia konta</a></li>
                      <li><a href="<?php echo base_url();?>logout"><i class="icon-signout"></i> Wyloguj</a></li>
                    </ul>
              </li>
            </ul>

            <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>admin/dashboard">Tablica</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
</div>