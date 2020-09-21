<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tino
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (get_the_ID() !== 553 and get_the_ID() !== 741 and get_the_ID() !== 743){ ?>
    <div class="products-single">
        <div class="products-single-image">
            <?php echo get_the_post_thumbnail(get_the_ID());?>
        </div>
        <div class="product-single-desc">
            <?php
            if(get_field('descr')) {
                while (the_repeater_field('descr')) { ?>
                    <h3><?php the_sub_field('title');?></h3>
                    <?php the_sub_field('text');?>
                <?php }
            }
            ?>
        </div>
    </div>
    <?php
    $rows = get_field('tabs');
    $i = 1;
    if($rows) { ?>
    <ul class="tabs">
        <?php
        foreach($rows as $row) {
            if($i === 1){ ?>
                <li class="tab-link current" data-tab="tabs-<?php echo $i;?>"><?php echo $row['name'];?></li>
            <?php } else{ ?>
                <li class="tab-link" data-tab="tabs-<?php echo $i;?>"><?php echo $row['name'];?></li>
            <?php } $i++;
        } ?>
    </ul>
    <?php
        $j = 1;
        foreach($rows as $row) {
            if($j === 1){ ?>
                <div id="tabs-<?php echo $j;?>" class="tab-content current">
                    <?php echo $row['text'];?>
                </div>
            <?php }
            else { ?>
                <div id="tabs-<?php echo $j;?>" class="tab-content">
                    <?php echo $row['text'];?>
                </div>
            <?php } $j++;
        }
    } }

    else { ?>

    <div class="production-film">
        <?php if(get_field('plenka', 82)) {
            $i = 1;
            while (the_repeater_field('plenka', 82)) { ?>
                <a href="#film-tabs" class="film__item hvr-fade" data-id="<?php echo $i;?>">
                    <?php the_sub_field('nazvanie', 82);?>
                </a>
                <?php $i++;} ?>
        <?php } ?>
    </div>
    <div class="film-tabs" id="film-tabs">
        <?php if(get_field('plenka', 82)) {
            $k = 1;
            while (the_repeater_field('plenka', 82)) {
                $rows = get_sub_field('czvet', 82);
                $i = 1;
                if($rows) { ?>
                    <ul class="tabs" data-id="<?php echo $k;?>">
                        <?php
                        foreach($rows as $row) {
                            if($i === 1){ ?>
                                <li class="tab-link current" data-tab="tabs-<?php echo $k.$i;?>"><?php echo $row['nazvanie'];?></li>
                            <?php } else{ ?>
                                <li class="tab-link" data-tab="tabs-<?php echo $k.$i;?>"><?php echo $row['nazvanie'];?></li>
                            <?php } $i++;
                        } ?>
                    </ul>
                    <?php
                    $j = 1;
                    foreach($rows as $row) {
                        ?>
                        <div id="tabs-<?php echo $k.$j;?>" class="tab-content">
                            <?php foreach ($row['tekst'] as $text){ ?>
                                <h4><?php echo $text['zagolovok'];?></h4>
                                <?php echo $text['tekst'];?>
                            <?php } ?>
                        </div>
                        <?php $j++;
                    }
                }  $k++;}  } ?>
    </div>
    <?php } ?>
</article>
