<?php $__env->startSection('title', 'Subscription Plans | '.app_name()); ?>
<?php $__env->startSection('meta_description', 'subscription plans'); ?>
<?php $__env->startSection('meta_keywords','plans'); ?>
<?php $__env->startPush('after-styles'); ?>
    <style>
        .pricing .card {
            border: none;
            border-radius: 1rem;
            transition: all 0.2s;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        }

        .pricing hr {
            margin: 1.5rem 0;
        }

        .pricing .card-title {
            margin: 0.5rem 0;
            font-size: 0.9rem;
            letter-spacing: .1rem;
            font-weight: bold;
        }

        .pricing .card-price {
            font-size: 3rem;
            margin: 0;
        }

        .pricing .card-price .period {
            font-size: 0.8rem;
        }

        .pricing ul li {
            margin-bottom: 1rem;
        }

        .pricing .text-muted {
            opacity: 0.7;
        }

        .pricing .btn {
            font-size: 80%;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            opacity: 0.7;
            transition: all 0.2s;
        }

        /* Hover Effects on Card */

        @media (min-width: 992px) {
            .pricing .card:hover {
                margin-top: -.25rem;
                margin-bottom: .25rem;
                box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
            }
            .pricing .card:hover .btn {
                opacity: 1;
            }
        }
    </style>
    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
        <div class="blakish-overlay"></div>
        <div class="container">
            <div class="page-breadcrumb-content text-center">
                <div class="page-breadcrumb-title">
                    <h2 class="breadcrumb-head black bold"><?php echo e(env('APP_NAME')); ?> <span> <?php echo app('translator')->get('labels.subscription.title'); ?></span></h2>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-page-section pricing">
        <div class="container">
            <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 mt-5">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center"><?php echo e($plan->name); ?></h5>
                                <h6 class="card-price text-center text-uppercase"><?php echo e($plan->currency); ?> <?php echo e($plan->amount); ?><span class="period">/ <?php echo e($plan->interval); ?></span></h6>
                                <hr>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong><?php echo e(trans_choice('labels.subscription.quantity', $plan->quantity, ['quantity' => $plan->quantity])); ?></strong></li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span><?php echo e(trans_choice('labels.subscription.course', $plan->course, ['quantity' => $plan->course])); ?></li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span><?php echo e(trans_choice('labels.subscription.bundle', $plan->bundle, ['quantity' => $plan->bundle])); ?></li>

                                    <?php if($plan->trial_period_days): ?>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span><?php echo e(trans_choice('labels.subscription.trial_period', $plan->bundle, ['days' => $plan->trial_period_days])); ?></li>
                                    <?php endif; ?>
                                </ul>
                                <?php if(auth()->check()): ?>
                                    <?php if(auth()->user()->subscribed('default')): ?>
                                        <?php if(auth()->user()->onPlan($plan->plan_id) && auth()->user()->subscription('default')->ends_at == null): ?>
                                        <a href="#" class="btn btn-block text-white genius-btn mt25 gradient-bg text-center text-uppercase  bold-font"><?php echo app('translator')->get('labels.subscription.already_subscribe'); ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('subscription.form', ['plan' => $plan,'name' => $plan->name])); ?>" class="btn btn-block text-white genius-btn mt25 gradient-bg text-center text-uppercase  bold-font"><?php echo app('translator')->get('labels.subscription.button'); ?></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('subscription.form', ['plan' => $plan,'name' => $plan->name])); ?>" class="btn btn-block text-white genius-btn mt25 gradient-bg text-center text-uppercase  bold-font"><?php echo app('translator')->get('labels.subscription.button'); ?></a>
                                    <?php endif; ?>
                                <?php else: ?>
                                <a id="openLoginModal" data-target="#myModal" href="#" class="btn btn-block text-white genius-btn mt25 gradient-bg text-center text-uppercase  bold-font"><?php echo app('translator')->get('labels.subscription.button'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('after-scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/stripe-form.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.app'.config('theme_layout'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rvtsmdqo/diagnosiaziendale.it/resources/views/frontend/subscription/plans.blade.php ENDPATH**/ ?>