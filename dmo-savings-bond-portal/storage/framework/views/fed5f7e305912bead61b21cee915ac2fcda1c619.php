

<?php $__env->startSection('app_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_postfix'); ?>
    User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_title'); ?>
    User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_title_subtext'); ?>
    <a class="ms-1" href="<?php echo e(route('dashboard')); ?>">
        <i class="bx bx-chevron-left"></i> Back to Dashboard
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_title_buttons'); ?>
    <a id="btn-new-mdl-user-modal" class="btn btn-primary btn-new-mdl-user-modal">
        <i class="bx bx-book-add mr-1"></i>New User
    </a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 hidden-sm hidden-xs">
        
    </div>

    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <?php echo $__env->make('hasob-foundation-core::users.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>

        </div>
    </div>

    <?php echo $__env->make('hasob-foundation-core::users.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('side-panel'); ?>
    <div class="card radius-5 border-top border-0 border-4 border-primary">
        <div class="card-body">
            <div><h5 class="card-title">More Information</h5></div>
            <p class="small">
                This is the help message.
                This is the help message.
                This is the help message.
            </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_scripts'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\php-laravel resources\hasob-foundation-core-bs-5\src/../resources/views/users/index.blade.php ENDPATH**/ ?>