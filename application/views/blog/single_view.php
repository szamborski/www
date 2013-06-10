<?php
$this->load->view('blog/header_view');
$this->load->view("blog/sidebar_view");
?>
<div class="posts span8">
    <div class="page-header">
        <h2><a href="<?php echo base_url() . $posts['post'][0]->url; ?>"><?php echo ucwords($posts['post'][0]->title); ?></a></h2>
    </div>
    <?php echo html_entity_decode($posts['post'][0]->post) ?>
</div>
<div id="single-view" class="span8">
    <ul>
        <li><strong>Autor:</strong> <?php echo $posts['post'][0]->username; ?></li>
        <li><strong>Data opublikowania:</strong> <?php
            echo
            dateV('l j f Y', strtotime($posts['post'][0]->entry_date));
            //date('F d, Y', strtotime($posts['post'][0]->entry_date));
            ?></li>
    </ul>
</div>
<div class="span8">
    <h4>Komentarze</h4>
    <?php
    $total = count($posts['blog_comments']);
    for ($x = 0; $x < $total; $x++) {
        ?>
        <div class="well well-small" id="comment-wrapper">
            <ul>
                <li><strong><?php echo $posts['blog_comments'][$x]->name; ?></strong></li>
                <li><small><?php
                        echo
                        dateV('l j f Y H:i', strtotime($posts['blog_comments'][$x]->comment_date));
                     //   date('F d, Y H:i', strtotime($posts['blog_comments'][$x]->comment_date));
                        ?></small></li>
            </ul>
            <hr />
            <?php echo $posts['blog_comments'][$x]->comment; ?>
        </div>
        <?php
    }
    ?>
</div>




<div class="span8" id="comment"><hr />
    <?php
    $errors = $this->session->flashdata('errors');
    if (!empty($errors)) {
        ?>
        <div class="alert alert-error">
            <?php echo $this->session->flashdata('errors'); ?>
        </div>
    <?php } ?>
    <?php echo form_open(base_url() . 'blog/comment'); ?>
    <p>
        <label class="required" for="name"><strong>Nick: </strong></label>
        <input type="text" class="input input-xlarge" name="name" value="<?php echo set_value('name'); ?>" />
    </p>
    <p>
        <label class="required" for="comment"><strong>Komentarz: </strong></label>
        <textarea name="comment" id="comment" class="input-xxlarge" rows="8"><?php echo set_value('comment'); ?></textarea>
    </p>
    <p>
        <input type="hidden" name="id" value="<?php echo $posts['post'][0]->id; ?>" />
        <button class="btn btn-large" type="submit">Zamieść komentarz</button>
    </p>
</form>
</div>
<?php
$this->load->view('blog/footer_view');

function dateV($format, $timestamp = null) {
    $to_convert = array(
        'l' => array('dat' => 'N', 'str' => array('Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela')),
        'F' => array('dat' => 'n', 'str' => array('styczeń', 'luty', 'marzec', 'kwiecień', 'maj', 'czerwiec', 'lipiec', 'sierpień', 'wrzesień', 'październik', 'listopad', 'grudzień')),
        'f' => array('dat' => 'n', 'str' => array('stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia'))
    );
    if ($pieces = preg_split('#[:/.\-, ]#', $format)) {
        if ($timestamp === null) {
            $timestamp = time();
        }
        foreach ($pieces as $datepart) {
            if (array_key_exists($datepart, $to_convert)) {
                $replace[] = $to_convert[$datepart]['str'][(date($to_convert[$datepart]['dat'], $timestamp) - 1)];
            } else {
                $replace[] = date($datepart, $timestamp);
            }
        }
        $result = strtr($format, array_combine($pieces, $replace));
        return $result;
    }
}
