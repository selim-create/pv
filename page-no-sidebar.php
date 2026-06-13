<?php
/*
Template Name: Sidebar Pasif Sayfa
*/

get_header(); ?>
<!-- Site Wrapper -->
<div class="site-wrapper">

    <!-- Content -->
    <section class="content home" style="margin-top: 0;">
        <div class="container-wrap">

            <!-- WideBar -->
            <div class="widebar floatLeft">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="singleWrapper">
                            <h1 class="postTitle"><?= the_title(); ?></h1>
                            <div class="thumbnail">
                                <?php the_post_thumbnail('icerik_detay_image', array("alt" => get_the_title())); ?>
                            </div>
                            <div class="singleContent block hasImage">
                                <!-- Main Content -->
                                <div class="mainContent">
                                    <!-- Main -->
                                    <div class="main">

                                        <div class="postInner">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- #MainBar -->
                            </div>
                        </div>
            </div>
    <?php endwhile;
                endif; ?>

        </div>
    </section>
    <!-- Content -->
    <div class="clear"></div>

</div>
<!-- #Site Wrapper -->
<?php get_footer(); ?>
