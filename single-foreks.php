<?php
get_header();
$post_id = get_the_ID();
$thumbnail  = get_the_post_thumbnail_url($post_id);
$post_meta  = get_post_meta($post_id, "fs_options", true);

if($post_meta['turkceDestek'] == 1){
    $tr_status = '<svg class="np-items-check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.799 15.556"><path id="Check" d="M939.343,144.071h0l-4.243-4.242L937.929,137l4.243,4.243,9.9-9.9,2.828,2.828-9.9,9.9h0l-2.829,2.828Z" transform="translate(-935.1 -131.343)"></path></svg>';
}else{
    $tr_status = '<svg class="np-items-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.007 10.007"><path d="M966,279.437,962.434,283,961,281.566,964.563,278,961,274.433,962.434,273,966,276.562,969.566,273,971,274.433,967.437,278,971,281.566,969.566,283Z" transform="translate(-960.997 -272.996)"></path></svg>';
}

if($post_meta['bonus'] == 1){
    $bonus_status = '<svg class="np-items-check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.799 15.556"><path id="Check" d="M939.343,144.071h0l-4.243-4.242L937.929,137l4.243,4.243,9.9-9.9,2.828,2.828-9.9,9.9h0l-2.829,2.828Z" transform="translate(-935.1 -131.343)"></path></svg>';
}else{
    $bonus_status = '<svg class="np-items-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.007 10.007"><path d="M966,279.437,962.434,283,961,281.566,964.563,278,961,274.433,962.434,273,966,276.562,969.566,273,971,274.433,967.437,278,971,281.566,969.566,283Z" transform="translate(-960.997 -272.996)"></path></svg>';
}
$bif_data = get_option("bif_data");
?>

<!-- Site Wrapper -->
<div class="site-wrapper">

    <!-- Content -->
    <section class="content home">
        <div class="container-wrap">
            <div class="foreks-d-left">
                <div class="foreks-d-left-1">
                    <div class="foreks-d-left-1-logo">
                        <img src="<?=$thumbnail?>" alt="<?=get_the_title($post_id);?>">
                    </div>
                    <div class="foreks-left-hesap-ac">
                        <a href="<?=$post_meta['hesapAc']?>">HESAP AÇ</a>
                    </div>
                    <ul>
                        <?php foreach($post_meta['tablolar'][0]['tablo'] as $key=>$value): ?>
                            <li><i><?=$value['baslik']?> :</i> <b><?=$value['ozellik']?></b></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="foreks-left-1-actions">
                        <span>Türkçe Destek <?=$tr_status?></span>
                        <span>Bonus <?=$bonus_status?></span>
                    </div>
                </div>
                <?php unset($post_meta['tablolar'][0]); ?>
                <div class="foreks-d-left-2">

                    <div class="foreks-d-left-2-header">
                        <p><?=$post_meta['tablolar'][1]['genelBaslik']?></p>
                    </div>
                    <ul>
                        <?php foreach($post_meta['tablolar'][1]['tablo'] as $key=>$value): ?>
                            <li><i><?=$value['baslik']?> :</i> <b><?=$value['ozellik']?></b></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="foreks-d-left-2-bottom">
                        <span>Desteklenen İşletim Sistemleri <b><?=$post_meta['desteklenenIsletimSistemleri']?></b></span>
                    </div>


                </div>

                <?php unset($post_meta['tablolar'][1]); ?>

                <?php if(count($post_meta['tablolar']) > 0){
                    foreach($post_meta['tablolar'] as $key_main=>$value_main):
                    ?>

                <div class="foreks-d-left-2">

                    <div class="foreks-d-left-2-header">
                        <p><?=$post_meta['tablolar'][$key_main]['genelBaslik']?></p>
                    </div>
                    <ul>
                        <?php foreach($post_meta['tablolar'][$key_main]['tablo'] as $key=>$value): ?>
                            <li><i><?=$value['baslik']?> :</i> <b><?=$value['ozellik']?></b></li>
                        <?php endforeach; ?>
                    </ul>


                </div>

                <?php endforeach; } ?>
            </div>
            <div class="foreks-d-right">
                <div class="foreks-d-righ-top">
                    <h1><?=get_the_title($post_id);?></h1>
                    <div class="foreks-top-right">
                        <div class="np-items-stars">
                            <?php for($i = 0; $i < $post_meta['puan']; $i++): ?>
                                <img src="<?php bloginfo("template_directory")?>/img/np-star1.png" alt="">
                            <?php endfor; ?>

                            <?php for($i = $post_meta['puan']; $i < 5; $i++): ?>
                                <img src="<?php bloginfo("template_directory")?>/img/np-star2.png" alt="">
                            <?php endfor; ?>
                        </div>
                        <p>Puan Ortalaması: 5/<?=$post_meta['puan']?></p>

                    </div>
                </div>
                <div class="foreks-d-right-in">
                    <p>
                        <?php

                        $content = get_post($post_id)->post_content;

                        $content = explode("</p>", $content);

                        $contentCount = count($content);
                        echo $content[0] . '</p>';
                        echo str_replace("\\",null,$bif_data['reklam_icerik_1']);

                        unset($content[0]);

                        for ($i = 1; $i < $contentCount / 2; $i++):
                            echo $content[$i] . "</p>";
                            unset($content[$i]);
                        endfor;

                        echo str_replace("\\",null,$bif_data['reklam_icerik_2']);

                        echo implode("</p>", $content);


                        ?>
                    </p>
                </div>
            </div>

        </div>
    </section>
    <div class="clear"></div>

</div>
<!-- #Site Wrapper -->
<?php get_footer(); ?>
