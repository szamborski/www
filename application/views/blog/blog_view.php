
<?php
    $this->load->view('blog/header_view');
    $total = count($posts); 
    
    $this->load->view("blog/sidebar_view");
    if($total > 0){
        for($x=0; $x<$total; $x++):
    ?>
            <div class="span8 pull-left">
                <div class="posts">
                    <div class="page-header">
                        <h2><a href="<?php echo base_url().$posts[$x]->url;?>"><?php echo ucwords($posts[$x]->title);?></a></h2>
                    </div>
                    <p align="justify">
                        <?php echo word_limiter(strip_tags(html_entity_decode($posts[$x]->post)), 150);?>
                    </p>
                </div>
                <div id="post-info" class="row-fluid">
                    <ul>
                        <li><strong>Autor:</strong> <?php echo $posts[$x]->username;?></li>
                        <li><strong>Data opublikowania:</strong> 
                        <?php //echo date('F d, Y', strtotime($posts[$x]->entry_date));
                        ?>
                        <?php echo dateV('j f Y', strtotime($posts[$x]->entry_date)); 
                        ?></li>
                        
                        <li><strong>Komentarze:</strong> <?php echo $posts[$x]->comment_sum;?></li>
                        <li><strong><a href="<?php echo base_url().$posts[$x]->url;?>">CZYTAJ</a></strong></li>
                    </ul>
                </div>
            </div>
    <?php endfor;
    } else {
    ?>
    <h2>No blog post found</h2>
    <?php } ?>
<div class="span8">
<?php echo $this->pagination->create_links();?>
</div>        
<?php $this->load->view('blog/footer_view');


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