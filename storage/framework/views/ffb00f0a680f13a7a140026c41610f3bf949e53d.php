<?php $__env->startSection('title', __('labels.backend.zoom_setting.management').' | '.app_name()); ?>

<?php $__env->startSection('content'); ?>
    <?php echo e(html()->form('POST', route('admin.zoom-settings'))->class('form-horizontal')->open()); ?>


    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        <?php echo e(__('labels.backend.zoom_setting.management')); ?>

                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr/>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        <?php echo Form::label('zoom__api_key', trans('labels.backend.zoom_setting.fields.api_key').'*', ['class' => 'col-md-2 form-control-label']); ?>

                        <div class="col-md-10">
                            <?php echo Form::text('zoom__api_key', config('zoom.api_key'), ['class' => 'form-control', 'placeholder' => trans('labels.backend.zoom_setting.fields.api_key'), 'required' => 'true']); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('zoom__api_secret', trans('labels.backend.zoom_setting.fields.api_secret').'*', ['class' => 'col-md-2 form-control-label']); ?>

                        <div class="col-md-10">
                            <?php echo Form::text('zoom__api_secret', config('zoom.api_secret'), ['class' => 'form-control', 'placeholder' => trans('labels.backend.zoom_setting.fields.api_secret'), 'required' => true]); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('zoom__approval_type', trans('labels.backend.zoom_setting.fields.meeting_join_approval'), ['class' => 'col-md-2 form-control-label']); ?>

                        <div class="col-md-10">
                            <?php echo Form::select('zoom__approval_type', ['0'=> trans('labels.backend.zoom_setting.meeting_approval_options.automatically'), '1' => trans('labels.backend.zoom_setting.meeting_approval_options.manually'), '2' => trans('labels.backend.zoom_setting.meeting_approval_options.no_registration_required')], config('zoom.approval_type'), ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('zoom__audio', trans('labels.backend.zoom_setting.fields.audio_option'), ['class' => 'col-md-2 form-control-label']); ?>

                        <div class="col-md-10">
                            <?php echo Form::select('zoom__audio', ['both'=> trans('labels.backend.zoom_setting.audio_options.both'), 'telephony' => trans('labels.backend.zoom_setting.audio_options.telephony'), 'voip' => trans('labels.backend.zoom_setting.audio_options.voip')],config('zoom.audio'), ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('zoom__auto_recording', trans('labels.backend.zoom_setting.fields.auto_recording'), ['class' => 'col-md-2 form-control-label']); ?>

                        <div class="col-md-10">
                            <?php echo Form::select('zoom__auto_recording', ['none'=> trans('labels.backend.zoom_setting.auto_recording_options.none'), 'local' => trans('labels.backend.zoom_setting.auto_recording_options.local'), 'cloud' => trans('labels.backend.zoom_setting.auto_recording_options.cloud')],config('zoom.auto_recording'), ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('zoom__timezone', trans('labels.backend.zoom_setting.fields.timezone'), ['class' => 'col-md-2 form-control-label']); ?>

                        <div class="col-md-10">
                            <select name="zoom__timezone" class="form-control select2">
                                <option> Select Timezone</option>
                                <?php $__currentLoopData = \DateTimeZone::listIdentifiers(DateTimeZone::ALL); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time_zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($time_zone); ?>"
                                        <?php echo e((config('zoom.timezone')? config('zoom.timezone'):'UTC') == $time_zone?'selected':''); ?>>
                                        <?php echo e($time_zone); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('zoom__join_before_host', trans('labels.backend.zoom_setting.fields.join_before_host'), ['class' => 'col-md-2 form-control-label']); ?>

                        <div class="col-md-10">
                            <div class="checkbox">
                                <?php echo e(html()->label(
                                       html()->checkbox('zoom__join_before_host', config('zoom.join_before_host')? true : false, 1)
                                             ->class('switch-input')->value(1)
                                       . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                   ->class('switch switch-sm switch-3d switch-primary')); ?>

                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <?php echo Form::label('zoom__host_video', trans('labels.backend.zoom_setting.fields.host_video'), ['class' => 'col-md-2 form-control-label']); ?>

                        <div class="col-md-10">
                            <div class="checkbox">
                                <?php echo e(html()->label(
                                       html()->checkbox('zoom__host_video', config('zoom.host_video')? true: false, 1)
                                             ->class('switch-input')->value(1)
                                       . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                   ->class('switch switch-sm switch-3d switch-primary')); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('zoom__participant_video', trans('labels.backend.zoom_setting.fields.participant_video'), ['class' => 'col-md-2 form-control-label']); ?>

                        <div class="col-md-10">
                            <div class="checkbox">
                                <?php echo e(html()->label(
                                       html()->checkbox('zoom__participant_video', config('zoom.participant_video')? true: false, 1)
                                             ->class('switch-input')->value(1)
                                       . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                   ->class('switch switch-sm switch-3d switch-primary')); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('zoom__mute_upon_entry', trans('labels.backend.zoom_setting.fields.participant_mic_mute'), ['class' => 'col-md-2 form-control-label']); ?>

                        <div class="col-md-10">
                            <div class="checkbox">
                                <?php echo e(html()->label(
                                       html()->checkbox('zoom__mute_upon_entry',config('zoom.mute_upon_entry')? true : false, 1)
                                             ->class('switch-input')->value(1)
                                       . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                   ->class('switch switch-sm switch-3d switch-primary')); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('zoom__waiting_room', trans('labels.backend.zoom_setting.fields.waiting_room'), ['class' => 'col-md-2 form-control-label']); ?>

                        <div class="col-md-10">
                            <div class="checkbox">
                                <?php echo e(html()->label(
                                       html()->checkbox('zoom__waiting_room', config('zoom.waiting_room')? true : false,1)
                                             ->class('switch-input')->value(1)
                                       . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                   ->class('switch switch-sm switch-3d switch-primary')); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer clearfix">
            <div class="row">
                <div class="col">
                    <?php echo e(form_cancel(route('admin.zoom-settings'), __('buttons.general.cancel'))); ?>

                </div><!--col-->

                <div class="col text-right">
                    <?php echo e(form_submit(__('buttons.general.crud.update'))); ?>

                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div>

    <?php echo e(html()->form()->close()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\diagnosi\resources\views/backend/settings/zoom.blade.php ENDPATH**/ ?>