<?php echo $header; ?>

<?php echo Html::link('admin/sectors', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('hierarchy.add', 'sector'); ?></h1>

<?php echo $messages; ?>

<div class="row">
    <div class="col-md-9">
        <form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/sectors/edit/' . $sector->id); ?>" novalidate autocomplete="off" enctype="multipart/form-data">

            <input name="token" type="hidden" value="<?php echo $token; ?>">

            <fieldset>
                <legend><?php echo __('hierarchy.detail'); ?></legend>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="title"><?php echo __('hierarchy.title'); ?></label>
                  <div class="col-lg-9">
                    <?php echo Form::text('title', Input::previous('title', $sector->title), array(
                        'class' => 'form-control',
                        'id' => 'title',
                    )); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="description"><?php echo __('hierarchy.description'); ?></label>
                  <div class="col-lg-9">
                    <?php echo Form::textarea('description', Input::previous('description', $sector->description), array(
                        'rows' => 3,
                        'class' => 'form-control',
                        'id' => 'description'
                    )); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="slug"><?php echo __('hierarchy.slug'); ?></label>
                  <div class="col-lg-6">
                    <?php echo Form::text('slug', Input::previous('slug', $sector->slug), array(
                        'class' => 'form-control',
                        'id' => 'slug',
                    )); ?>
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                    <?php echo Form::button(__('global.save'), array(
                      'type' => 'submit',
                      'class' => 'btn btn-primary'
                    )); ?>

                    <?php echo Html::link('admin/sectors/delete/' . $sector->id, __('global.delete'), array(
                    'class' => 'btn btn-danger delete'
                  )); ?>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
    <div class="col-md-3">
    	<div class="panel panel-default">
			<div class="panel-heading">Staff</div>
			<div class="panel-body">
			<?php if ($staffs->count): ?>
			<a href="<?php echo Uri::to('admin/staffs?term=sector:' . $sector->slug); ?>"><?php echo $staffs->count; ?> </a>
			<?php else: ?>
				No staff
			<?php endif; ?>
			</div>

    	</div>
		</div>
</div>
<?php echo $footer; ?>
