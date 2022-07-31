<?php 
	get_header();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		global $user_ID;
		$postTitle = $_POST['title'];
		$post = $_POST['content'];
		$company = $_POST['company'];
		  $new_post = array(
	        'post_title' => $postTitle,
	        'post_content' => $post,
	        'post_excerpt' => $company,
	        // 'meta_input' => array(
	        // 	'company' => $company,
	        // ),
	        'post_status' => 'publish',
	        'post_date' => date('Y-m-d H:i:s'),
	        'post_author' => $user_ID,
	        'post_type' => 'opinion',
	        'post_category' => array(0)
	    );

    	wp_insert_post($new_post);
	}
?>
	<div class="container">
		<div class="inner">
			<form method="post" action="" enctype="multipart/form-data">
			<div class="item">
				<label>Designation:</label><br>
				<input type="text" name="title" placeholder="">
			</div>
			<div class="item">
				<label>Comments:</label><br>
				<textarea name="content"></textarea>
			</div>
			<div class="item">
				<label>Company</label><br>
				<input type="text" name="company">
			</div>
			<?php 
			 wp_nonce_field(); 
			?>
			<div class="item">
				<input type="submit" name="submit">
			</div>
		</form>
		</div>
	</div>
<?php 
	get_footer();
?>



