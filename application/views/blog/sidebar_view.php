<div class="span3 pull-right" id="sidebar">
    
    <div id="widget">
        <h3>Follow Me</h3>
        <a href="<?php echo base_url();?>rss"><i class="icon-rss icon-3x"></i></a>
    </div>
    
    <div id="widget">
        <h3>Szukaj</h3>
        <form method="post" action="<?php echo base_url();?>search">
            <div class="input-append">
                <input class="span2" id="appendedInputButtons" name="keyword" type="text" placeholder="szukane słowo..."/>
                <button class="btn" type="submit">Szukaj</button>
            </div>
        </form>
    </div>
    
    <div id="widget">
        <h3>Skróty</h3>
        <ul>
            <li><a href="admin">Panel administratora</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
            <li><a href="#">Link 4</a></li>
        </ul>
    </div>
</div>