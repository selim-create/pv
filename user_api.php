<?php
error_reporting(1);
include '../../../wp-config.php';
switch ($_GET['type']) {
  case 'edit_profile':
  $current_user = get_current_user_id();
  $user_data = get_userdata($current_user)->data;

    $args = array(
      'ID'         => $user_data->ID,
      'user_email' => esc_attr( $_POST['user_email'] )
    );
    wp_update_user( $args );

    update_user_meta($user_data->ID, "first_name", $_POST['user_firstname']);
    update_user_meta($user_data->ID, "last_name", $_POST['user_lastname']);

    if(empty(get_user_meta($user_data->ID, "biyografi", true))){
        add_user_meta($user_data->ID, "biyografi", $_POST['user_biyografi']);
    }else{
        update_user_meta($user_data->ID, "biyografi", $_POST['user_biyografi']);
    }

    echo 'Ok';
    break;

  case 'update_password':
    $current_user = get_current_user_id();
    $user_data = get_userdata($current_user)->data;


    $user = get_user_by( 'login', $user_data->user_login );

    if ( $user && wp_check_password( $_POST['last_password'], $user->data->user_pass, $user->ID) ){
      if($_POST['new_password'] === $_POST['new_password_retry']){
          wp_set_password( $_POST['new_password'], $user_data->ID );
          echo 'Ok';
      }else{
        echo 'uyumsuz';
      }

    }else{
      echo 'hatali';
    }

  break;

  case 'update_social':
    $current_user = get_current_user_id();
    $user_data = get_userdata($current_user)->data;

    if(empty(get_user_meta($user_data->ID, "twitter", true))){
      add_user_meta($user_data->ID, "twitter", $_POST['twitter']);
    }else{
      update_user_meta($user_data->ID, "twitter", $_POST['twitter']);
    }

    if(empty(get_user_meta($user_data->ID, "instagram", true))){
      add_user_meta($user_data->ID, "instagram", $_POST['instagram']);
    }else{
      update_user_meta($user_data->ID, "instagram", $_POST['instagram']);
    }

    if(empty(get_user_meta($user_data->ID, "facebook", true))){
      add_user_meta($user_data->ID, "facebook", $_POST['facebook']);
    }else{
      update_user_meta($user_data->ID, "facebook", $_POST['facebook']);
    }
    echo 'Ok';
  break;

  case 'upload_profile':
    $current_user = get_current_user_id();
    $user_data = get_userdata($current_user)->data;


    $dizin = 'profile/';
    $yuklenecek_dosya = $dizin . basename($user_data->user_login.".jpg");

    if($_FILES['userfile']['type'] == "image/jpeg" && $_FILES['userfile']['size'] < 6000000){
      $filetmp = $_FILES['userfile']['tmp_name'];
      jpegImgCrop($filetmp);
      if (move_uploaded_file($_FILES['userfile']['tmp_name'], $yuklenecek_dosya))
      {
        if(empty(get_user_meta($user_data->ID, "profil_pic", true))){
          add_user_meta($user_data->ID, "profil_pic", $user_data->user_login.".jpg");
        }else{
          update_user_meta($user_data->ID, "profil_pic", $user_data->user_login.".jpg");
        }
          wp_redirect(get_bloginfo("home")."/uye-profili");
      } else {
          wp_redirect(get_bloginfo("home")."/uye-profil-fotografi?error=true");
      }
    }else{
          wp_redirect(get_bloginfo("home")."/uye-profil-fotografi");
    }



  break;

  case 'insert_liste':
  $current_user = get_current_user_id();

  $user_data = get_userdata($current_user)->data;
  $last_doviz = get_user_meta($user_data->ID, "uye_liste", true);

  $doviz = array($_POST['doviz']);

  if(empty($last_doviz)){
    $last_doviz = ($doviz);
  }else{
    $last_doviz = array_merge($last_doviz,$doviz);
  }

  if(get_user_meta($user_data->ID, "uye_liste", true) === null){
    add_user_meta($user_data->ID, "uye_liste", $last_doviz);
  }else{
    update_user_meta($user_data->ID, "uye_liste", $last_doviz);
  }
  echo 'Ok';
  break;

  case 'delete_liste':
  $current_user = get_current_user_id();
  $user_data = get_userdata($current_user)->data;
  $last_doviz = get_user_meta($user_data->ID, "uye_liste", true);
  if (($key = array_search($_POST['doviz'], $last_doviz)) !== false) {
    unset($last_doviz[$key]);
  }


  if(empty(get_user_meta($user_data->ID, "uye_liste", true))){
    add_user_meta($user_data->ID, "uye_liste", $last_doviz);
  }else{
    update_user_meta($user_data->ID, "uye_liste", $last_doviz);
  }
  echo 'Ok';
  break;

  case 'insert_alarm':
  $current_user = get_current_user_id();

  $user_data = get_userdata($current_user)->data;
  $last_doviz = get_user_meta($user_data->ID, "uye_alarm", true);

  $doviz = array($_POST['doviz']);
  $miktar = array($_POST['miktar']);

  $encoded = array(
    'doviz' => $doviz,
    'miktar'  => $miktar
  );

  if(empty($last_doviz)){
    $last_doviz = ($encoded);
  }else{
    $last_doviz = array_merge($last_doviz,$encoded);
  }
  update_user_meta($user_data->ID, "uye_alarm", $last_doviz);
  echo 'Ok';
  break;

  case 'delete_alarm':
  $current_user = get_current_user_id();
  $user_data = get_userdata($current_user)->data;
  $last_doviz = get_user_meta($user_data->ID, "uye_alarm", true);
  if (($key = array_search($_POST['doviz'], $last_doviz['doviz'])) !== false) {
    unset($last_doviz['miktar'][$key]);
    unset($last_doviz['doviz'][$key]);
  }


  if(empty(get_user_meta($user_data->ID, "uye_alarm", true))){
    add_user_meta($user_data->ID, "uye_alarm", $last_doviz);
  }else{
    update_user_meta($user_data->ID, "uye_alarm", $last_doviz);
  }
  echo 'Ok';
  break;

  default:
    exit();
    break;
}
