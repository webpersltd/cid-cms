<!-- output -->
<div  class="col-md-10">
    <h2 class="main-headline" style="text-align:center">Initial information</h2>
    <form id="initials"  action="<?php echo base_url(); ?>saveinitials/" method="post">
        <div class="form-group">
            <div class="row">
                <div style="margin-top:5px" class="col-md-6">
                    <label for="exampleInputEmail1"></label>REPORT UNIQUE REFERENCE NUMBER(URN) : </label>
                </div>
                <div  class="col-md-5">
                    <input readonly style="border:none" name="urn" type="text" class="form-control" id="exampleInputEmail1" value="<?= floor(microtime(true)).rand(10,99); ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    DEPARTMENT :
                </div>
                <div class="col-md-6">
                    <?php
                    if( !empty($this->session->flashdata('department')) ){
                        echo $this->session->flashdata('department');
                    }
                    ?>
                    <select name="department">
                        <option value="">Select a Department</option>
                        <?php
                        foreach ($departments->result() as $row)
                        {
                            echo "<option value=".$row->id.">".$row->name."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    DATE OF REPORT :
                </div>
                <div class="col-md-6">
                    <?php
                    if( !empty($this->session->flashdata('date_of_report')) ){
                        echo $this->session->flashdata('date_of_report');
                    }
                    ?>
                     <input type="date" name="date_of_report" value="<?= set_value('date_of_report') ?>">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div  class="row">
                <div class="col-md-6">
                    INFORMATION SOURCE:
                </div>
                <div class="col-md-6">
                    <?php
                    if( !empty($this->session->flashdata('information_source')) ){
                        echo $this->session->flashdata('information_source');
                    }
                    ?>
                    <select id="source-selection" name="information_source">
                        <option value="">Select an Information Source</option>
                        <?php
                        foreach ($inf_src->result() as $row)
                        {
                            echo "<option value=".$row->id.">".$row->name."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div id="other-source-input-field" style="<?= (empty($this->session->flashdata('information_source_other'))) ? 'display:none':'display:block'; ?>" class="form-group">
            <div class="row">
                <div class="col-md-6">
                    INFORMATION SOURCE OTHER :
                </div>
                <div class="col-md-6">
                    <?php
                    if( !empty($this->session->flashdata('information_source_other')) ){
                        echo $this->session->flashdata('information_source_other');
                    }
                    ?>
                    <input type="text" name="information_source_other">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    NAME OF PERSON SUBMITTING REPORT :
                </div>
                <div class="col-md-6">
                    <?php
                    if( !empty($this->session->flashdata('submitting_person_name')) ){
                        echo $this->session->flashdata('submitting_person_name');
                    }
                    ?>
                    <input type="text" name="submitting_person_name" value="<?= set_value('submitting_person_name') ?>">
                </div>
            </div>
        </div> 
        
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    TIME OF REPORT :
                </div>
                <div class="col-md-6">
                    <?php
                    if( !empty($this->session->flashdata('time_of_report')) ){
                        echo $this->session->flashdata('time_of_report');
                    }
                    ?>
                    <input type="time" name="time_of_report" value="<?= set_value('time_of_report') ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    INTELLIGENCE SOURCE REFERENCE(ISR) :
                </div>
                <div class="col-md-6">
                    <?php
                    if( !empty($this->session->flashdata('ISR')) ){
                        echo $this->session->flashdata('ISR');
                    }
                    ?>
                    <input type="text" name="ISR" value="<?= (isset($_SESSION['old_value'])) ? $_SESSION['old_value']['ISR'] : '' ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Save and Continue&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
                </div>
                <div class="col-md-3">                                     
                </div>
                <div class="col-md-3">
                    <a href="#" class="btn btn-danger">CANCEL&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                </div>
            </div>
        </div>        
    </form>
</div>
<!-- output end -->