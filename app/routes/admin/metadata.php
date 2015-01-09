<?php

Route::collection(array('before' => 'auth,admin,csrf'), function() {

	/*
		List Metadata
	*/
	Route::get('admin/setting/metadata', function() {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();

		$vars['meta'] = Config::get('meta');

		$vars['pages'] = Page::dropdown();
        $themes = array();

        foreach(Themes::all() as $theme => $about):
            $themes[$theme] = $about['name'] . __('metadata.by') . $about['author'];
        endforeach;

        $vars['themes'] = $themes;

		return View::create('setting/metadata/edit', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	/*
		Update Metadata
	*/
	Route::post('admin/setting/metadata', function() {
		$input = Input::get(array(
			'sitename',
			'description',
			'home_page',
			'staffs_page',
			'management_page',
			'staffs_per_page',
			'category',
			'show_message',
			'show_rating',
			'show_division_meta',
			'show_hierarchy',
			'show_direct_report',
			'show_personal_assistant',
			'auto_published_comments',
			'theme',
			'comment_notifications',
			'comment_moderation_keys'));

		$validator = new Validator($input);

		$validator->check('sitename')
			->is_max(3, __('metadata.sitename_missing'));

		$validator->check('description')
			->is_max(3, __('metadata.sitedescription_missing'));

		$validator->check('staffs_per_page')
			->is_regex('#^[0-9]+$#', __('metadata.missing_staffs_per_page', 'Please enter a number for staffs per page'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::error($errors);

			return Response::redirect('admin/setting/metadata');
		}

		// convert double quotes so we dont break html
		$input['sitename'] = e($input['sitename'], ENT_COMPAT);
		$input['description'] = e($input['description'], ENT_COMPAT);

		foreach($input as $key => $value) {
			Query::table(Base::table('meta'))->where('key', '=', $key)->update(array('value' => $value));
		}

		Notify::success(__('metadata.updated'));

		return Response::redirect('admin/setting/metadata');
	});

});
