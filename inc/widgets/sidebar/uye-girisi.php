<?php

CSF::createWidget('uye_girisi', array(
    'title'       => 'Sidebar Üye Girişi',
    'classname'   => 'sidebar-altin-tablosu',
    'description' => 'Üye Girişi',
    'fields'      => array(
        array(
            'id'      => 'baslik',
            'type'    => 'text',
            'title'   => 'Başlık',
            'default' => 'Üye Girişi',
        ),
    ),
));

if (!function_exists('uye_girisi')) {
    function uye_girisi($args, $instance)
    {
        global $bp_options;
        if (!is_user_logged_in()) {
            ?>
            <!-- Widget -->
            <style>
                

.widget form#login {float: left;display: block;width: 100%;height: auto;padding: 19px 20px 0 20px;float: none;display: inline-block;}
.widget form#login input { float: left; width: 100%; display: block; border-radius: 3.5px; }
.widget form#login input.textInput { transition: 300ms;  font-weight: 600; color: #9b99af; font-size: 15px; float: left; width: 100%; display: block; border: 1px solid #e6ecf6; height: 50px; margin-bottom: 19px; padding: 0 19px; }
 .widget form#login input.textInput::placeholder {
 
 font-weight: 400;
 color: #545454;
}
.widget form#login input.textInput:focus { border: 1px solid #b88bff; transition: 300ms; }
 .widget form#login input.textInput:focus::placeholder {
 color: #545454;
 transition: 300ms;
 
}

.widget form#login p.check { display: block; font-size: 14px; font-weight: 400; margin-top: 10px; width: 100%; padding: 0 20px; height: 38px; line-height: 38px; float: left; border-radius: 3.5px; text-align: left; }
.widget form#login p.check.yellow { background: #fef6dd; color: #a48f4b; }
.widget form#login p.check.green { background: #eef8e6; color: #8abc52; }
.widget form#login p.check i.close { cursor: pointer; float: right; margin-top: 15px; width: 9px; height: 9px; background: url("../img/loginPage/close.png")no-repeat; }
.widget form#login label.error { display: block; float: left; padding-bottom: 18px; font-size: 14px; width: 100%; font-family: Roboto; font-weight: 400; color: #fb886f; }


.widget form#login input.submitDefault { height: 50px; color: #FFFFFF; cursor: pointer; font-size: 16px; font-weight: 600;  margin-top: 11px; background-image: linear-gradient(to right, rgb(251, 136, 111) 0%, rgb(251, 136, 111) 100%);}
.widget form#login span.divider { margin:15px 0; float: left; padding: 0 23px; background: #FFFFFF; width: 100%; position: relative; display: block; text-align: center; font-size: 11px; font-weight: 600; color: #9399bb; }
.widget form#login span.divider:before { position: absolute; content: ""; left: 0; top: 5px; width: calc(50% - 30px); height: 1px; background: #9399bb; }
.widget form#login span.divider:after { position: absolute; content: ""; right: 0; top: 5px; width: calc(50% - 30px); height: 1px; background: #9399bb; }
.widget form#login .unuttum a {  color: #333333; cursor: pointer; font-size: 15px; font-weight: 600; font-family: 'Roboto', sans-serif; display: block; border-radius: 5px; text-align: center;  }

@media only screen and (max-width: 480px) {
    .widget form#login {padding-left:0px;padding-right:0px;}
}
            </style>
            <div class="widget">
                <div class="sidebarHead sidebarArtan"><?= $instance['baslik'] ?></div>
                <form id="login" class="ajax-auth" action="login" method="post">
                    <input type="text" class="textInput required" placeholder="Kullanıcı Adınız" name="username" id="username">
                    <input type="password" class="textInput required" placeholder="Şifreniz" name="password" id="password">
                    <input type="submit" class="submitDefault submit_button" value="Giriş Yap">
                    <span class="divider">VEYA</span>
                    <div class="clear"></div>
                    <div class="unuttum"><a href="<?php bloginfo("home") ?>/<?= $bp_options['page_giriskayit'] ?>"><i></i>Kayıt Ol</a></div>

                    <p class="check yellow" id="check" style="display: none;"></p>
                    <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
                </form>
            </div>
        <?php
        } ?>
        <!-- #Widget -->

<?php
    }
}

?>
