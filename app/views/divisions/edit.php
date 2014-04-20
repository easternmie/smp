<?php echo $header; ?>

<?php echo Html::link('admin/divisions', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('division.add'); ?></h1>

<?php echo $messages; ?>

<div class="row">
    <div class="col-lg-9">
        <form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/divisions/edit/' . $division->id); ?>" novalidate autocomplete="off" enctype="multipart/form-data">

            <input name="token" type="hidden" value="<?php echo $token; ?>">

            <fieldset>
                <legend><?php echo __('division.detail'); ?></legend>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="title"><?php echo __('broadcasts.title'); ?></label>
                  <div class="col-lg-9">
                    <?php echo Form::text('title', Input::previous('title', $division->title), array(
                        'class' => 'form-control',
                        'id' => 'title',
                    )); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="description"><?php echo __('broadcasts.description'); ?></label>
                  <div class="col-lg-9">
                    <?php echo Form::textarea('description', Input::previous('description', $division->description), array(
                        'rows' => 3,
                        'class' => 'form-control',
                        'id' => 'description'
                    )); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="slug"><?php echo __('broadcasts.slug'); ?></label>
                  <div class="col-lg-6">
                    <?php echo Form::text('slug', Input::previous('slug', $division->slug), array(
                        'class' => 'form-control',
                        'id' => 'slug',
                    )); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="order"><?php echo __('broadcasts.order'); ?></label>
                  <div class="col-lg-2">
                    <?php echo Form::text('order', Input::previous('order', $division->order), array(
                        'class' => 'form-control',
                        'id' => 'order',
                    )); ?>
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                    <?php echo Form::button(__('global.save'), array(
                      'type' => 'submit', 
                      'class' => 'btn btn-primary'
                    )); ?>

                    <?php echo Html::link('admin/divisions/delete/' . $division->id, __('global.delete'), array(
                    'class' => 'btn btn-danger delete'
                  )); ?>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
</div>

<?php echo $footer; ?>