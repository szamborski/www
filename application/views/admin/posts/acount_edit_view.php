<?php $this->load->view("admin/header_view"); ?>
<?php $this->load->view("admin/top_menu/top_nav_view"); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <?php
        $this->load->view("admin/sidebar/sidebar_profile_view");
        ?>
        <div class="span9">
            <div class="main">
                <div class="row-fluid">
                    <div class="page-header">
                        <h2>Aktualizacja kont uzytkowników</h2>
                    </div>
                    <div class="input-form">
                        <form method="POST" action="" id="profileupdateview">

                            <p><label for="title" class="required"><strong>Login</strong></label>
                                <input type="text" class="input input-xxlarge" name="login" id="login" value="<?php echo $info[0]->username; ?>" />
                            </p>
                            <p><label for="title" class="required"><strong>Imię</strong></label>
                                <input type="text" class="input input-xxlarge" name="firstname" id="firstname" value="<?php echo $info[0]->firstname; ?>" />
                            </p>
                            <p><label for="title" class="required"><strong>Nazwisko</strong></label>
                                <input type="text" class="input input-xxlarge" name="lastname" id="lastname" value="<?php echo $info[0]->lastname; ?>" />
                            </p>
       

                            <p><label for="title" class="required"><strong>Typ konta</strong></label>
                                <select name = "usertype"  id="usertype"  class="input input-xxlarge"> <?php if ($info[0]->usertype == 'admin') { ?>

                                        <option value = "regular" >Użytkownik</option>
                                        <option value = "admin" selected>Administrator</option>
                                    <?php } else { ?>
                                        <option value = "regular" select >Użytkownik</option>
                                        <option value = "admin" >Administrator</option>
                                    <?php }
                                    ?></select></p>

                            <p>  
                                <label for="title" class="required"><strong>Czy potwierdzony ?</strong></label>
                                <select name = "confirmation" id="confirmation" class="input input-xxlarge">
                                    <?php if ($info[0]->confirmation == 1) { ?>
                                        <option value = "0" >NIE</option>
                                        <option value = "1" selected>TAK</option>
                                    <?php } else { ?>
                                        <option value = "0" select >NIE</option>
                                        <option value = "1" >TAK</option>
                                    <?php } ?> </select></p>




                            <p>
                                <input type="hidden" name="id" id="id" value="<?php echo $info[0]->id; ?>" />
                                <button type="submit" class="btn btn-primary" id="save">Aktualizuj profil</button>
                            </p>


                        </form>
                    </div>
                </div><!--/row-->
            </div><!--/main-->
        </div><!--/span-->
    </div><!--/row-->
    <hr>
    <footer>
        <p>&copy; <?= COMPANY_NAME ?> <?= date('Y') ?></p>
    </footer>
</div><!--/.fluid-container-->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="myModalLabel"></h3>
    </div><div class="modal-body"></div><div class="modal-footer"><button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Ok</button></div></div>
<script type="text/javascript" src="<?=base_url()?>js/jquery.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/fileuploader.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/profile.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/bootstrap-transition.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/bootstrap-tooltip.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/bootstrap-collapse.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/bootstrap-modal.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.validate.min.js"></script>
</body>
</html>