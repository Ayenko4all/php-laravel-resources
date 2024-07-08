<div class="modal fade" id="mdl-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 id="lbl-offer-modal-title" class="modal-title">User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div id="div-user-modal-error" class="alert alert-danger" role="alert"></div>
                <form class="form-horizontal" id="frm-user-modal" role="form" method="POST" enctype="multipart/form-data" action="">
                    <div class="row">
                        <div class="col-lg-12 ma-10">

                            <?php echo csrf_field(); ?>

                            <div class="offline-flag"><span class="offline">You are currently offline</span></div>
                            <div id="spinner-user" class="">
                                <div class="loader" id="loader-1"></div>
                            </div>

                            <input type="hidden" id="txt-user-primary-id" value="0" />
                            <div id="div-show-txt-user-primary-id">
                                <div class="row">
                                    <div class="col-lg-12 ma-10">
                                        <?php echo $__env->make('hasob-foundation-core::users.show_fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>
                            <div id="div-edit-txt-user-primary-id">
                                <div class="row">
                                    <div class="col-lg-12 ma-10">
                                        <?php echo $__env->make('hasob-foundation-core::users.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <div id="div-save-mdl-user-modal" class="modal-footer">
                <hr class="light-grey-hr mb-10" />
                <button type="button" class="btn btn-primary" id="btn-save-mdl-user-modal" value="add">Save</button>
            </div>

        </div>
    </div>
</div>

<?php $__env->startPush('page_scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.offline').hide();

            //Show Modal for New Entry
            $(document).on('click', ".btn-new-mdl-user-modal", function(e) {
                $('#div-user-modal-error').hide();
                $('#mdl-user-modal').modal('show');
                $('#frm-user-modal').trigger("reset");
                $('#txt-user-primary-id').val(0);

                $('#div-show-txt-user-primary-id').hide();
                $('#div-edit-txt-user-primary-id').show();

                $("#spinner-user").hide();
                $("#div-save-mdl-user-modal").attr('disabled', false);
            });

            //Show Modal for View
            $(document).on('click', ".btn-show-mdl-user-modal", function(e) {
                e.preventDefault();
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

                //check for internet status
                if (!window.navigator.onLine) {
                    $('.offline').fadeIn(300);
                    return;
                }else{
                    $('.offline').fadeOut(300);
                }

                $('#div-user-modal-error').hide();
                $('#mdl-user-modal').modal('show');
                $('#frm-user-modal').trigger("reset");

                $("#spinner-user").show();
                $("#div-save-mdl-user-modal").attr('disabled', true);

                $('#div-show-txt-user-primary-id').show();
                $('#div-edit-txt-user-primary-id').hide();
                let itemId = $(this).attr('data-val');

                $.get( "<?php echo e(route('fc.user.show','')); ?>/"+itemId).done(function( response ) {
                    console.log(response);
                    $('#txt-user-primary-id').val(response.id);
                    $('#spn_user_full_name_label').html(response.full_name);
                    $('#spn_user_presence_status').html(response.presence_status);
                    $('#spn_user_email').html(response.email);
                    $('#spn_user_title').html(response.title);
                    $('#spn_user_job_title').html(response.job_title);
                    $('#spn_user_physical_location').html(response.physical_location);
                    $('#spn_user_first_name').html(response.first_name);
                    $('#spn_user_telephone').html(response.telephone);
                    $('#spn_user_last_name').html(response.last_name);
                    $('#spn_user_middle_name').html(response.middle_name);


                    $("#spinner-user").hide();
                    $("#div-save-mdl-user-modal").attr('disabled', false);
                });
            });

            //Show Modal for Edit
            $(document).on('click', ".btn-edit-mdl-user-modal", function(e) {
                e.preventDefault();
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

                $('#div-user-modal-error').hide();
                $('#mdl-user-modal').modal('show');
                $('#frm-user-modal').trigger("reset");

                $("#spinner-user").show();
                $("#div-save-mdl-user-modal").attr('disabled', true);

                $('#div-show-txt-user-primary-id').hide();
                $('#div-password').hide();
                $('#div-password-confirmation').hide();
                $('#div-edit-txt-user-primary-id').show();
                let itemId = $(this).attr('data-val');
                console.log(itemId);
                $.get( "<?php echo e(route('fc.user.show','')); ?>/"+itemId).done(function( response ) {
                    // console.log(response.roles);
                    $('#txt-user-primary-id').val(response.id);
                     //$('#label').val(response.data.label);
                     $('#emailAddress').val(response.email);
                    $('#firstName').val(response.first_name);
                    $('#lastName').val(response.last_name);
                    $('#middleName').val(response.middle_name);
                    $('#jobTitle').val(response.job_title);
                    $('#userTitle').val(response.title);
                    $('#department').val(response.department);
                    $('#availability_status').val(response.presence_status);
                    $('#phoneNumber').val(response.telephone);

                    $("#spinner-user").hide();
                    $("#div-save-mdl-user-modal").attr('disabled', false);
                });
            });

            //Delete action
            $(document).on('click', ".btn-delete-mdl-user-modal", function(e) {
                e.preventDefault();
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

                //check for internet status
                if (!window.navigator.onLine) {
                    $('.offline').fadeIn(300);
                    return;
                }else{
                    $('.offline').fadeOut(300);
                }

                let itemId = $(this).attr('data-val');
                swal({
                    title: "Are you sure you want to delete this Address?",
                    text: "You will not be able to recover this Address if deleted.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function(isConfirm) {
                    if (isConfirm) {

                        let endPointUrl = "<?php echo e(route('fc.user.delete','')); ?>/"+itemId;

                        let formData = new FormData();
                        formData.append('_token', $('input[name="_token"]').val());
                        formData.append('_method', 'DELETE');

                        $.ajax({
                            url:endPointUrl,
                            type: "POST",
                            data: formData,
                            cache: false,
                            processData:false,
                            contentType: false,
                            dataType: 'json',
                            success: function(result){
                                if(result.errors){
                                    console.log(result.errors)
                                    swal("Error", "Oops an error occurred. Please try again.", "error");
                                }else{
                                    //swal("Deleted", "Address deleted successfully.", "success");
                                    swal({
                                        title: "Deleted",
                                        text: "User deleted successfully",
                                        type: "success",
                                        confirmButtonClass: "btn-success",
                                        confirmButtonText: "OK",
                                        closeOnConfirm: false
                                    },function(){
                                        location.reload(true);
                                    });
                                }
                            },
                        });
                    }
                });

            });

            //Save details
            $('#btn-save-mdl-user-modal').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});


                //check for internet status
                if (!window.navigator.onLine) {
                    $('.offline').fadeIn(300);
                    return;
                }else{
                    $('.offline').fadeOut(300);
                }

                $("#spinner-user").show();
                $("#div-save-mdl-user-modal").attr('disabled', true);

                let actionType = "POST";

               // let endPointUrl = "<?php echo e(route('fc.user.store')); ?>";
                let primaryId = $('#txt-user-primary-id').val();
                const Id =  primaryId ?? null
                let endPointUrl = "<?php echo e(route('fc.user.store','')); ?>/"+Id;
                let formData = new FormData();
                formData.append('_token', $('input[name="_token"]').val());
                formData.append('id', primaryId);
                
                
                
                
                

                formData.append('_method', actionType);
                <?php if(isset($organization) && $organization!=null): ?>
                formData.append('organization_id', '<?php echo e($organization->id); ?>');
                <?php endif; ?>
                // formData.append('', $('#').val());
                //formData.append('label', $('#label').val());
                formData.append('firstName', $('#firstName').val());
                formData.append('lastName', $('#lastName').val());
                formData.append('middleName', $('#middleName').val());
                formData.append('emailAddress', $('#emailAddress').val());
                formData.append('phoneNumber', $('#phoneNumber').val());
                formData.append('password', $('#password').val());
                formData.append('password_confirmation', $('#password-confirmation').val());
                formData.append('userTitle', $('#userTitle').val());
                formData.append('jobTitle', $('#jobTitle').val());
                console.log(formData)

                $.ajax({
                    url:endPointUrl,
                    type: "POST",
                    data: formData,
                    cache: false,
                    processData:false,
                    contentType: false,
                    dataType: 'json',
                    success: function(result){
                        if(result.errors){
                            $('#div-user-modal-error').html('');
                            $('#div-user-modal-error').show();

                            $.each(result.errors, function(key, value){
                                $('#div-user-modal-error').append('<li class="">'+value+'</li>');
                            });
                        }else{
                            $('#div-user-modal-error').hide();
                            window.setTimeout( function(){

                                $('#div-user-modal-error').hide();

                                swal({
                                    title: "Saved",
                                    text: "User saved successfully",
                                    type: "success",
                                    showCancelButton: false,
                                    closeOnConfirm: false,
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: false
                                },function(){
                                    location.reload(true);
                                });

                            },20);
                        }

                        $("#spinner-user").hide();
                        $("#div-save-mdl-user-modal").attr('disabled', false);

                    }, error: function(data){
                        console.log(data);
                        swal("Error", "Oops an error occurred. Please try again.", "error");

                        $("#spinner-user").hide();
                        $("#div-save-mdl-user-modal").attr('disabled', false);

                    }
                });
            });

        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\php-laravel resources\hasob-foundation-core-bs-5\src/../resources/views/users/modal.blade.php ENDPATH**/ ?>