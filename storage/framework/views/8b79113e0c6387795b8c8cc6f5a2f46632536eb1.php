<?php $__env->startSection('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>
    <?php echo $__env->make('backend.auth.user.includes.breadcrumb-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo e(html()->form('POST', route('admin.auth.user.store'))->class('form-horizontal')->open()); ?>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            <?php echo app('translator')->get('labels.backend.access.users.management'); ?>
                            <small class="text-muted"><?php echo app('translator')->get('labels.backend.access.users.create'); ?></small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            <?php echo e(html()->label(__('validation.attributes.backend.access.users.first_name'))->class('col-md-2 form-control-label')->for('first_name')); ?>


                            <div class="col-md-10">
                                <?php echo e(html()->text('first_name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.users.first_name'))
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus()); ?>

                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                        <?php echo e(html()->label(__('validation.attributes.backend.access.users.last_name'))->class('col-md-2 form-control-label')->for('last_name')); ?>


                            <div class="col-md-10">
                                <?php echo e(html()->text('last_name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.users.last_name'))
                                    ->attribute('maxlength', 191)
                                    ->required()); ?>

                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <?php echo e(html()->label(__('validation.attributes.backend.access.users.email'))->class('col-md-2 form-control-label')->for('email')); ?>


                            <div class="col-md-10">
                                <?php echo e(html()->email('email')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.users.email'))
                                    ->attribute('maxlength', 191)
                                    ->required()); ?>

                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <?php echo e(html()->label(__('validation.attributes.backend.access.users.password'))->class('col-md-2 form-control-label')->for('password')); ?>


                            <div class="col-md-10">
                                <?php echo e(html()->password('password')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.users.password'))
                                    ->required()); ?>

                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <?php echo e(html()->label(__('validation.attributes.backend.access.users.password_confirmation'))->class('col-md-2 form-control-label')->for('password_confirmation')); ?>


                            <div class="col-md-10">
                                <?php echo e(html()->password('password_confirmation')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.users.password_confirmation'))
                                    ->required()); ?>

                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <?php echo e(html()->label(__('validation.attributes.backend.access.users.active'))->class('col-md-2 form-control-label')->for('active')); ?>


                            <div class="col-md-10">
                                <label class="switch switch-label switch-pill switch-primary">
                                    <?php echo e(html()->checkbox('active', true, '1')->class('switch-input')); ?>

                                    <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                                </label>
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <?php echo e(html()->label(__('validation.attributes.backend.access.users.confirmed'))->class('col-md-2 form-control-label')->for('confirmed')); ?>


                            <div class="col-md-10">
                                <label class="switch switch-label switch-pill switch-primary">
                                    <?php echo e(html()->checkbox('confirmed', true, '1')->class('switch-input')); ?>

                                    <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                                </label>
                            </div><!--col-->
                        </div><!--form-group-->

                        <?php if(! config('access.users.requires_approval')): ?>
                            <div class="form-group row">
                                <?php echo e(html()->label(__('validation.attributes.backend.access.users.send_confirmation_email') . '<br/>' . '<small>' .  __('strings.backend.access.users.if_confirmed_off') . '</small>')->class('col-md-2 form-control-label')->for('confirmation_email')); ?>


                                <div class="col-md-10">
                                    <label class="switch switch-label switch-pill switch-primary">
                                        <?php echo e(html()->checkbox('confirmation_email', true, '1')->class('switch-input')); ?>

                                        <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                                    </label>
                                </div><!--col-->
                            </div><!--form-group-->
                        <?php endif; ?>

                        <div class="form-group row">
                            <?php echo e(html()->label(__('labels.backend.access.users.table.abilities'))->class('col-md-2 form-control-label')); ?>


                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('labels.backend.access.users.table.roles'); ?></th>
                                            <th><?php echo app('translator')->get('labels.backend.access.users.table.permissions'); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <?php if($roles->count()): ?>
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <div class="checkbox d-flex align-items-center">
                                                                    <?php echo e(html()->label(
                                                                            html()->checkbox('roles[]', old('roles') && in_array($role->name, old('roles')) ? true : false, $role->name)
                                                                                  ->class('switch-input')
                                                                                  ->id('role-'.$role->id)
                                                                            . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                                        ->class('switch switch-label switch-pill switch-primary mr-2')
                                                                        ->for('role-'.$role->id)); ?>

                                                                    <?php echo e(html()->label(ucwords($role->name))->for('role-'.$role->id)); ?>

                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <?php if($role->id != 1): ?>
                                                                    <?php if($role->permissions->count()): ?>
                                                                        <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <i class="fas fa-dot-circle"></i> <?php echo e(ucwords($permission->name)); ?>

                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php else: ?>
                                                                        <?php echo app('translator')->get('labels.general.none'); ?>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <?php echo app('translator')->get('labels.backend.access.users.all_permissions'); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div><!--card-->
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($permissions->count()): ?>
                                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="checkbox d-flex align-items-center">
                                                            <?php echo e(html()->label(
                                                                    html()->checkbox('permissions[]', old('permissions') && in_array($permission->name, old('permissions')) ? true : false, $permission->name)
                                                                          ->class('switch-input')
                                                                          ->id('permission-'.$permission->id)
                                                                        . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                                    ->class('switch switch-label switch-pill switch-primary mr-2')
                                                                ->for('permission-'.$permission->id)); ?>

                                                            <?php echo e(html()->label(ucwords($permission->name))->for('permission-'.$permission->id)); ?>

                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--col-->
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        <?php echo e(form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel'))); ?>

                    </div><!--col-->

                    <div class="col text-right">
                        <?php echo e(form_submit(__('buttons.general.crud.create'))); ?>

                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    <?php echo e(html()->form()->close()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\diagnosi\resources\views/backend/auth/user/create.blade.php ENDPATH**/ ?>