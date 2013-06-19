<?php
    $total_segments = $this->uri->total_segments();
    $segment = $this->uri->segment($total_segments);
    if(is_numeric($segment)) { $segment = $this->uri->segment($total_segments - 1); }
?>
<div class="span2">
  <div class="well sidebar-nav">
    <ul class="nav nav-list">
      <li class="nav-header">Blog</li>
      
       <?php $typ_konta = $this->session->userdata('typ_konta');?>
    
      <li class="<?php echo ($segment==='posts') ? 'active' : ''?>"><a href="<?=base_url().'admin/posts'?>"><i class="icon icon-pushpin"></i> Posty</a></li>
      <li class="<?php echo ($segment==='add-new') ? 'active' : ''?>"><a href="<?=base_url()?>admin/posts/add-new"><i class="icon icon-plus-sign"></i> Dodaj nowy wpis</a></li>
      <li class="nav-header"><b><?php echo "Typ konta : ";?> <?=$this->session->userdata('typ_konta')?> </br>
       <?php echo "Użytkownik : ";?> <?=$this->session->userdata('username')?>      </b></li>
      <li><a href="<?=base_url()?>admin/settings"><i class="icon icon-user"></i> Profil</a></li>
      <li><a href="<?=base_url()?>admin/settings/account"><i class="icon icon-cog"></i> Ustawienia konta</a></li>
      <?php 
      if($typ_konta == 'admin')
          { ?>
      <li><a href="<?=base_url()?>admin/prawa"><i class="icon icon-edit"></i>Zarządzaj prawami</a></li>   
       <?php  }?>
      <li><a href="<?=base_url()?>admin/logout"><i class="icon icon-signout"></i> Wyloguj</a></li>
    </ul>
  </div><!--/.well -->
</div><!--/span-->