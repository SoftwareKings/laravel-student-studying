    

    <?php $__env->startSection('content'); ?>
    <div class="row justify-content-center align-items-center mb-3">
        <div class="col col-sm-12 align-self-center">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0"><?php echo app('translator')->get('navs.frontend.user.addtime_limit'); ?></h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.add_time_limit')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class='row'>
                           
                            <div class="col-md-3 form-group">
                                <label for=""><?php echo app('translator')->get('navs.frontend.user.addtime_limit'); ?></label>
                                <input id='hdnid' type='hidden' value='<?php echo e($planDate[0]->id); ?>' name='hdnid' />
                                <input type='number'  name="time_limit" id="time_limit" value='<?php echo e($planDate[0]->time_limit); ?>' class='form-control'/>
                                <!-- <input type="datetime-local" name="time_limit" id="time_limit" class='form-control'> -->
                            </div>
                        </div>
                        <button class='btn btn-success'>Save</button>
                    </form>

                </div>
                <!--card body-->
            </div><!-- card -->
        </div><!-- col-xs-12 -->
    </div><!-- row -->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\diagnosi\resources\views/backend/time_limit/create.blade.php ENDPATH**/ ?>