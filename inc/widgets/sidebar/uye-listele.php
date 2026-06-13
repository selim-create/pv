<?php

CSF::createWidget('uye_listele', array(
    'title'       => 'Sidebar Üye Listeleme',
    'classname'   => 'sidebar-altin-tablosu',
    'description' => 'Üye Listeleme',
    'fields'      => array(

        array(
            'id' => 'title',
            'type' => 'text',
            'title' => 'Başlık',
            'default' => 'Üyeler'
        ),

        array(
            'id' => 'miktar',
            'type' => 'text',
            'title' => 'Gösterilecek Adet',
            'default' => 5
        ),
    ),
));

if (!function_exists('uye_listele')) {
    function uye_listele($args, $instance)
    {
        global $bp_options; ?>
        <!-- Widget -->
        <div class="widget">
            <div class="sidebarHead sidebarArtan"><?= $instance['title'] ?></div>
            <?php
            $query_args = array(
                'posts_per_page' => $instance['miktar'],
                'orderby' => 'author',
                "ignore_sticky_posts" => 1,
            );
        $query = new WP_Query($query_args);
        if (have_posts($query)) {
            while ($query->have_posts()) :
                    $query->the_post();

            $author_ids[] = get_the_author_meta('ID');
            endwhile;
            wp_reset_query();
        }
        $author_ids = array_unique($author_ids); ?>
        <style>
            #header-shape-gradient{
            --color-stop: #FAB917;
            --color-bot: #FAB915;
            }
            
             #owl-avatars figure{
                 position:relative;
                  width:42px;
                 height:42px;
             }
                #owl-avatars{
                    padding-top:20px;
                }
            #owl-avatars .sefklavyein{
                 display:flex;
                 align-items:center;
                
                 gap:10px;
                padding: 0 20px 14px 20px;
             }
                 #owl-avatars .sefklavyein:last-child{
                
                 padding-bottom:0px;
             }
            
            #owl-avatars  figure > img{
                position:absolute;
                left:0;
                right:0;
                top:0;
                bottom:0;
                 border-radius:50%;
                 padding:3px;
                  width:42px;
                 height:42px;
                 
            }
              #owl-avatars h3{
                  font-size:15px;
                color:#242424;
                text-transform: uppercase;
                text-align:center;
            }
          @media only screen and (max-width: 480px) {
              #owl-avatars .sefklavyein{
                  padding-left:0;
                  padding-right:0;
              }
          }
        </style>
            <div class="widget sefklavye sff3 wireframe-3">
                <div id="owl-avatars">
                    <?php foreach ($author_ids as $key => $author_id) : ?>
                        <div class="sefklavyein">
                            <a href="<?= get_author_posts_url($author_id); ?>">
                                <figure>
                                    <svg class="full-c" viewBox="0 0 100 100">
                                        <defs>
                                            <linearGradient id="header-shape-gradient" x2="0.35" y2="1">
                                                <stop offset="0%" stop-color="var(--color-stop)"></stop>
                                                <stop offset="30%" stop-color="var(--color-stop)"></stop>
                                                <stop offset="100%" stop-color="var(--color-bot)"></stop>
                                            </linearGradient>
                                        </defs>
                                        <circle cx="50" cy="50" r="49" fill="url(#header-shape-gradient)" ></circle>
                                    </svg>

                                    <?php if (!empty(get_user_meta(get_the_author_meta('ID'), "profil_pic", true))) {
            ?><img src="<?php bloginfo("template_directory") ?>/profile/<?= get_user_meta(get_the_author_meta('ID'), "profil_pic", true) ?>"><?php
        } else {
            ?><img src="<?php bloginfo("template_directory") ?>/img/icons/user.png"><?php
        } ?>
                                </figure>
                            </a>
                            <a href="<?= get_author_posts_url($author_id); ?>">
                                <h3><?= get_the_author_meta('display_name', $author_id) ?></h3>
                            </a>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        <!-- #Widget -->

<?php
    }
}

?>
