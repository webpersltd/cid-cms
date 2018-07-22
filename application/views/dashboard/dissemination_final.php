<!DOCTYPE html>
<html>
    <head>
        <title>Dissemination</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="../css/style.css"/>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
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
                    <a class="navbar-brand" href="#"><img height="50px" width="50px" style="margin-top: -16px; margin-right: 102px;" src="<?= base_url() ?>images/NBR-customs-logo.png" ></a>
                </div>
                  
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <?php cid_cms_tab(); ?>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href="">Database : Customs Intelligence Database (CID)</a></li>
                    </ul>
                        
                    <ul class="nav navbar-nav navbar-right">                          
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp</span>Hi, <?= $user->first_name." ".$user->last_name ?> <span class="caret"></span>
                            </a>
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
                    <!-- <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span>&nbsp&nbspMarking</a></li>-->
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
                    <a class="breadcrumb-item" href="#">HANDLING CODE&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">PROTECTIVE MARKING&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" id="remaining" href="#">REVIEW&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a></a>
                    <a class="breadcrumb-item active" href="#">DISSEMINATION</a>
                </nav>
            </div>

            <div  class="col-md-10">                    
                <div class="well">
                    <b>Warning:</b> It is your responsibility to ensure appropriate permission is in place for this information to be lawfully shared prior to authorising any part of it for dissemination. If you are unsure, you must seek advice.
                </div>
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
                    <b><?= strtoupper($user->first_name)." ".strtoupper($user->last_name); ?></b>
                </div>
                <div class="col-md-2" id="pm-heading" style="margin-top: 10px; margin-left: 49px;">
                    <h4>TIME:</h4>
                </div>
                <div class="col-md-3" id="pm-title" style="width: 172px !important; margin-top: 10px;">
                    <b><?= date('H:i') ?></b>
                </div>
                <div class="col-md-2" id="pm-heading" style="margin-top: 10px; margin-left: 49px;">
                    <h4>DATE:</h4>
                </div>
                <div class="col-md-3" id="pm-title" style="width: 215px !important; margin-top: 10px;">
                    <b><?= date('d-m-Y') ?></b>
                </div>
                <div class="col-md-12" id="pm-heading" style="margin-top: 10px">
                <?php
                if( !empty($this->session->flashdata('user')) ){
                    echo $this->session->flashdata('user');
                }
                ?>
                </div>
                <div class="col-md-8" id="pm-heading" style="margin-top: 10px">
                    <h4>CLEARLY RECORD WHO THIS INFORMATION CAN BE DISSEMINATED TO:</h4>
                </div>
                <?= form_open('done');; ?>
                <div class="col-md-3" id="pm-title" style="width: 412px !important; margin-top: 10px; margin-left: 25px; height: 45px !important;">
                    <input type="text" id="disseminated_to" name="disseminated_to" size="48">
                    <input type="hidden" id="user" name="user">
                </div>
                <div class="form-group final-button">
                <div class="row">
                    <div class="col-md-7">
                        <button type="submit" class="btn btn-success">REPORT SUBMISSION DONE&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
                    </div>
                    <div class="col-md-3">
                        <a href="<?= base_url() ?>dashboard" onclick="alert('Do you really want to cancel?');" class="btn btn-danger">CANCEL&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>js/dissemination.js" type="text/javascript"></script>