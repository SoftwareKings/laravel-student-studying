<div class="card">
    <div class="card-header">
        <i class="fa fa-fw fa-flag"></i> Levels
    </div>
    <ul class="list-group list-group-flush">
        <?php $__currentLoopData = $log->menu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item['count'] === 0): ?>
                <a class="list-group-item disabled">
                    <span class="badge level level-none">
                        <?php echo $item['icon']; ?> <?php echo e($item['name']); ?>

                    </span>
                </a>
            <?php else: ?>
                <a href="<?php echo e($item['url']); ?>" class="list-group-item <?php echo e($level); ?>">
                    <span class="badge level level-<?php echo e($level); ?> float-left">
                        <?php echo $item['icon']; ?> <?php echo e($item['name']); ?>

                    </span>
                    <span class="badge badge-pill level level-<?php echo e($level); ?> float-right">
                        <?php echo e($item['count']); ?>

                    </span>
                </a>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH /home/rvtsmdqo/diagnosiaziendale.it/resources/views/vendor/log-viewer/_partials/menu.blade.php ENDPATH**/ ?>