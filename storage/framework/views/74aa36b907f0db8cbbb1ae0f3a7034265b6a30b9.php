<?php $__env->startSection('title', __('labels.backend.tests.title').' | '.app_name()); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <h3 class="page-title float-left mb-0">
                <?php echo app('translator')->get('labels.backend.tests.title'); ?>
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><?php echo app('translator')->get('labels.backend.tests.fields.course'); ?></th>
                            <td><?php echo e(($test->course) ? $test->course->title : 'N/A'); ?></td>
                        </tr>

                        <tr>
                            <th><?php echo app('translator')->get('labels.backend.tests.fields.title'); ?></th>
                            <td><?php echo e($test->title); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('labels.backend.tests.fields.description'); ?></th>
                            <td><?php echo $test->description; ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('labels.backend.tests.fields.questions'); ?></th>
                            <td>
                                <ol class="pl-3 mb-0">
                                <?php $__currentLoopData = $test->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleQuestions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="label label-info label-many"><?php echo e($singleQuestions->question); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('labels.backend.tests.fields.published'); ?></th>
                            <td><?php echo e(Form::checkbox("published", 1, $test->published == 1 ? true : false, ["disabled"])); ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <a href="<?php echo e(route('admin.tests.index')); ?>" class="btn btn-default border"><?php echo app('translator')->get('strings.backend.general.app_back_to_list'); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\diagnosi\resources\views/backend/tests/show.blade.php ENDPATH**/ ?>