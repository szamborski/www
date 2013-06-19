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
                        <h2>Istniejące konta w systemie</h2>
                    </div>

                    <table class="table table-stripped table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th>Imię</th>
                                <th>Nazwisko</th>
                                <th>Login</th>
                                <th>Typ Konta</th>
                                <th>Potwierdzony</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $limit = count($posts);
                            if ($limit > 0) {
                                for ($x = 0; $x < $limit; $x++) {
                                    //     $summary = strip_tags(html_entity_decode($posts[$x]->post));
                                    ?>
                                    <tr>


                                        <td><?php echo $posts[$x]->firstname; ?></td>
                                        <td><?php echo $posts[$x]->lastname; ?></td>
                                        <td><?php echo $posts[$x]->username; ?></td>
                                        <td><p>

                                            <form method="post" class="form-signin" id="modifityform">
                                                <input type="hidden" name="id" value="<? $x ?>" />
                                                <label for="firstname"  class="required"><strong>Imię </strong></label>
                                                <input type="text" class="input input-large span13" id="firstname" name="firstname" value="" />

                                                <label for="email" class="required"><strong>Email </strong></label>
                                                <input type="text" class="input input-large span13" id="email" name="email" value="" />
                                                <?php if ($posts[$x]->usertype == 'admin') { ?>
                                                    <select name = "select">
                                                        <option value = "regular" >Użytkownik</option>
                                                        <option value = "admin" selected>Administrator</option>
                                                    </select>

                                                <?php } else { ?>
                                                    <select name = "select">
                                                        <option value = "regular" select >Użytkownik</option>
                                                        <option value = "admin" >Administrator</option>
                                                    </select>
                                                <?php }
                                                ?> 
                                                <input type="submit" value="Submit" name="submit" class="btn btn-medium" id="submit" data-loading-text="Processing..." /> &nbsp;&nbsp;
                                            </form>
                                            </p></td>



                                        <?php $posts[$x]->usertype; ?>
                                        <td><p>
                                            <form method="post" action="" class="form-signin">
                                                <?php if ($posts[$x]->confirmation == 1) { ?>
                                                    <select name = "select">
                                                        <option value = "0" >NIE</option>
                                                        <option value = "1" selected>TAK</option>
                                                    </select>

                                                <?php } else { ?>
                                                    <select name = "select">
                                                        <option value = "0" select >NIE</option>
                                                        <option value = "1" >TAK</option>
                                                    </select>
                                                <?php } ?> 
                                                <input type="submit" value="Submit" name="submit" class="btn btn-medium" id="submit" data-loading-text="Processing..." /> &nbsp;&nbsp;
                                            </form>
                                            </p></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr><td colspan="6"><em>Nie znaleziono postów użytkownika</em></td></tr>
                                <?php
                            }
                            ?>




                        </tbody>
                    </table>
                    <?php echo $this->pagination->create_links(); ?>
                </div><!--/row-->
            </div><!--/main-->
        </div><!--/span-->
    </div><!--/row-->



    <hr>



    <?php
    $atts = array(
        'width' => '600',
        'height' => '700',
        'scrollbars' => 'yes',
        'status' => 'yes',
        'resizable' => 'no',
        'screenx' => '0',
        'screeny' => '0'
    );
    ?>
    <div class="container-fluid">
        <div class="row-fluid">

            <div class="span9">
                <div class="main2">
                    <div class="row-fluid">

                        <h10>Formularz rejestracji</h10>
                        <form method="POST" action="" id="modifityform3">
                            <p>

                            <div id="messages"></div>
                            <br />
                            </p>
                            <p>
                                <label for="email" class="required"><strong>Email </strong></label>
                                <input type="text" class="input input-large span13" id="email" name="email" value="" />
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



    <footer>
        <p>&copy; <?php echo COMPANY_NAME; ?> <?php echo date('Y'); ?></p>
    </footer>
</div><!--/.fluid-container-->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="myModalLabel"></h3>
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
</body>
</html>