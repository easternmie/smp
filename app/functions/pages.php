<?php

/**
 *	Theme functions for pages
 */
function page_id() {
	return Registry::prop('page', 'id');
}

function page_url() {
	if($page = Registry::get('page')) {
		return $page->uri();
	}
}

function page_slug() {
	return Registry::prop('page', 'slug');
}

function page_name() {
	return Registry::prop('page', 'name');
}

function page_title($default = '') {
	if($title = Registry::prop('staff', 'display_name')) {
		return trim($title);
	}

	if($title = Registry::prop('staff_division', 'title')) {
		return $title;
	}

	if($title = Registry::prop('page', 'title')) {
		return _e($title);
	}

	return $default;
}

function page_content() {
	return parse(Registry::prop('page', 'content'));
}

function page_status() {
	return Registry::prop('page', 'status');
}

function page_custom_field($key, $default = '') {
	$id = Registry::prop('page', 'id');

	if($extend = Extend::field('page', $key, $id)) {
		return Extend::value($extend, $default);
	}

	return $default;
}

function page_rating() {

	if(!$average = rating_average()) {
		return;
	}

	$num = round($average);
	$star = '';

	for ( $star_counter = 1; $star_counter <= 5; $star_counter++ ) {
		if ( $star_counter <= $num ) {
			$star .= '★';
		} else {
			$star .= '☆';
		}
	}
	return $star;
	return $star . ' (' . $average . ')';
}
