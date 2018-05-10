<!DOCTYPE html>
<html>
    <head>
        <title>REVIEW PAGE</title>
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
                    <a class="breadcrumb-item active" href="#">TEXT&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">HANDLING CODE&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">PROTECTIVE MARKING&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">REVIEW&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">DISSEMINATION</a>
                </nav>
               
                <div class="col-md-10">
                    <p class="well"><span class="completion">Completion note : </span>You must ensure that each material fact and statement is entered in a new line of text and the information evaluated </h2>
                </div>
                <div class="col-md-2"></div>
                <!-- <div class="col-md-2">
                    <div class="box">
                        <input style="display:none" type="file" visibility="hidden" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Attach file</span></label>
                    </div>
                </div> -->
                <div  class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>SUMMERY OF TEXT AND EVALUATION</h3>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <h3>GRADING</h3>
                        </div>
                    </div>
                   
                   
                    <!-- <div  class="row">
                           
                            <div class="col-md-7">
                                <textarea rows="5" style="width:100%" disabled>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like</textarea>
                            </div> 
                            <div class="col-md-2">
                                
                                <ul class="textReview">
                                    <li>C</li>
                                    <li>3</li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                 <div class="pretty p-default p-curve">
                                         <input type="radio" name="3" />
                                         <div class="state p-success-o">
                                             <label>OKEY</label>
                                         </div>
                                 </div> 
                                 <div class="pretty p-default p-curve">
                                         <input type="radio" name="3" />
                                         <div class="state p-danger-o">
                                             <label>CANCEL</label>
                                         </div>
                                 </div>
                             </div>
                            
                        </div> -->
                        
                            <div id="text_summery">
                                    
                            </div>
                    <div class="container-fluid search-area">
                               
                        <div class="row">
                            <div class="col-md-2"></div>
                                <div class="col-md-6">
                                    <div style="margin-top:30px"  class="row">
                                        <div class="col-md-6">
                                            <a id="add_box" type="submit" href="<?php echo base_url(); ?>handlingcode/" class="btn btn-success" id="search">SAVE AND CONTINUE &nbsp&nbsp<span class="glyphicon glyphicon-ok"></span></a> 
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
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
          
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                  <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">
                    <textarea id="text_modal" rows="5" style="width:100%" ></textarea>
                </div>
                <div style="margin-left:10px" class="row">
                        <div class="col-xs-6 col-md-3">
                            <h5>Source Evaluation</h3>
                        </div>
                        <div class="col-xs-6 col-md-7">
                           <h5>Information Intelligence Evaluation</h3>
                        </div>
                        
                    </div>
                <div style="margin-left:10px" class="row">
                    <div class="col-xs-6 col-md-3">
                        <a href="#" class="thumbnail" flag="se">
                           <span flag="se">A</span>Always Reliable
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-3">
                            <a href="#" class="thumbnail" flag="iie">
                                <span flag="iie">1</span>Known to be true without reservation
                            </a>
                    </div>
                </div>
                <div style="margin-left:10px" class="row">
                        <div class="col-xs-6 col-md-3">
                            <a href="#" class="thumbnail" flag="se">
                                <span flag="se">B</span>Mostly Reliable
                            </a>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <a href="#" class="thumbnail" flag="iie">
                                <span flag="iie">2</span>Known personally to the source but not the person reporting
                            </a>
                        </div>
                </div>
                <div  style="margin-left:10px" class="row">
                        <div class="col-xs-6 col-md-3">
                            <a href="#" class="thumbnail" flag="se">
                              <span flag="se">C</span>Sometimes Reliable
                            </a>
                        </div>
                        <div class="col-xs-6 col-md-3">
                                <a href="#" class="thumbnail" flag="iie">
                                    <span flag="iie">3</span>Not known personally to the source, but corroborated
                                </a>
                        </div>
                </div>
                <div  style="margin-left:10px" class="row">
                        <div class="col-xs-6 col-md-3">
                            <a href="#" class="thumbnail" flag="se">
                              <span flag="se">D</span>Unreliable
                            </a>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <a href="#" class="thumbnail" flag="iie">
                                <span flag="iie">4</span>Cannot be judged
                            </a>
                        </div>
                </div>
                <div  style="margin-left:10px" class="row">
                        <div class="col-xs-6 col-md-3">
                            <a href="#" class="thumbnail " flag="se">
                              <span flag="se">E</span> Untested source
                            </a>
                        </div>
                        <div class="col-xs-6 col-md-3">
                                <a href="#" class="thumbnail" flag="iie" >
                                    <span flag="iie">5</span>Suspected to be false
                                </a>
                        </div>
                </div>
                
                <ul class="textReview">
                    <h5>GRADING</h5>
                    <li id="src_edit">A</li>
                    <li id="info_edit">5</li>
                </ul>
                <div class="modal-footer">
                  <button type="button"  id="save_modal" class="btn btn-success">Save</button>
                  <button type="button"  id="close_modal" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                
              </div>
          
            </div>
          </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/custom.js"></script>
    </body>
</html>