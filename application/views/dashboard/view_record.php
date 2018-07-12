<div  class="col-md-13">
    <div class="col-md-13">
        <?php
        foreach ($info as $value) {
        ?>
        <h3 align="center">The Record URN: <?= $value->urn ?></h3>
        <?php
        break;
        }
        ?>
    </div>
    <div class="col-md-13">
        <hr>
    </div>
    <div class="col-md-9" id="pm-heading">
        <h4 style="color: red">THE FOLLOWING PROTECTIVE MARKING HAS BEEN APPLIED TO THIS RECORD:</h4>
    </div>
    <div class="col-md-1" id="pm-title" style="width: 301px !important">
        <?php
        foreach ($info as $value) {
        ?>
        <b id="p_mark_name"><?= $value->p_name ?></b>
        <?php
        break;
        }
        ?>
    </div>
    <?php
    foreach ($info as $value) {
    ?>
    <div class="col-md-9 handling-heading">
        <h4>SUMMARY OF RECORD:</h4>
    </div>
    <div class="col-md-1 grade-title">                       
    </div>
    <div id="container_handling_code">
        <div id="text_area" class="col-md-8">
            <textarea id="summary" name="summary" rows="5" style="width:100%" disabled><?= $value->summary ?></textarea>
        </div>
        <input type="hidden" name="handlingcodeID" value="">
        <div id="grading" class="col-md-2">
            <h4>GRADING</h4>
            <table  class="table grade-table table-bordered">
                <tbody id="grading-body">
                    <tr>
                        <td id="src_eval"><?= $value->src_eval ?></td>
                        <td id="inf_int_eval"><?= $value->inf_int_eval ?></td>
                        <td id="code"><?= $value->code ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-9 handling-heading">
        <h4>DETAILED HANDLING INSTRUCTIONS:</h4>
    </div>
    <div id="container_handling_code" style="margin-bottom: 10px">
        <div id="text_area" class="col-md-13">
            <textarea id="instruction" name="instruction" rows="5" style="width:100%" disabled><?= $value->instruction ?></textarea>
        </div>
    </div>
    <hr>
    <?php
    }
    ?>
    <?php
    foreach ($info as $value) {
    if($value->fully_submitted != 0){
    ?>
    <div class="col-md-5" id="pm-heading">
        <h4>AUTHORIZED FOR DISSEMINATION:</h4>
    </div>
    <div class="col-md-7" id="pm-title" style="width: 707px !important;">
        <b>YES</b>
    </div>
    <div class="col-md-2" id="pm-heading" style="margin-top: 10px">
        <h4>NAME:</h4>
    </div>
    <div class="col-md-3" id="pm-title" style="width: 301px !important; margin-top: 10px;">
        <?php
        foreach ($info as $value) {
        ?>
        <b><?= $value->officer_first_name ?> <?= $value->officer_last_name ?></b>
        <?php
        break;
        }
        ?>
    </div>
    <div class="col-md-2" id="pm-heading" style="margin-top: 10px; margin-left: 49px;">
        <h4>TIME:</h4>
    </div>
    <div class="col-md-3" id="pm-title" style="width: 172px !important; margin-top: 10px;">
        <?php
        foreach ($info as $value) {
        ?>
        <b><?= date('H:i', strtotime($value->dis_ca)) ?></b>
        <?php
        break;
        }
        ?>
    </div>
    <div class="col-md-2" id="pm-heading" style="margin-top: 10px; margin-left: 49px;">
        <h4>DATE:</h4>
    </div>
    <div class="col-md-3" id="pm-title" style="width: 215px !important; margin-top: 10px;">
        <?php
        foreach ($info as $value) {
        ?>
        <b><?= date('d-m-y', strtotime($value->dis_ca)) ?></b>
        <?php
        break;
        }
        ?>
    </div>
    <div class="col-md-8" id="pm-heading" style="margin-top: 10px">
        <h4>CLEARLY RECORD WHO THIS INFORMATION CAN BE DISSEMINATED TO:</h4>
    </div>
    <div class="col-md-3" id="pm-title" style="width: 412px !important; margin-top: 10px; margin-left: 25px; height: 45px !important;">
        <?php
        foreach ($info as $value) {
        ?>
        <b><?= $value->diss_to_first_name." ".$value->diss_to_last_name ?></b>
        <?php
        break;
        }
        ?>
    </div>
    <?php
    }
    break;
    }
    ?>
</div>