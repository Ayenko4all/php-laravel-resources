

<div class="card">
    
    <div class="row g-0">
        <div class="col-md-1">
            <img src="<?php echo e(asset('imgs/user.png')); ?>" alt="..." class="card-img">
        </div>
        <div class="col-md-9">
            <div class="card-body">
                <?php
                    $detail_page_url = route('sb.offers.show', $data_item->id);
                ?>

                <div class="d-flex align-items-center">
                    <div><h4 class="card-title"><a href='<?php echo e($detail_page_url); ?>'><?php echo e($data_item->id); ?></a></h4></div>
                    <div class="ms-auto"> 
                        <a data-toggle="tooltip" 
                            title="Edit" 
                            data-val='<?php echo e($data_item->id); ?>' 
                            class="btn-edit-mdl-offer-modal inline-block mr-5" href="#">
                            <i class="bx bxs-edit txt-warning" style="opacity:80%"></i>
                        </a>

                        <a data-toggle="tooltip" 
                            title="Delete" 
                            data-val='<?php echo e($data_item->id); ?>' 
                            class="btn-delete-mdl-offer-modal inline-block mr-5" href="#">
                            <i class="bx bxs-trash-alt txt-danger" style="opacity:80%"></i>
                        </a>
                    </div>
                </div>

                <p class="card-text">Sub Text</p>
                <p class="card-text">
                    <small class="text-muted">
                        Created: <?php echo e(\Carbon\Carbon::parse($data_item->created_at)->format('l jS F Y')); ?> - <?php echo \Carbon\Carbon::parse($data_item->created_at)->diffForHumans(); ?>

                    </small>
                </p>
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\laragon\www\php-laravel resources\dmo-savings-bond-module\src/../resources/views/pages/offers/card_view_item.blade.php ENDPATH**/ ?>