<?php if(auth()->check() && (auth()->user()->hasRole('student'))): ?>

<?php endif; ?>
<?php if(!auth()->check()): ?>
<div class="text-center mt-3">
    <a id="openLoginModal" data-target="#myModal" href="#" class="btn gradient-bg text-white font-weight-bold">
        <i class="far fa-heart"></i>
        <?php echo app('translator')->get('strings.frontend.general.add_to_wishlist'); ?>
    </a>
</div>
<?php endif; ?>

<?php /**PATH /home/rvtsmdqo/diagnosiaziendale.it/resources/views/frontend/layouts/partials/wishlist.blade.php ENDPATH**/ ?>