<?php 

	add_action( 'rest_api_init', 'EcomPress_Search_Route' );

	function EcomPress_Search_Route() {
		register_rest_route( 'ecompress/v1', 'search', array(
			'methods' => WP_REST_SERVER::READABLE,
			'callback' => 'ecompress_search_products',
		) );
	}

	function ecompress_search_products() {
		$only_cat_names = [];
		$cats = get_categories(array(
			'taxonomy' => 'product_cat',
			'orderby' => 'name',
		));

		foreach ($cats as $cat) {
			array_push( $only_cat_names, $cat->name );
		}


		$products = new WP_Query(array(
			'post_type' => ['product'],
			'orderby' => 'name'
		));

		foreach( $products->posts as $product ) {
			array_push( $only_cat_names, $product->post_title );
		}

		return $cats;
	}