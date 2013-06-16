<?php $this->load->view("admin/header_view"); ?>
<div class="container-fluid">
    <div class="row-fluid">

        <div class="span9">
            <div class="main">
                <div class="row-fluid">

                    <h2>Formularz rejestracji</h2>
                    <form method="POST" action="" id="registerform">
                        <p>

                        <div id="messages"></div>
                        <br />
                        </p>

                        <p>
                            <label for="firstname"  class="required"><strong>Login </strong></label>
                            <input type="text" class="input input-large span5" id="login" name="login" value="" />
                        </p>


                        <p>
                            <label for="newpassword"  class="required"><strong>Hasło </strong></label>
                            <input type="password" class="input input-large span5" id="newpassword" name="newpassword" value="" />
                        </p>


                        <p>
                            <label for="firstname"  class="required"><strong>Imię </strong></label>
                            <input type="text" class="input input-large span5" id="firstname" name="firstname" value="" />
                        </p>
                        <p>
                            <label for="lastname"  class="required"><strong>Nazwisko </strong></label>
                            <input type="text" class="input input-large span5" id="lastname" name="lastname" value="" />
                        </p>


                        <p>
                            <label for="email" class="required"><strong>Email </strong></label>
                            <input type="text" class="input input-large span5" id="email" name="email" value="" />
                        </p>

                        <p>
                            <label for="contact" class="required"><strong>Telefon kontaktowy </strong></label>
                            <input type="text" class="input input-large span5" id="contact" name="contact" title="(code) Numer" value="" />
                        </p>

                        <p>
                            <label for="address" class="required"><strong>Adres </strong></label>
                            <input type="text" class="input input-large span5" id="address" name="address" value="" />
                        </p>

                        <p>
                            <button class="btn btn-success" type="submit" id="save">Zarejestruj</button>
                        </p>
                    </form>
                </div><!--/row-->
            </div><!--/main-->
        </div><!--/span-->
    </div><!--/row-->
</div><!--/.fluid-container-->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="myModalLabel">Result</h3>
    </div><div class="modal-body"></div><div class="modal-footer"><button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Ok</button></div></div>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/fileuploader.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/profile.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/bootstrap-transition.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/bootstrap-tooltip.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/bootstrap-collapse.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/bootstrap-modal.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.min.js"></script>
<?php $this->load->view("admin/footer_view"); ?>