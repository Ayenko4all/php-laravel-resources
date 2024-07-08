

<?php $__env->startSection('app_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_postfix'); ?>
Edit User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_title'); ?>
    User Detail
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_title_subtext'); ?>
<a class="ms-1" href="<?php echo e(route('fc.users.index')); ?>">
    <i class="bx bx-chevron-left"></i> Back to users
</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_title_buttons'); ?>
    <a href="#" title="Edit" data-val='<?php echo e($edited_user->id); ?>' class='btn-edit-mdl-user-modal' data-toggle="tooltip">
        <?php echo Form::button('<i class="fa fa-edit zmdi zmdi-border-color txt-warning"></i>', ['type'=>'button']); ?>

    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card border-top border-0 border-4 border-primary">
    <div class="card-body p-4">

        <div class="card-title d-flex align-items-center">
            <div>
                <i class="bx bxs-user me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">User Details</h5>
        </div>


        <?php echo $__env->make('hasob-foundation-core::users.show_fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
</div>

<?php echo $__env->make('hasob-foundation-core::users.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_scripts'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\php-laravel resources\hasob-foundation-core-bs-5\src/../resources/views/users/edit.blade.php ENDPATH**/ ?>