<?php
global $wpdb;
$live_chat = $wpdb->get_results("SELECT * FROM bt_live_chat WHERE page_id = " . get_the_ID() . " ORDER BY id DESC"); ?>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<div class="widget">
    <div class="commentWhite">
        <!-- Form -->
        <style>
            .ql-toolbar {
                border: 0 !important;
            }

            .ql-link {
                display: none !important;
            }

            .ql-list {
                display: none !important;
            }
        </style>
        <style>
            <?php if (wp_is_mobile()) {
    echo 'ql-editor {max-width: 280px;}';
} ?>
        </style>
        <div class="commentForm">
            <div class="singleHead v2" style="margin-bottom: 19px;"><span>CANLI SOHBET</span></div>
            <ul>
                <li class="half floatLeft" style="width: 100%;"><input type="text" class="defaultInput nameText" placeholder="Adınız" value="<?= @wp_get_current_user()->user_login ?>" name="author"></li>
                <li class="one" style="border-radius: 0;">
                    <form id="socket_form" action="javascript:;">
                        <div id="editorArea" style="height: 100px;display: inline-block;width: 555px;border: 0;"></div>
                        <input type="submit" class="submit" onclick="live_chat()" value="Yorumu Gönder" style="background-color: #30a64a;<?php if (wp_is_mobile()) : echo 'position: relative;float: left;';
                                                                                                                                            endif; ?>">
                    </form>

                </li>
            </ul>

        </div>

        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <!-- Initialize Quill editor -->
        <script>
            var quill = new Quill('#editorArea', {
                theme: 'snow'
            });
        </script>
        <!-- Comment Listing -->

        <div class="commentListing">
            <p class="loading">Yükleniyor...</p>
        </div>
    </div>
</div>
