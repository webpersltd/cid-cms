<div  class="col-md-13">
    <?php
    if(!empty($this->session->flashdata('warning'))){
    ?>
    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Sorry!</strong> <?= $this->session->flashdata('warning') ?>
    </div>
    <?php
    }
    ?>

    <?php
    if(!empty($this->session->flashdata('success'))){
    ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Thank you!</strong> <?= $this->session->flashdata('success') ?>
    </div>
    <?php
    }
    ?>
                    
    <a href="<?php echo base_url(); ?>initials/" style="margin-bottom:10px" class="btn btn-black"><span class="glyphicon  glyphicon-plus" aria-hidden="true">&nbsp</span>ADD NEW RECORD</a>
    <div  class="row">
        <div class="col-md-2">
            <button class='btn btn-primary btn-radious'><span class="glyphicon glyphicon-list" aria-hidden="true">&nbsp</span>My Records</button>
        </div>
    </div>

    <div style="margin-top:10px" class="table-responsive">
        <table class="table table-bordered">
            <?php
            if(count($my_records) != 0){
            ?>
            <tr>
                <th>NO</th>
                <th>URN</th>
                <th>Department</th>
                <th>Officer</th>
                <th>Action</th>
                <th>Approved</th>
            </tr>
            <?php
            }
            if(count($my_records) != 0){
            $counter = 1;
            foreach ($my_records as $value) {
            ?>
            <tr class="<?= ($counter%2==0) ? 'danger':'success' ?>">
                <td><?= $counter ?></td>
                <td><?= $value->urn ?></td>
                <td><?= $value->name ?></td>
                <td><?= $value->first_name." ".$value->last_name ?></td>
                <td>
                    <?php
                    if(is_null($value->protective_id)){
                    ?>
                    <a href="<?= base_url() ?>viewRecord/<?= $value->urn ?>">
                        <span class="glyphicon  glyphicon-forward" aria-hidden="true" style="color: red">&nbsp</span>
                    </a>
                    <?php    
                    }else{
                    ?>
                    <a href="<?= base_url() ?>viewRecord/<?= $value->urn ?>">
                        <span class="glyphicon  glyphicon-eye-open" style="color: <?= ( $this->user_management->this_record_is_already_started_reviewing_by_this_user($value->rid) != $this->ion_auth->user()->row()->id 
                                && $this->user_management->has_review_permission($value->rid) && !is_null($this->user_management->this_record_is_already_started_reviewing_by_this_user($value->rid)) ) ? 'red':''; ?>" aria-hidden="true">&nbsp</span>
                    </a>
                    <?php
                    }
                    ?>
                </td>
                <td><?= ($value->fully_submitted == 0) ? 'N':'Y' ?></td>
            </tr>
            <?php
            $counter++;
            }
            }else{
            ?>
            <tr class="info">
                <td colspan="6" align="center"><b>You have no Record Entry</b></td>
            </tr>
            <?php
            }
            ?> 
        </table>
    </div>

    <div class="row">
        <div class="col-md-2">
            <button class='btn btn-danger btn-radious'><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true">&nbsp</span>For Approval</button>
        </div>
    </div>

    <div style="margin-top:10px" class="table-responsive">
        <table class="table table-bordered">
            <?php
            if(count($for_approval) != 0){
            ?>
            <tr>
                <th>NO</th>
                <th>URN</th>
                <th>Department</th>
                <th>Officer</th>
                <th>Action</th>
                <th>Approved</th>
            </tr>
            <?php
            }
            if(count($for_approval) != 0){
            $counter = 1;
            foreach($for_approval as $value) {
            ?>
            <tr class="danger">
                <td><?= $counter ?></td>
                <td><?= $value->urn ?></td>
                <td><?= $value->name ?></td>
                <td><?= $value->first_name." ".$value->last_name ?></td>
                <td>
                    <?php
                    if($this->user_management->check_final_review_exist($value->rid)){
                    ?>
                    <a href="<?= base_url() ?>viewRecord/<?= $value->urn ?>"><span class="glyphicon  glyphicon-forward" aria-hidden="true" style="color: red">&nbsp</span></a>
                    <?php
                    }else{
                    ?>
                    <a href="<?= base_url() ?>viewRecord/<?= $value->urn ?>"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true" <?= ($this->user_management->record_on_hold($value->rid)) ? 'style="color: orange"':'' ?>>&nbsp</span></a>
                    <?php
                    }
                    ?>
                </td>
                <td><?= ($value->fully_submitted == 0) ? 'N':'Y' ?></td>
            </tr>
            <?php
            $counter++;
            }
            }else{
            ?>
            <tr class="danger">
                <td colspan="6" align="center"><b>No Record Found for Approval</b></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <div class="row">
        <div class="col-md-2">
            <button class='btn btn-success btn-radious'><span class="glyphicon glyphicon-ok" aria-hidden="true">&nbsp</span>Approved</button>
        </div>
    </div>

    <div style="margin-top:10px" class="table-responsive">
        <table class="table table-bordered">
            <?php
            if(count($approved) != 0){
            ?>
            <tr>
                <th>NO</th>
                <th>URN</th>
                <th>Department</th>
                <th>Officer</th>
                <th>Action</th>
                <th>Approved</th>
            </tr>
            <?php
            $counter = 1;
            foreach($approved as $value) {
            ?>
            <tr class="success">
                <td><?= $counter ?></td>
                <td><?= $value->urn ?></td>
                <td><?= $value->name ?></td>
                <td><?= $value->first_name." ".$value->last_name ?></td>
                <td><a href="<?= base_url() ?>viewRecord/<?= $value->urn ?>"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                <td><?= ($value->fully_submitted == 0) ? 'N':'Y' ?></td>
            </tr>
            <?php
            $counter++;
            }
            }else{
            ?>
            <tr class="success">
                <td colspan="6" align="center"><b>No Record Found</b></td>
            </tr>
            <?php
            }
            ?> 
        </table>
    </div>

    <!-- <div class="container-fluid" style="background-color:black">
        <div class="col-md-12" >
            <p class="footer" style="color:white">&copy;2017,All rights reserved</p>
        </div>
    </div> -->
</div>