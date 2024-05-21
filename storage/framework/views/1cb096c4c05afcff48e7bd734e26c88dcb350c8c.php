<?php $__env->startPush('after-styles'); ?>
    <?php echo $__env->make('log-viewer::_template.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content-header'); ?>
<?php $__env->startSection('page-header'); ?>
    <h5 class="mb-4">Log [<?php echo e($log->date); ?>]</h5>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-2">
            <?php echo $__env->make('log-viewer::_partials.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-10">
            
            <div class="card">
                <div class="card-header">
                    Log info :
                    <div class="float-right">
                        <a href="<?php echo e(route('log-viewer::logs.download', [$log->date])); ?>" class="btn btn-sm btn-success">
                            <i class="fa fa-download"></i> DOWNLOAD
                        </a>
                        <a href="#delete-log-modal" class="btn btn-sm btn-danger" data-toggle="modal" data-backdrop="false">
                            <i class="fa fa-trash"></i> DELETE
                        </a>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-2">
                                File path:
                            </div>
                            <div class="col-sm-10">
                                <?php echo e($log->getPath()); ?>

                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-auto">
                                Log entries: <span class="badge badge-primary"><?php echo e($entries->total()); ?></span>
                            </div>
                            <div class="col-sm-auto">
                                Size: <span class="badge badge-primary"><?php echo e($log->size()); ?></span>
                            </div>
                            <div class="col-sm-auto">
                                Created at: <span class="badge badge-primary"><?php echo e($log->createdAt()); ?></span>
                            </div>
                            <div class="col-sm-auto">
                                Updated at: <span class="badge badge-primary"><?php echo e($log->updatedAt()); ?></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            
            <div class="card mt-4">
                <?php if($entries->hasPages()): ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <?php echo $entries->appends(compact('query'))->render('log-viewer::_pagination.bootstrap-4'); ?>

                            </div>
                            <div class="col text-right">
                                <span class="badge badge-info">
                                    Page <?php echo $entries->currentPage(); ?> of <?php echo $entries->lastPage(); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="entries" class="table" style="word-break: break-word;">
                            <thead>
                            <tr>
                                <th>ENV</th>
                                <th>Level</th>
                                <th>Time</th>
                                <th>Header</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <span class="badge badge-env"><?php echo e($entry->env); ?></span>
                                    </td>
                                    <td>
                                    <span class="badge level level-<?php echo e($entry->level); ?>">
                                        <?php echo $entry->level(); ?>

                                    </span>
                                    </td>
                                    <td>
                                    <span class="badge badge-default">
                                        <?php echo e($entry->datetime->format('H:i:s')); ?>

                                    </span>
                                    </td>
                                    <td>
                                        <?php echo e($entry->header); ?>

                                    </td>
                                    <td class="text-right">
                                        <?php if($entry->hasStack()): ?>
                                            <a class="btn btn-sm btn-outline-info" role="button" data-toggle="collapse" href="#log-stack-<?php echo e($key); ?>" aria-expanded="false" aria-controls="log-stack-<?php echo e($key); ?>">
                                                <i class="fa fa-toggle-on"></i> Stack
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php if($entry->hasStack()): ?>
                                    <tr class="stack-content collapse" id="log-stack-<?php echo e($key); ?>">
                                        <td colspan="5" class="stack">
                                            <?php echo trim($entry->stack()); ?>

                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <span class="badge badge-default"><?php echo e(__('log-viewer::general.empty-logs')); ?></span>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div><!--table-responsive-->
                </div><!--card-body-->
                <?php if($entries->hasPages()): ?>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <?php echo $entries->appends(compact('query'))->render('log-viewer::_pagination.bootstrap-4'); ?>

                            </div>
                            <div class="col text-right">
                            <span class="badge badge-info">
                                Page <?php echo $entries->currentPage(); ?> of <?php echo $entries->lastPage(); ?>

                            </span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div id="delete-log-modal" class="modal fade">
        <div class="modal-dialog">
            <form id="delete-log-form" action="<?php echo e(route('log-viewer::logs.delete')); ?>" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input type="hidden" name="date" value="<?php echo e($log->date); ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Log File</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to <span class="badge badge-danger">DELETE</span> this log file <span class="badge badge-primary"><?php echo e($log->date); ?></span> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-danger" data-loading-text="Loading&hellip;"><i class="fa fa-trash"></i> DELETE FILE</button>
                        <button type="button" class="btn btn-sm btn-primary pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-scripts'); ?>
    <script>
        $(function () {
            var deleteLogModal = $('#delete-log-modal'),
                deleteLogForm  = $('#delete-log-form'),
                submitBtn      = deleteLogForm.find('button[type=submit]');

            deleteLogForm.on('submit', function(event) {
                event.preventDefault();
                submitBtn.button('loading');

                $.ajax({
                    url:      $(this).attr('action'),
                    type:     $(this).attr('method'),
                    dataType: 'json',
                    data:     $(this).serialize(),
                    success: function(data) {
                        submitBtn.button('reset');
                        if (data.result === 'success') {
                            deleteLogModal.modal('hide');
                            location.replace("<?php echo e(route('log-viewer::logs.list')); ?>");
                        }
                        else {
                            alert('OOPS ! This is a lack of coffee exception!')
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert('AJAX ERROR ! Check the console !');
                        console.error(errorThrown);
                        submitBtn.button('reset');
                    }
                });

                return false;
            });

            <?php if (! (empty(log_styler()->toHighlight()))): ?>
            <?php
                $htmlHighlight = version_compare(PHP_VERSION, '7.4.0') >= 0
                    ? join('|', log_styler()->toHighlight())
                    : join(log_styler()->toHighlight(), '|');
            ?>

            $('.stack-content').each(function() {
                var $this = $(this);
                var html = $this.html().trim()
                    .replace(/(<?php echo $htmlHighlight; ?>)/gm, '<strong>$1</strong>');

                $this.html(html);
            });
            <?php endif; ?>
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rvtsmdqo/diagnosiaziendale.it/resources/views/vendor/log-viewer/bootstrap-4/show.blade.php ENDPATH**/ ?>