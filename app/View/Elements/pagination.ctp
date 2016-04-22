<div class="row">
    <div class="col-md-5 col-sm-12">
<!--        <div class="dataTables_info" id="sample_3_info">
            Showing 1 to 5 of 12 entries
        </div>-->
    </div>
    <div class="col-md-7 col-sm-12">
        <div class="dataTables_paginate paging_bootstrap">

            <ul class="pagination">
                <li>
                    <?php echo $this->Paginator->prev('prev' ,array(), null, array('tag' => false));?>
                </li>
                <li><?php echo $this->Paginator->numbers(array('modulus' => 2,'separator'=>'')); ?></li>
                <li>
                    <?php echo $this->Paginator->next('next', array(), null, array('tag' => false));?>
                </li>
            </ul>
        </div>
    </div>
</div>