<!DOCTYPE html>
<html>
    <head>
        <title>Text</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="../css/style.css"/>
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
                    <a class="breadcrumb-item active" href="#">TEXT&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">HANDLING CODE&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
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
               
                <div class="col-md-10">
                    <p class="well"><span>Completion note : </span>You must ensure that each material fact and statement is entered in a new line of text and the information evaluated </h2>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <div class="box">
                        <input style="display:none" type="file" visibility="hidden" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Attach file</span></label>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="text-box">
                                <div class="form-group">
                                    <label class="control-label col-md-1" for="email">TEXT :</label>
                                    <div class="col-md-10">
                                        <textarea class="text_box" id="0"  rows="5" style="width:97.5%"></textarea>
                                    </div>
                                   <div style="margin-left:0px">
                                       <h4>GRADING</h5>
                                       <ul style="margin-left:0px">
                                          <li id="s0" style="margin-left:-6px">0</li>
                                          <li  id="i0" style="margin-left:-6px">0</li>
                                       </ul>
                                   </div>
                                </div>
                            </form>
                            
                           
                           
                           <div class="col-md-6">
                                <ul class="src-eva">
                                    <li><a href="#"><span>&nbsp;</span>SOURCE EVALUATION</a></li>
                                    <li><a class="src_grade" href="#"><span class="src_grade">A</span>Always Reliable</a></li>
                                    <li><a class="src_grade" href="#"><span class="src_grade">B</span>Mostly Reliable</a></li>
                                    <li><a class="src_grade" href="#"><span class="src_grade">C</span>Sometimes Reliable</a></li>
                                    <li><a class="src_grade" href="#"><span class="src_grade">D</span>Unreliable </a></li>
                                    <li><a class="src_grade" href="#"><span class="src_grade">E</span>Untested source</a></li>
                                 </ul>
     
                        </div>
                        <div class="col-md-6">
                            <ul class="src-eva">
                                <li><a href="#"><span>&nbsp;</span>INFORMATION INTELLIGENCE EVALUATION</a></li>
                                <li><a class="info_grade" href="#"><span class="info_grade">1</span>Known to be true without reservation</a></li>
                                <li><a class="info_grade" href="#"><span class="info_grade">2</span>Known personally to the source but not the person reporting </a></li>
                                <li><a  class="info_grade" href="#"><span class="info_grade">3</span>Not known personally to the source, but corroborated</a></li>
                                <li><a class="info_grade" href="#"><span class="info_grade">4</span>Cannot be judged</a></li>
                                <li><a class="info_grade" href="#"><span class="info_grade">5</span>Suspected to be false</a></li>
                            </ul>
          
                        </div>
                        <div class="col-md-12">
                                <div style="margin-top:30px" class="row">
                                   
                                    <div style="margin-top:10px" class="col-md-3">
                                        <h4>ADD NEW LINE OF TEXT :</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <a id="addNewTextBox" href="#" class="btn btn-none">YES&nbsp&nbsp<span class="glyphicon glyphicon-ok"></span></a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="#" class="btn btn-close">NO&nbsp&nbsp<span class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                </div>
                               
                            </div>
                           <div class="container-fluid search-area">
                               
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-6">
                                        <div style="margin-top:30px"  class="row">
                                            <div class="col-md-6">
                                                <a type="submit" id="s_and_r" href="#" class="btn btn-success">SAVE AND REVIEW &nbsp&nbsp<span class="glyphicon glyphicon-ok"></span></a> 
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-danger">CANCEL&nbsp&nbsp<span class="glyphicon glyphicon-remove"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
           
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/custom.js"></script>
        <script type="text/javascript">
            addEventListener("load",function(e){
                if(localStorage.getItem("data")!==undefined && localStorage.getItem("data")!==null){
                    location.href="<?php echo base_url();?>savereview/";
                  }
                else{
                    console.log("No data found");
                }
            })
        </script>
    </body>
</html>