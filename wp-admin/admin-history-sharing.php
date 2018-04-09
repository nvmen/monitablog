<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>


<style>
.modal-header .close {
    margin-top: -19px;
}
</style>
<?php
/**
 * About This Version administration panel.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );
function  get_text_pay($value)
{
	if($value==0) return 'Not Pay';
	if($value==1) return 'Paid';
}
function  get_text_verify($value)
{
	if($value==0) return 'None';
	if($value==1) return 'Verifying';
	if($value==2) return 'Verified';
}
if ( ! wp_is_mobile() ) {
	wp_enqueue_style( 'wp-mediaelement' );
	wp_enqueue_script( 'wp-mediaelement' );
	wp_localize_script( 'mediaelement', '_wpmejsSettings', array(
		'pluginPath'        => includes_url( 'js/mediaelement/', 'relative' ),
		'pauseOtherPlayers' => '',
	) );
}

$title = __( 'Sharing History' );

list( $display_version ) = explode( '-', get_bloginfo( 'version' ) );

include( ABSPATH . 'wp-admin/admin-header.php' );
  $current_user = wp_get_current_user();
  $token = $_COOKIE['token'];
  $response = wp_remote_post( GET_USER_PROFILE, array(
	'body'    => $current_user,
	'headers' => array(
		'Authorization' => 'Bearer ' . $token,
	),
) );

$body = wp_remote_retrieve_body( $response );
$user_info  = json_decode($body);
//var_dump($user_info->history);exit(0);

?>



	<div class="wrap about-wrap">
		<div class="container well">
			 <div class="row">
					<div class="row"> 
						<div class="col-sm-12 col-md-12">
							<h1> Sharing information </h1>
						</div>
					</div>								
						<div class="col-sm-12 col-md-12">
						<form class="well form-horizontal">
							  <fieldset>
								 <div class="form-group">
									<label class="col-md-4 control-label">Full Name</label>
									<div class="col-md-8 inputGroupContainer">
									   <div class="input-group">
									   <span class="input-group-addon">
											<i class="glyphicon glyphicon-user"></i>
									   </span>
										<input id="fullName" name="fullName" placeholder="Full Name" class="form-control" readonly value="<?php   echo ($current_user->user_firstname. " ". $current_user->user_lastname);?>" type="text">
										
									</div>
									</div>
								 </div>
								 <div class="form-group">
									<label class="col-md-4 control-label">Total money earn</label>
									<div class="col-md-8 inputGroupContainer">
									   <div class="input-group"><span class="input-group-addon"><i class="fa fa-money"></i></span>
									   <input id="addressLine1" name="addressLine1" readonly placeholder="Address Line 1" class="form-control" required="true" value="<?php echo (number_format($user_info->total_pay)) ?> VND" type="text"></div>
									</div>
								 </div>
								 <div class="form-group">
									<label class="col-md-4 control-label">Share Facebook</label>
									<div class="col-md-8 inputGroupContainer">
									   <div class="input-group"><span class="input-group-addon"><i class="fa fa-money"></i></span>
									   <input id="addressLine2" name="addressLine2" readonly placeholder="Address Line 2" class="form-control" required="true" value="<?php echo number_format($user_info->facebook_price,0)?> VND" type="text"></div>
									</div>
								 </div>
								  <div class="form-group">
									  <label class="col-md-4 control-label">Share Zalo</label>
									  <div class="col-md-8 inputGroupContainer">
										  <div class="input-group"><span class="input-group-addon"><i class="fa fa-money"></i></span>
											  <input id="addressLine2" name="addressLine2" readonly placeholder="Address Line 2" class="form-control" required="true" value="<?php echo number_format($user_info->zalo_price,0)?> VND" type="text"></div>
									  </div>
								  </div>
								  <div class="form-group">
									  <label class="col-md-4 control-label">Share Twitter </label>
									  <div class="col-md-8 inputGroupContainer">
										  <div class="input-group"><span class="input-group-addon"><i class="fa fa-money"></i></span>
											  <input id="addressLine2" name="addressLine2" readonly placeholder="Address Line 2" class="form-control" required="true" value="<?php echo number_format($user_info->twitter_price,0)?> VND" type="text"></div>
									  </div>
								  </div>
								  <div class="form-group">
									<label class="col-md-4 control-label">Total money spending</label>
									<div class="col-md-8 inputGroupContainer">
									   <div class="input-group"><span class="input-group-addon"><i class="fa fa-money"></i></span>
									   <input id="addressLine2" name="addressLine2" placeholder="Address Line 2" class="form-control"  readonly required="true" value="10,000 vnd" type="text"></div>
									</div>
								 </div>
								  <div class="form-group">
									<label class="col-md-4 control-label">Request payment</label>
									<div class="col-md-4 inputGroupContainer">
									   <div class="input-group"><span class="input-group-addon"><i class="fa fa-money"></i></span>
									   <input id="addressLine2" name="addressLine2" placeholder="Address Line 2" class="form-control"  readonly required="true" value="10,000 vnd" type="text"></div>
									</div>
									 <div class ='col-md-4'>
										<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#exampleModal">Request Payment</button>
								 </div>
								 </div>
								 
								
							  </fieldset>
						</form>							
							
						</div>
			
				
			
			 </div>
	
			<div class ="row">
			 <div class="table-responsive">

    <table class="table table-striped custab">
    <thead>    
        <tr>
            <th>ID</th>
            <th>Link</th>
            <th>Type</th>
			<th>Money</th>
			<th>Date</th>
			<th>Status</th>
			<th>Paid</th>
			<th>Note</th>
            
        </tr>
    </thead>
		<?php
		$index = 1;
			foreach ($user_info->history as $post){

		?>
            <tr>
                <td><?php echo $index ?></td>
                <td><?php echo( $post->post_link) ?></td>
                <td><?php echo($post->platform) ?></td>
				<td><?php echo (number_format($post->price)) ?> VND</td>
				<td><?php echo $post->created_at ?></td>
				<td><?php echo get_text_verify($post->verify) ?></td>
				<td><?php echo get_text_pay($post->paid) ?></td>
				<td>--</td>				
            </tr>

		<?php
				$index = $index + 1;
		}
		?>

            
    </table>
   
   </div>

			</div>	
   
   </div>
	</div>
<?php

include( ABSPATH . 'wp-admin/admin-footer.php' );

// These are strings we may use to describe maintenance/security releases, where we aim for no new strings.
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
