<!DOCTYPE html>
<html lang="utf">
    <head>
        <title><?= $title ?> Customs Intelligence Database</title>
        <?php
        /** -- Copy from here -- */
        if(!empty($meta))
        foreach($meta as $name=>$content){
        	echo "\n\t\t";
        	?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
        		 }
        echo "\n";

        if(!empty($canonical))
        {
        	echo "\n\t\t";
        	?><link rel="canonical" href="<?php echo $canonical?>" /><?php
        }
        echo "\n\t";
        ?>
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/images/customs.ico"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/navbar-fixed-left.min.css"/>
        <?php
        foreach($css as $file){
         	echo "\n\t\t";
        	?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
        } echo "\n\t";
        ?>
    </head>
    <body style="padding-top: 70px">    
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img height="50px" width="50px" style="margin-top: -16px; margin-right: 102px;" src="<?= base_url() ?>assets/images/NBR-customs-logo.png" ></a>
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp</span>Hi, <?= $user->first_name." ".$user->last_name ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true">&nbsp</span>Change password</a></li>                              
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>logout"><span class="glyphicon glyphicon-off" aria-hidden="true">&nbsp</span>Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container-fluid">
            <div class="col-md-2 navbar-fixed-left" style="margin-top: 67px">
                <ul class="list-group">
                    <li  class="list-group-item"><a href="<?php echo base_url(); ?>dashboard"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp&nbspDashboard</a></li>
                    <li  class="list-group-item"><a href="<?php echo base_url(); ?>initials/"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp&nbspInitials</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>subjects/"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp&nbspSubjects</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>text/"><span class="glyphicon glyphicon-text-size" aria-hidden="true"></span>&nbsp&nbspText</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>handlingcode/"><span class="glyphicon glyphicon-compressed" aria-hidden="true"></span>&nbsp&nbspHandling code</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>protectivemark/"><span class="glyphicon glyphicon-registration-mark" aria-hidden="true"></span>&nbsp&nbspProtective</a></li>
                    <?php
                    if($this->ion_auth->get_users_groups()->row()->name != "Level-1"){
                    ?>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>review/"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>&nbsp&nbspReview</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>dissemination/"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>&nbsp&nbspDissemination</a></li>
                    <?php
                    }
                    ?>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>search/"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp&nbspSearch</a></li>
                    <?php
                    if($this->ion_auth->get_users_groups()->row()->name != "Level-1"){
                    ?>
                    <li class="list-group-item"><a href="<?php echo base_url(); ?>viewlog/"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>&nbsp&nbspView log</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <?php
            if(!isset($top_navigation)){
            ?>
            <div class="col-md-13">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item <?= ($this->uri->uri_string() == "initials") ? 'active':'' ?>" href="#">INITIALS<span class="glyphicon glyphicon-menu-right" style="color: black; margin-left: 14px;"></span></a>
                    <a class="breadcrumb-item" href="#">SUBJECT<span class="glyphicon glyphicon-menu-right" style="color: black; margin-left: 14px;"></span></a>
                    <a class="breadcrumb-item" href="#">TEXT<span class="glyphicon glyphicon-menu-right" style="color: black; margin-left: 14px;"></span></a>
                    <a class="breadcrumb-item" href="#">HANDLING CODE<span class="glyphicon glyphicon-menu-right" style="color: black; margin-left: 14px;"></span></a>
                    <a class="breadcrumb-item" href="#">PROTECTIVE MARKING<span class="glyphicon glyphicon-menu-right" style="color: black; margin-left: 14px;"></span></a>
                    <a class="breadcrumb-item" href="#">REVIEW<span class="glyphicon glyphicon-menu-right" style="color: black; margin-left: 14px;"></span></a>
                    <a class="breadcrumb-item" href="#">DISSEMINATION</a>
                </nav>
            </div>
            <?php
            }
            ?>
            <?= $output ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <?php
        foreach($js as $file){
        		echo "\n\t\t";
        		?><script src="<?php echo $file; ?>"></script><?php
        } echo "\n\t";
        /** -- to here -- */
        ?>    
	</body>
    <div class="loader"></div>
</html>
