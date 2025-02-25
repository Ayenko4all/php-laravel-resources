
<?php if($attachable!=null): ?>

    <?php $__env->startPush('page_css'); ?>
    <style type="text/css">
        @media (min-width: 768px) {
            .modal-xl {
                width: 90%;
                max-width:1200px;
            }
        }
        #attachment-viewer-modal > .modal {
            height: 100vh;
        }
        #attachment-viewer-modal > .modal-dialog {
            height: 100vh;
        }
        #attachment-viewer-modal > .modal-content {
            height: 95vh;
        }
    </style>
    <?php $__env->stopPush(); ?>


    <?php
        $attachments = $attachable->get_attachments($file_types);
    ?>

    <?php if(count($attachments) > 0): ?>

        <button class="btn btn-xs btn-danger float-end" id="<?php echo e($control_id); ?>_btnShowAttachmentViewer">Viewer</button>

        <div class="modal fade" id="<?php echo e($control_id); ?>_attachment-viewer-modal" role="dialog" aria-labelledby="attachment-viewer-label" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="<?php echo e($control_id); ?>_attachment-viewer-modal-label"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <small id="<?php echo e($control_id); ?>_attachment-viewer-modal-description"></small>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <embed id="<?php echo e($control_id); ?>_pdfEmbed" src="" width="100%" height="100%" style='height:75vh'/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-xs btn-primary float-start" id="<?php echo e($control_id); ?>_showPrevious"> << Previous </button>
                        <button class="btn btn-xs btn-primary" id="<?php echo e($control_id); ?>_showNext"> Next >> </button>
                    </div>
                </div>
            </div>
        </div>

        <?php $__env->startPush('page_scripts'); ?>
        <script type="text/javascript">
            $(document).ready(function(){

                var attach_list = [];
                var attach_list_names = [];
                var attach_list_descriptions = [];
                var attach_location = 0;
                <?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $attach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    attach_list.push("<?php echo e(route('fc.attachment.show', $attach->id)); ?>");
                    attach_list_names.push("<?php echo e($attach->label); ?>");
                    attach_list_descriptions.push("<?php echo e($attach->description); ?>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                function displayAttachmentDetails(idx){
                    $("#<?php echo e($control_id); ?>_attachment-viewer-modal-label").text(attach_list_names[idx]);
                    $("#<?php echo e($control_id); ?>_attachment-viewer-modal-description").text(attach_list_descriptions[idx]);
                }

                $('#<?php echo e($control_id); ?>_btnShowAttachmentViewer').click(function(){
                    
                    var parent = $('embed#<?php echo e($control_id); ?>_pdfEmbed').parent();
                    var newElement = "<embed src='"+attach_list[attach_location]+"' id='pdfEmbed' height='100%' width='100%' style='height:75vh'>";

                    if (attach_list[attach_location]!=null){
                        $('embed#<?php echo e($control_id); ?>_pdfEmbed').remove();
                        parent.append(newElement);
                        displayAttachmentDetails(attach_location);
                        $('#<?php echo e($control_id); ?>_attachment-viewer-modal').modal('show');
                    }
                });

                $('#<?php echo e($control_id); ?>_showNext').click(function(){
                    if (attach_location<(attach_list.length-1)){
                        var parent = $('embed#pdfEmbed').parent();
                        var newElement = "<embed src='"+attach_list[++attach_location]+"' id='pdfEmbed' height='100%' width='100%' style='height:75vh'>";
                        $('embed#pdfEmbed').remove();

                        if (attach_list[attach_location]!=null){
                            displayAttachmentDetails(attach_location);
                            parent.append(newElement);
                        }
                    }
                });

                $('#<?php echo e($control_id); ?>_showPrevious').click(function(){
                    if (attach_location>0){
                        var parent = $('embed#<?php echo e($control_id); ?>_pdfEmbed').parent();
                        var newElement = "<embed src='"+attach_list[--attach_location]+"' id='pdfEmbed' height='100%' width='100%' style='height:75vh'>";
                        $('embed#<?php echo e($control_id); ?>_pdfEmbed').remove();

                        if (attach_list[attach_location]!=null){
                            displayAttachmentDetails(attach_location);
                            parent.append(newElement);
                        }
                    }
                });

            });
        </script>
        <?php $__env->stopPush(); ?>

    <?php endif; ?>

<?php endif; ?><?php /**PATH C:\Users\DocB\Desktop\workspace\hasob-foundation-core-bs-5\src/../resources/views/components/attachment-viewer.blade.php ENDPATH**/ ?>