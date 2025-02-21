
<!-- Start popular course
       ============================================= -->
<?php if(count($popular_courses) > 0): ?>
    <section id="popular-course" style="margin-top: 4rem;" class="popular-course-section <?php echo e(isset($class) ? $class : ''); ?>">
        <div class="container">
            
            <div id="course-slide-item" class="course-slide">
                <?php $__currentLoopData = $popular_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="course-item-pic-text ">
                        <div class="course-pic relative-position mb25" <?php if($item->course_image != ""): ?>  style="background-image: url(<?php echo e(asset('storage/uploads/'.$item->course_image)); ?>)" <?php endif; ?>>


                            <div class="course-price text-center gradient-bg">
                                <?php if($item->free == 1): ?>
                                    <span> <?php echo e(trans('labels.backend.courses.fields.free')); ?></span>
                                <?php else: ?>
                                   <span>
                                        <?php echo $item->strikePrice; ?>

                                       <?php echo e($appCurrency['symbol'].' '.$item->price); ?>

                                   </span>
                                <?php endif; ?>
                            </div>
                            <div class="course-details-btn">
                                <a class="text-uppercase" href="<?php echo e(route('courses.show', [$item->slug])); ?>"><?php echo app('translator')->get('labels.frontend.layouts.partials.course_detail'); ?> <i
                                            class="fas fa-arrow-right"></i></a>
                            </div>

                        </div>
                        <div class="course-item-text">
                            
                            <div class="course-title mt10 headline pb45 relative-position">
                                <h3><a href="<?php echo e(route('courses.show', [$item->slug])); ?>"><?php echo e($item->title); ?></a>
                                    <?php if($item->trending == 1): ?>
                                        <span
                                                class="trend-badge text-uppercase bold-font"><i
                                                    class="fas fa-bolt"></i> <?php echo app('translator')->get('labels.frontend.badges.trending'); ?></span>
                                    <?php endif; ?>

                                </h3>
                            </div>
                            
                            <?php echo $__env->make('frontend.layouts.partials.wishlist',['course' => $item->id, 'price' => $item->price], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <!-- /item -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!-- End popular course
        ============================================= -->
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/frontend/layouts/partials/popular_courses.blade.php ENDPATH**/ ?>