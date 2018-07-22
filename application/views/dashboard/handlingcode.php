<!DOCTYPE html>
<html>
    <head>
        <title>HANDLING CODE</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="../css/style.css"/>
        <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Entity manager</a>
                </div>
                  
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <?php cid_cms_tab(); ?>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href="">Database : Custom Intelligence Database(CID)</a></li>
                    </ul>
                        
                    <ul class="nav navbar-nav navbar-right">                          
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp</span>Hi , Jon Doe <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true">&nbsp</span>Change password</a></li>                              
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>logout/"><span class="glyphicon glyphicon-off" aria-hidden="true">&nbsp</span>Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="col-md-2">
                <ul class="list-group">
                    <li  class="list-group-item"><a href="<?php echo base_url(); ?>dashboard"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp&nbspDashboard</a></li>
                    <li  class="list-group-item"><a href="<?php echo base_url(); ?>initials/"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp&nbspInitials</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>subjects/"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp&nbspSubjects</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>text/"><span class="glyphicon glyphicon-text-size" aria-hidden="true"></span>&nbsp&nbspText</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>handlingcode/"><span class="glyphicon glyphicon-compressed" aria-hidden="true"></span>&nbsp&nbspHandling code</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>protectivemark/"><span class="glyphicon glyphicon-registration-mark" aria-hidden="true"></span>&nbsp&nbspProtective</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>review/"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>&nbsp&nbspReview</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>dissemination/"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>&nbsp&nbspDissemination</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>search/"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp&nbspSearch</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>viewlog/"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>&nbsp&nbspView log</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="#">INITIALS&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">SUBJECT&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">TEXT&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item active" href="#">HANDLING CODE&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">PROTECTIVE MARKING&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">REVIEW&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">DISSEMINATION</a>
                </nav>

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
            </div>

            <div class="col-md-10">
                <?php
                if( !empty($this->session->flashdata('textID')) ){
                    echo $this->session->flashdata('textID');
                }
                ?>                    
                <div class="well">
                    <b>Completion Note:</b> You must review each line of text and apply the correct Handling Code.
                </div>
                <div class="col-md-9 handling-heading">
                    <h4>SUMMARY OF TEXT AND EVALUATIONS:</h4>
                </div>
                <div class="col-md-1 grade-title">
                       
                </div>
                    <?= form_open('HandlingCode/create'); ?>
                    <div id="container_handling_code">
                        <div id="text_area" class="col-md-10">
                            <textarea id="" name="summary" rows="5" style="width:100%" disabled><?= $text->summary ?></textarea>
                        </div>
                        <div id="grading" class="col-md-2">
                            <h4>GRADING</h4>
                            <table  class="table grade-table table-bordered">
                                <tbody id="grading-body">
                                    <tr>
                                        <td><?= $text->src_eval ?></td>
                                        <td><?= $text->inf_int_eval ?></td>
                                        <td id="handlingcode"><?= (!empty($this->session->flashdata('handlingcodeInput')) ? $this->session->flashdata('handlingcodeInput') : 0) ?></td>
                                        <input type="hidden" id="handlingcodeInput" name="handlingcode" value="<?= (!empty($this->session->flashdata('handlingcodeInput')) ? $this->session->flashdata('handlingcodeInput') : "") ?>">
                                        <input type="hidden" id="text_id" name="textID" value="<?= $text->id ?>">
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-10 handling-grade">
                            <?php
                            if( !empty($this->session->flashdata('handlingcode')) ){
                                echo $this->session->flashdata('handlingcode');
                            }
                            ?>
                            <table class="table handling-table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>
                                            <b>HANDLING CODE</b>
                                            <br>To be completed by
                                            <br>the evaluator on
                                            <br>receipt and prior to
                                            <br>entry ont the
                                            <br>intelligence system.
                                        </td>
                                        <td class="functional">
                                            <b>1</b>
                                            <br>Permits dissemination
                                            <br>within Customs and to
                                            <br>other law inforcement 
                                            <br>agencies in Bangladesh 
                                            <br>as specified.
                                        </td>
                                        <td class="functional">
                                            <b>2</b>
                                            <br>Permits
                                            <br>dissemination to
                                            <br>Bangladesh non
                                            <br>prosecuting parties
                                        </td>
                                        <td class="functional">
                                            <b>3</b>
                                            <br>Permits
                                            <br>dissemination to
                                            <br>foreign law
                                            <br>agencies
                                        </td>
                                        <td class="functional">
                                            <b>4</b>
                                            <br>Permits dissemination
                                            <br>within Bangladesh
                                            <br>Customs only: specify
                                            <br>reasons and internal
                                            <br>recipient(s)
                                        </td>
                                        <td class="functional">
                                            <b>5</b>
                                            <br>Permits
                                            <br>dissemination, but
                                            <br>receiving agency to
                                            <br>observe conditions
                                            <br>as specified
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-10 handling-heading">
                            <h4>DETAILED HANDLING INSTRUCTIONS:</h4>
                        </div>
                        <div class="col-md-10 handling-heading">
                            <?php
                            if( !empty($this->session->flashdata('instruction')) ){
                                echo $this->session->flashdata('instruction');
                            }
                            ?>
                            <textarea name="instruction" class="instruction" id="hc_free_txt" style="margin-bottom:15px" class="form-control" rows="5" id="instructions"><?= (!empty($this->session->flashdata('instructionInput')) ? $this->session->flashdata('instructionInput') : "") ?></textarea>
                        </div>
                    </div>

                    <div class="form-group final-button">
                    <div class="row">
                        <div class="col-md-7">
                            <button type="submit" class="btn btn-success">SAVE INFORMATION AND CONTINUE (<?= $remainingTextVeiw; ?>)&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
                        </div>
                        <div class="col-md-3">
                            <a href="<?= base_url() ?>dashboard" onclick="alert('Do you really want to cancel?');" class="btn btn-danger">CANCEL&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </body>
 </html>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>js/custom.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/handlingcode.js"></script>     