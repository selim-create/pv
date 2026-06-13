<?php
$prefix = 'bf_';
$meta_box1 = array(
    'id' => 'slider-meta-box',
    'title' => 'Yazı Ayarları',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(

	 array(
            'name' => __("4'lü kayan sliderda görünsün mü?", 'TemaPanel'),
            'id' => $prefix . 'anasayfa_kayan',
            'type' => 'checkbox',
            'std' => ''
       ),

	 array(
            'name' => __("Manşete Eklensin Mi", 'TemaPanel'),
            'id' => $prefix . 'anasayfa_slider',
            'type' => 'checkbox',
            'std' => ''
       ),

        array(
            'name' => __("Benzer İçerikler Gizlensin Mi ?", 'TemaPanel'),
            'id' => $prefix . 'benzer_icerikler',
            'type' => 'checkbox',
            'std' => ''
        ),



    )
);
add_action('admin_menu', 'slider_add_box');
// Add meta box
function slider_add_box() {
    global $meta_box1;
    foreach (array('post') as $type)
    add_meta_box($meta_box1['id'], $meta_box1['title'], 'slider_show_box', $type, $meta_box1['context'], $meta_box1['priority']);
}
// Callback function to show fields in meta box
function slider_show_box() {
    global $meta_box1, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="slider_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table">';
    foreach ($meta_box1['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        echo '<tr>',
                '<th style="width:50%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td style="width:50%">';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
                    '<br />', $field['desc'];
                break;

            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
                    '<br />', $field['desc'];
                break;

                case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;


                    // checkbox
case 'checkbox_group':
    foreach ($field['options'] as $option) {
        echo '<input type="checkbox" value="'.$option['value'].'" name="'.$field['id'].'[]" id="'.$option['value'].'"',$meta && in_array($option['value'], $meta) ? ' checked="checked"' : '',' />
                <label for="'.$option['value'].'">'.$option['label'].'</label><br />';
    }
    echo '<span class="description">'.$field['desc'].'</span>';
break;



            case 'checkbox':
                echo '<p class="field switch"><label class="cb-enable"><span>Evet</span></label><label class="cb-disable selected"><span>Hayır</span></label><input type="checkbox" class="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' /></p>';
                break;

				case 'checkbox2':
                echo '<p class="field switch"><label class="cb-enable1 selected"><span>Evet</span></label><label class="cb-disable1"><span>Hayır</span></label><input type="checkbox" class="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' /></p>';
                break;
        }
        echo     '<td>',
            '</tr>';
    }

    echo '</table>';
}
add_action('save_post', 'slider_save_data');
// Save data from meta box
function slider_save_data($post_id) {
    global $meta_box1;

    // verify nonce
    if (!wp_verify_nonce($_POST['slider_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($meta_box1['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
	}}

add_action('admin_footer', 'ac_kapa');
function ac_kapa() {
wp_enqueue_style('istyle', get_template_directory_uri().'/framework/metabox/css/admin-style.css');
?>
<style>
.switch input {display:none;}
</style>
<script type="text/javascript" charset="utf-8">
    jQuery(document).ready( function(){ 
    jQuery(".cb-enable").click(function(){
        var parent = jQuery(this).parents('.switch');
        jQuery('.cb-disable',parent).removeClass('selected');
        jQuery(this).addClass('selected');
        jQuery('.checkbox',parent).attr('checked', true);
    });
    jQuery(".cb-disable").click(function(){
        var parent = jQuery(this).parents('.switch');
        jQuery('.cb-enable',parent).removeClass('selected');
        jQuery(this).addClass('selected');
        jQuery('.checkbox',parent).attr('checked', false);
    });
    jQuery("input[type=checkbox][class=checkbox][checked]").each( function() { var parent = jQuery(this).parents(".switch");	 
    jQuery(".cb-enable",parent).addClass("selected");	 
    jQuery(".cb-disable",parent).removeClass("selected");	    
    });
jQuery(".cb-disable1").click(function(){
        var parent = jQuery(this).parents('.switch');
        jQuery('.cb-enable1',parent).removeClass('selected');
        jQuery(this).addClass('selected');
        jQuery('.checkbox',parent).attr('checked', true);
    });
    jQuery(".cb-enable1").click(function(){
        var parent = jQuery(this).parents('.switch');
        jQuery('.cb-disable1',parent).removeClass('selected');
        jQuery(this).addClass('selected');
        jQuery('.checkbox',parent).attr('checked', false);
    });
    jQuery("input[type=checkbox][class=checkbox][checked]").each( function() { var parent = jQuery(this).parents(".switch");	 
    jQuery(".cb-enable1",parent).removeClass("selected");	 
    jQuery(".cb-disable1",parent).addClass("selected");	    
    });
});
  </script>
<?php
}
?>
