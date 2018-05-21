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
                    <a class="breadcrumb-item active" href="#">REVIEW&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="dissemination.html">DISSEMINATION</a>
                </nav>
             </div>
             <div  class="col-md-10">                    
                <div class="well">
                    <b>Completion Note:</b> You must carefully review the Source Evaluation and Information Evaluation for each entry.
                </div>
                <div id="review-container" class="row">
                 
                    
                        
                </div>
                <div style:"border-bottom:1px solid black" class="col-md-9"> <h3>PROTECTIVE MARKING :</h3><ul id="review_page_p_marking"  class="protective-mark"><li><a  class="p_mark" flag="restricted" data-toggle="modal" data-target=""  href="#">RESTRICTED</a></li><li><a class="p_mark" flag="confidential" data-toggle="modal" data-target="" href="#">CONFIDENTIAL</a></li><li><a class="p_mark" flag="secret" data-toggle="modal" data-target="" href="#">SECRET</a></li><li><a class="p_mark" flag="topsecret" data-toggle="modal" data-target="" href="#">TOP SECRET</a></li></ul></div>
                <hr>
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                  
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit</h4>
                        </div>
                        <div class="modal-body">
                          <h3>SUMMERY OF RECORD</h3>
                          <div>
                              <textarea id="edit_review_summery" style="width:100%" rows="5"></textarea>
                          </div>
                          <hr>
                          <h3>HANDLING INSTRUCTION</h3>
                          <div>
                              <textarea id="edit_review_h_instruction" style="width:100%" rows="5"></textarea>
                          </div>
                          <div>
                              <h3>GRADING</h3>
                              <div id="review_grading">
                                    
                              </div>
                          </div>
                          <div>
                              <h3>Change grading</h3>
                              <div class="review_grading_option">
                                  <div>
                                     <h5>Source Evaluation</h5>
                                     <ul class="select_review_grading" order="0">
                                         <li>A</li>
                                         <li>B</li>
                                         <li>C</li>
                                         <li>D</li>
                                         <li>E</li>
                                         
                                     </ul>
                                  </div>
                                  <div>
                                    <h5>Information Intelligence Evaluation</h5>
                                    <ul class="select_review_grading" order="1">
                                        <li>1</li>
                                        <li>2</li>
                                        <li>3</li>
                                        <li>4</li>
                                        <li>5</li>
                                        
                                    </ul>
                                  </div>
                                  <div>
                                    <h5>Handling code</h5>
                                    <ul class="select_review_grading" order="2">
                                        <li>1</li>
                                        <li>2</li>
                                        <li>3</li>
                                        <li>4</li>
                                        <li>5</li>
                                        
                                    </ul>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="review_btn_save" class="btn btn-success" data-dismiss="modal">Save</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                       
                      </div>
                  
                    </div>
                  </div>   
                  
                  <div class="container-fluid search-area">
                               
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                            <div style="margin-top:30px"  class="row">
                                <div class="col-md-6">
                                    <a type="submit"  href="<?php echo base_url(); ?>dissemination/" class="btn btn-success">SAVE AND CONTINUE &nbsp&nbsp<span class="glyphicon glyphicon-ok"></span></a> 
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-danger">CANCEL&nbsp&nbsp<span class="glyphicon glyphicon-remove"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
            <!-- <script src="../../js/custom.js" type="text/javascript"></script> -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
        <!-- <script type="text/javascript" src="../../js/handlingcode.js"></script> -->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/review.js"></script>
        <!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/protectivemarking.js"></script> -->
        <!-- <script type="text/javascript">
            addEventListener('load',function(e){
                $.ajax({
                url : "<?php echo base_url(); ?>Rest/",
                type : "POST",
                dataType : "json",
                data : {"account" :"account", "passwd" :"password"},
                success : function(data) {
                    console.log()
                },
                error : function(data) {
                    console.log(data.responseText);
                }
            });
            })
       </script> -->
    </body>
 </html>               