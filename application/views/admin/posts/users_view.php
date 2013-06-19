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
                                <th>Edycja</th>
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
                                        <td><?php echo $posts[$x]->usertype; ?></td>
                                        <td><?php echo $posts[$x]->confirmation; ?></td>
                                        <td> <a href="<?php echo base_url() ?>admin/prawa/edit_acount/<?php echo $posts[$x]->id; ?>" title="Edytuj post" id="edit"><i class="icon icon-edit icon-large"></i></a></td>
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