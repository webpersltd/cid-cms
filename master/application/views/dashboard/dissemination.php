<!DOCTYPE html>
<html>
    <head>
        <title>PROTECTIVE MARKING</title>
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
                              <li><a href="#"><span class="glyphicon glyphicon-off" aria-hidden="true">&nbsp</span>Log out</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="col-md-2">
                <ul class="list-group">
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
            <div class="col-md-8">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="#">INITIALS&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">SUBJECT&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">TEXT&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item " href="#">HANDLING CODE&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item "  href="#">PROTECTIVE MARKING&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">REVIEW&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item active" href="#">DISSEMINATION</a>
                </nav>
             </div>
             <div class="col-md-10">
                <div class="well">
                    <b>Warning Note:</b> You must review each line of text and apply the correct Handling Code.
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <h3 style="color:red">THE FOLLOWING PROTECTIVE MARKING HAS BEEN APPLIED TO THIS RECORD</h3>
                        <h3>IS THIS PROTECTIVE MARKING CORRECT ?</h3>


                        <!--- protective mark check box start -->

                        <div class="pretty p-default p-curve"><input  type="radio" class="gCheck" name="0"><div class="state p-success-o"><label>OKEY</label></div></div> <div class="pretty p-default p-curve"> <input class="gCheck" data-toggle="modal" data-target="#myModal" type="radio" name="0"><div class="state p-danger-o"><label>EDIT</label></div></div>
                        
                        <div style="width:50%;margin-left:30%" id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                            
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Change protective marking</h4>
                                    </div>
                                    <div class="modal-body">
                                            
                                        <h3>CLICK TO PROTECTIVE MARKING :</h3>
                                        <ul class="protective-mark" id="protective-mark-id">
                                            <li class="p_mark" dissemination_mark="0">RESTRICTED</li>
                                            <li class="p_mark" dissemination_mark="1">CONFIDENTIAL</li>
                                            <li class="p_mark" dissemination_mark="2">SECRET</li>
                                            <li class="p_mark" dissemination_mark="3">TOP SECRET</li>
                                        </ul>
                                        <h3 id="temp_d_p">Protective mark is :</h3>       
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="d_p_m" class="btn btn-success">Save</button>    
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            
                                </div>
                            </div>
                        <!--- protective mark check box end -->
                   
                      <!-- Dissemination modal  box start -->

                      <div style="width:50%;margin-left:30%" id="myModal1" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                    
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Change protective marking</h4>
                            </div>
                            <div class="modal-body">
                                    
                                <h3>CLICK TO PROTECTIVE MARKING :</h3>
                                <ul class="protective-mark" id="protective-mark-id">
                                    <li class="p_mark" dissemination_mark="0">RESTRICTED</li>
                                    <li class="p_mark" dissemination_mark="1">CONFIDENTIAL</li>
                                    <li class="p_mark" dissemination_mark="2">SECRET</li>
                                    <li class="p_mark" dissemination_mark="3">TOP SECRET</li>
                                </ul>
                                <h3 id="temp_d_p">Protective mark is :</h3>       
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="d_p_m" class="btn btn-success">Save</button>    
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    
                        </div>
                    </div>



                      <!-- Dissemination modal  box end -->
                    </div>
                    
                    <div class="col-md-3">
                       <h3 style="border:2px solid red; display:inline-block;padding:5px" id="des_protect" disabled></h3>
                    </div>
                    <div id="dissemination-container">
                        <!-- <div class="col-md-8">
                            <h4 >SUMMERY OF TEXT:</h4>
                        </div>
                        <div style="vertical-align:top" class="col-md-4">
                            <h4 style="margin-left:35px">GRADING</h4>
                            <ul style="display:inline-block">
                                <li style="display:inline-block">One</li>
                                <li style="display:inline-block">Two</li>
                                <li style="display:inline-block">Three</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <textarea disabled style="width:70%">Summery of text here</textarea>
                        
                        </div>
                        <div class="col-md-6">
                            <h4>Detailed handling instruction</h4>
                        </div>
                        <div class="col-md-12">
                            <textarea disabled style="width:70%">Detailed handling instruction</textarea>
                        </div>
                        <div class="col-md-12"><h3>CAN THIS INFORMATION BE DISSEMINATED IN LINE WITH THE HANDLING CODE APPLIED: </h3><div class="pretty p-default p-curve"><input  type="radio" class="gCheck" name="0"><div class="state p-success-o"><label>OKEY</label></div></div> <div class="pretty p-default p-curve"> <input class="gCheck" data-toggle="modal" data-target="#myModal" type="radio" name="0"><div class="state p-danger-o"><label>EDIT</label></div></div><h3>ARE ADDITIONAL DETAILED HANDLING INSTRUCTIONS REQUIRED: </h3><div class="pretty p-default p-curve"><input  type="radio" class="gCheck" name="0"><div class="state p-success-o"><label>OKEY</label></div></div> <div class="pretty p-default p-curve"> <input class="gCheck" data-toggle="modal" data-target="#myModal" type="radio" name="0"><div class="state p-danger-o"><label>EDIT</label></div></div><h3>CAN THIS INFORMATION BE DISSEMINATED IN LINE WITH THE PROTECTIVE MARKING APPLIED: </h3><div class="pretty p-default p-curve"><input  type="radio" class="gCheck" name="0"><div class="state p-success-o"><label>OKEY</label></div></div> <div class="pretty p-default p-curve"> <input class="gCheck" data-toggle="modal" data-target="#myModal" type="radio" name="0"><div class="state p-danger-o"><label>EDIT</label></div></div></div>
                    -->
                    </div>
                    <div style="margin-top:10px"class="col-md-12">
                        <h5 style="display:inline-block;margin-right:20px">NAME : <span style="background-color:gray;padding:5px;margin-right:3px;color:white">AUTO NAME</span></h5>
                        <h5 style="display:inline-block;margin-right:20px">TIME :<span style="background-color:gray;padding:5px;margin-right:3px;color:white">AUTO TIME</span></h5>
                        <h5 style="display:inline-block;margin-right:20px">DATE :<span style="background-color:gray;padding:5px;margin-right:3px;color:white">AUTO DATE</span></h5>
                        <div style="display:block">
                            <h5 style="display:inline-block;margin-right:20px">CLEARLY RECORD WHO THIS INFORMATION CAN BE DISSEMINATE TO :</h5>
                            <textarea style="display:inline-block;    vertical-align: middle;"></textarea>
                        </div>
                    </div>
                </div>
             </div>
        </div> 

        <!--- 
        Modal body start
        
        -->
        <!-- Modal -->

        
        <!-- modal body end-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
        <!-- <script src="../../js/custom.js" type="text/javascript"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>js/dissemination.js"></script>  
    </body>
</html>                