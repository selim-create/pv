<?php
include 'lisans.php';
include '../../../wp-config.php';
$lisans = $_GET['lisans'];

if($lisans == $_GET['lisans'])
{
	update_option( 'birfinans_versiyon', $_GET['versiyon'] );
}