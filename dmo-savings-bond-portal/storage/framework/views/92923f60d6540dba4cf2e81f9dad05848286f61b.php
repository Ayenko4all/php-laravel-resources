<div class="d-flex flex-wrap" style="">
    <div class="col-sm-6 mt-4">
        <h5>Personal Detail</h5>
        <div id="div_offer_status" class="col-sm-12 mb-10">
            <p>
                <?php echo Form::label('status', 'Status:', ['class'=>'control-label']); ?>

                <span id="spn_user_presence_status">
        <?php if(isset($edited_user->presence_status) && empty($edited_user->presence_status)==false): ?>
                        <?php echo $edited_user->presence_status; ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
        </span>
            </p>
        </div>

        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                <?php echo Form::label('full_name', 'Full Name:', ['class'=>'control-label']); ?>

                <span id="spn_user_full_name_label">
        <?php if(isset($edited_user->full_name) && empty($edited_user->full_name)==false): ?>
                        <?php echo $edited_user->full_name; ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
        </span>
            </p>
        </div>

        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                <?php echo Form::label('first_name', 'First Name:', ['class'=>'control-label']); ?>

                <span id="spn_user_first_name">
        <?php if(isset($edited_user->first_name) && empty($edited_user->first_name)==false): ?>
                        <?php echo $edited_user->first_name; ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
        </span>
            </p>
        </div>

        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                <?php echo Form::label('last_name', 'Last Name:', ['class'=>'control-label']); ?>

                <span id="spn_user_last_name">
        <?php if(isset($edited_user->last_name) && empty($edited_user->last_name)==false): ?>
                        <?php echo $edited_user->last_name; ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
        </span>
            </p>
        </div>

        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                <?php echo Form::label('middle_name', 'Middle Name:', ['class'=>'control-label']); ?>

                <span id="spn_user_middle_name">
        <?php if(isset($edited_user->middle_name) && empty($edited_user->middle_name)==false): ?>
                        <?php echo $edited_user->middle_name; ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
        </span>
            </p>
        </div>

        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                <?php echo Form::label('telephone', 'Telephone:', ['class'=>'control-label']); ?>

                <span id="spn_user_telephone">
        <?php if(isset($edited_user->telephone) && empty($edited_user->telephone)==false): ?>
                        <?php echo $edited_user->telephone; ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
        </span>
            </p>
        </div>

        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                <?php echo Form::label('email', 'Email:', ['class'=>'control-label']); ?>

                <span id="spn_user_email">
                    <?php if(isset($edited_user->email) && empty($edited_user->email)==false): ?>
                        <?php echo $edited_user->email; ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </span>
            </p>
        </div>
        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                <?php echo Form::label('title', 'Title:', ['class'=>'control-label']); ?>

                <span id="spn_user_title">
                    <?php if(isset($edited_user->title) && empty($edited_user->title)==false): ?>
                        <?php echo $edited_user->title; ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </span>
            </p>
        </div>
        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                <?php echo Form::label('job_title', 'Email:', ['class'=>'control-label']); ?>

                <span id="spn_user_job_title">
                    <?php if(isset($edited_user->job_title) && empty($edited_user->job_title)==false): ?>
                        <?php echo $edited_user->job_title; ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </span>
            </p>
        </div>
    </div>

    <div id="div_offer_offer_title" class="col-sm-6 mb-10 mt-4">
        <h5>Organization Detail</h5>
        <?php if(isset($edited_user->organization)): ?>
            <p>
                <?php echo Form::label('organization_org', 'Organization org:', ['class'=>'control-label']); ?>

                <span>
                    <?php if(isset($edited_user->organization->org)): ?>
                        <?php echo $edited_user->organization->org; ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </span>
            </p>
            <p>
                <?php echo Form::label('organization_domain', 'Organization domain:', ['class'=>'control-label']); ?>

                <span>
                    <?php if(isset($edited_user->organization->domain)): ?>
                        <?php echo $edited_user->organization->domain; ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </span>
            </p>
            <p>
                <?php echo Form::label('organization_url', 'Organization url:', ['class'=>'control-label']); ?>

                <span>
                    <?php if(isset($edited_user->organization->full_url)): ?>
                        <?php echo $edited_user->organization->full_url; ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </span>
            </p>
        <?php else: ?>
            N/A
        <?php endif; ?>

    </div>

    <div id="div_offer_offer_title" class="col-sm-6 mb-10 mt-4">
        <h5>Department Detail</h5>
        <?php if(isset($edited_user->department)): ?>
            <p>
                <?php echo Form::label('department_key', 'Key:', ['class'=>'control-label']); ?>

                <span>
                    <?php if(isset($edited_user->department->key)): ?>
                        <?php echo $edited_user->department->key; ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </span>
            </p>
            <p>
                <?php echo Form::label('department_name', 'Name:', ['class'=>'control-label']); ?>

                <span>
                    <?php if(isset($edited_user->department->long_name)): ?>
                        <?php echo $edited_user->department->long_name; ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </span>
            </p>
        <?php else: ?>
            N/A
        <?php endif; ?>
    </div>

    <div id="div_offer_offer_title" class="col-sm-6 mb-10 mt-4">
        <h5>Role Detail</h5>

        <?php if(isset($edited_user) && $edited_user->roles->isNotEmpty()): ?>
            <?php $__currentLoopData = $edited_user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p>
                    <?php echo Form::label('role', 'Role Name:', ['class'=>'control-label']); ?>

                    <span>
                        <?php if(isset($role->name)): ?>
                            <?php echo $role->name; ?>

                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </span>
                </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            N/A
        <?php endif; ?>
    </div>
</div>




<?php /**PATH C:\laragon\www\php-laravel resources\hasob-foundation-core-bs-5\src/../resources/views/users/show_fields.blade.php ENDPATH**/ ?>