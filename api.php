<?php
error_reporting(1);
include '../../../wp-config.php';


global $wpdb;
switch ($_GET['type']) {
	case 'follow':
		$subscribe_id = $_GET['id'];
		$current_id = get_current_user_id();
		$check = $wpdb->get_row( "SELECT * FROM bt_follower WHERE user_id = '$current_id' AND follow_id = '$subscribe_id'" );

 		if(!isset($check)){

			$wpdb->insert(
				'bt_follower',
				array(
					'user_id' => $current_id,
					'follow_id' => $subscribe_id
				),
				array(
					'%d',
					'%d'
				)
			);
			echo 'Ok';
		}else{
			echo 'Error';
		}
		break;

	case 'unfollow':
		$subscribe_id = $_GET['id'];
		$current_id = get_current_user_id();
		$wpdb->delete( 'bt_follower', array( 'user_id' => $current_id, 'follow_id' => $subscribe_id ) );
		echo 'Ok';
	break;

	case 'get_follower':
		$passthis_id		= $_GET['user'];
		$count				= $_GET['count']+1;
		$follower 			= $wpdb->get_results( "SELECT * FROM bt_follower WHERE follow_id = '$passthis_id' LIMIT $count, 12");

		foreach($follower as $key=>$data):
			$user = get_userdata($data->user_id);
		?>
		<li><a href="<?php echo get_author_posts_url( $user->ID); ?>"><i class="avatar"><?php echo get_avatar( $user->user_email, '116' ); ?></i><span><?php echo the_author_meta( 'display_name', $user->ID ); ?></span></a></li>
								<?php
		endforeach;
	break;

	case 'get_following':
		$passthis_id		= $_GET['user'];
		$count				= $_GET['count']+1;
		$follower 			= $wpdb->get_results( "SELECT * FROM bt_follower WHERE user_id = '$passthis_id' LIMIT $count, 12");

		foreach($follower as $key=>$data):
			$user = get_userdata($data->user_id);
		?>
		<li><a href="<?php echo get_author_posts_url( $user->ID); ?>"><i class="avatar"><?php echo get_avatar( $user->user_email, '116' ); ?></i><span><?php echo the_author_meta( 'display_name', $user->ID ); ?></span></a></li>
								<?php
		endforeach;
	break;

	default:
		# code...
		break;
}
