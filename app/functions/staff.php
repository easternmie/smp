<?php

/*
	Theme functions for staffs
*/
function staff_id() {
	return Registry::prop('staff', 'id');
}

function staff_salutation() {
  return Registry::prop('staff', 'salutation');
}

function staff_name() {
	return Registry::prop('staff', 'display_name');
}

function staff_gender() {
  return Registry::prop('staff', 'gender');
}

function staff_email() {
  return Registry::prop('staff', 'email');
}

function staff_telephone() {
  return Registry::prop('staff', 'telephone');
}

function staff_slug() {
	return Registry::prop('staff', 'slug');
}

function staff_previous_url() {
	$page = Registry::get('staffs_page');
	$query = Staff::where('created', '<', Registry::prop('staff', 'created'))
				->where('status', '!=', 'inactive');

	if($query->count()) {
		$staff = $query->sort('created', 'desc')->fetch();
		$page = Registry::get('staffs_page');

		return base_url($page->slug . '/' . $staff->slug);
	}
}

function staff_next_url() {
	$page = Registry::get('staffs_page');
	$query = Staff::where('created', '>', Registry::prop('staff', 'created'))
				->where('status', '!=', 'inactive');

	if($query->count()) {
		$staff = $query->sort('created', 'asc')->fetch();
		$page = Registry::get('staffs_page');

		return base_url($page->slug . '/' . $staff->slug);
	}
}

function staff_url() {
	$page = Registry::get('staffs_page');

	return base_url($page->slug . '/' . staff_slug());
}

function staff_job_title() {
  return Registry::prop('staff', 'job_title');
}

function staff_position() {
  return Registry::prop('staff', 'position');
}

function staff_grade() {
  return Registry::prop('staff', 'grade');
}

function staff_description_html() {
	return Registry::prop('staff', 'description', false);
}

function staff_description_md() {
  return Registry::prop('staff', 'description');
}

function staff_html() {
	return parse(Registry::prop('staff', 'html'), false);
}

function staff_markdown() {
	return parse(Registry::prop('staff', 'html'));
}

function staff_time() {
	if($created = Registry::prop('staff', 'created')) {
		return Date::format($created, 'U');
	}
}

function staff_date() {
	if($created = Registry::prop('staff', 'created')) {
		return Date::format($created);
	}
}

function staff_status() {
	return Registry::prop('staff', 'status');
}

function staff_division() {
	if($division = Registry::prop('staff', 'division')) {
		$divisions = Registry::get('all_divisions');

		return $divisions[$division]->title;
	}
}

function staff_category_slug() {
	if($category = Registry::prop('staff', 'category')) {
		$categories = Registry::get('all_categories');

		return $categories[$category]->slug;
	}
}

function staff_category_url() {
	if($category = Registry::prop('staff', 'category')) {
		$categories = Registry::get('all_categories');

		return base_url('category/' . $categories[$category]->slug);
	}
}

function staff_total_comments() {
	return Registry::prop('staff', 'total_comments');
}

function staff_author() {
	return Registry::prop('staff', 'author_name');
}

function staff_author_id() {
	return Registry::prop('staff', 'author_id');
}

function staff_author_bio() {
	return Registry::prop('staff', 'author_bio');
}

function staff_custom_field($key, $default = '') {
	$id = Registry::prop('staff', 'id');

	if($extend = Extend::field('post', $key, $id)) {
		return Extend::value($extend, $default);
	}

	return $default;
}

function customised() {
	//if($itm = Registry::get('staff')) {
	//	return $itm->js or $itm->css;
	//}

	return false;
}