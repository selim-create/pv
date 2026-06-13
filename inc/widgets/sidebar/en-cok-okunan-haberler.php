<?php

CSF::createWidget('sidebar_en_cok_okunanlar', array(
    'title'       => 'Sidebar Haberler',
    'classname'   => 'sidebar-en-cok-okunanlar',
    'description' => 'Sidebar Haberler',
    'fields'      => array(
        array(
            'type' => 'select',
            'title' => 'Listeleme Tipi',
            'id' => 'list',
            'options' => [
                'popular' => 'Popüler',
                'recent' => 'Son Haberler'
            ],
            'default' => 'popular'
        ),
        array(
            'id'      => 'baslik',
            'type'    => 'text',
            'title'   => 'Başlık',
            'default' => 'EN ÇOK OKUNAN HABERLER',
        ),
        array(
            'id'      => 'miktar',
            'type'    => 'text',
            'title'   => 'İçerik Miktarı',
            'default' => '3',
        ),
    ),
));

if (!function_exists('sidebar_en_cok_okunanlar')) {
    function sidebar_en_cok_okunanlar($args, $instance)
    {
        ?>
        <!-- Widget -->
        <div class="widget">
            <div class="sidebarHead popularNewsHead"><?= $instance['baslik'] ?></div>
            <div class="popularNews">
                <?php
                if ($instance['list'] == 'recent') {
                    $post_by_views = new WP_Query(array(
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => $instance['miktar'],
                    ));
                } else {
                    $post_by_views = new WP_Query(array(
                        'meta_key' => 'post_views_count',
                        'orderby' => 'meta_value_num',
                        'posts_per_page' => (int) $instance['miktar']
                    ));
                }

        foreach ($post_by_views->posts as $key => $value) :
                    $post_id = $value->ID; ?>
                    <div class="item">
                        <div class="thumb"><a href="<?= get_permalink($post_id); ?>"><?= get_the_post_thumbnail($post_id, 'en_cok_okunan_image', array('alt' => get_the_title())); ?></a></div>
                        <div class="title"><a href="<?= get_permalink($post_id); ?>"><?= get_the_title($post_id); ?></a>
                            <div class="info">
                                <div class="cat"><a href="<?= get_category_link(get_the_category($post_id)[0]); ?>" style="display: inline-block;"><?= get_the_category($post_id)[0]->cat_name ?></a></div>
                                <div class="date"> - <?= date_i18n("d F Y", strtotime($value->post_date)) ?></div>
                                <div class="comment-number"><?= get_comments_number($post_id) ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- #Widget -->

<?php
    }
}

?>
