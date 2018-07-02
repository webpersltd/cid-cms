<!DOCTYPE html>

<html>
    <head>
        <title>SEARCH RECORD</title>
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
        <div  class="container-fluid">
            <div class="row">
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
                <div  class="col-md-9 userlog">
                    <h3 class="heading">SEARCH RECORDS</h3>
                    <h1 style="visibility:hidden">Nothing </h1>
                    <form  action="<?php echo base_url(); ?>searchRecord/" method="post">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="urn">URN :</label>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-top:18px" for="surName">SUBJECT SURNAME :</label>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-top:18px" for="dob">DATE OF BIRTH :</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="urnNo" class="form-control" id="urnNo">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="surName" id="surName" placeholder="SUBJECT SURNAME">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" name="dob" class="form-control" id="dob">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="isr">ISR :</label>
                                                    
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-top:18px" for="subjectName">SUBJECT FIRST NAME :</label>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-top:18px" for="nationality">NATIONALITY :</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="isr" class="form-control" id="isr">
                                          
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="firstname" id="subjectName" placeholder="SUBJECT FIRST NAME">
                                        </div>
                                        <div class="form-group">
                                            <!-- <input type="text" class="form-control" id="nationality" placeholder="NATIONALITY"> -->
                                            <select style="padding-top:10px; padding-bottom:10px" name="nationality" id="">
                                            <!-- <option value="">Select nationality</option> -->
                                                <?php getNationality(); ?>
                                            
                                            </select>
                                        </div>
                                    </div>
                                  

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="freeText">FREE TEXT :</label>
                                </div>
                                
                            </div>
                            <div style="margin-left:4%" class="col-md-9">
                                <div class="form-group">
                                    <input class="form-control" style="width:70%" type="text" id="freeText" name="freetext" placeholder="FREE TEXT"/>
                                </div>
                                
                            </div>
                        </div>
                       <div class="container-fluid">
                           <h3 class="heading" style="text-align:center">DATE RANGE</h3>
                           <h1 style="visibility:hidden">Nothing </h1>
                       </div>
                       <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dateFrom">FROM :</label>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-top:18px" for="sourceInfo">SOURCE OF INFORMATION :</label>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-top:18px" for="officerName">OFFICER NAME :</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control" id="dateFrom">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="sourceInfo" placeholder="SOURCE OF INFORMATION">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="officerName" placeholder="OFFICER NAME">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dateTo">TO :</label>
                                                    
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-top:18px" for="location">LOCATION :</label>
                                        </div>
                                        <div class="form-group">
                                            <label style="margin-top:18px" for="userName">USER NAME :</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control" id="dateTo">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="sourceInfo" placeholder="LOCATION">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" disabled class="form-control" id="userName" placeholder="USER NAME">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container search-area">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-none" id="search">SEARCH &nbsp&nbsp<span class="glyphicon glyphicon-ok"></span></button> 
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-close">CANCEL&nbsp&nbsp<span class="glyphicon glyphicon-remove"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                    <h1 style="visibility:hidden">Nothing </h1>
                    <h3>RESULTS :</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>NO</th>
                                <th>URN</th>
                                <th>Department</th>
                                <th>Officer Submitting Report</th>
                                <th>Job title</th>
                                <th>View</th>
                            </tr>
                            <tr class="success">
                                <td>1</td>
                                <td>00001251</td>
                                <td>Customs Intelligence Investigation directorate</td>
                                <td>Mark Hamill</td>
                                <td>Intelligence analyst</td>
                                <td><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                            </tr>
                            <tr class="danger">
                                    <td>2</td>
                                    <td>00001251</td>
                                    <td>Customs Intelligence Investigation directorate</td>
                                    <td>Mark Hamill</td>
                                    <td>Intelligence analyst</td>
                                    <td><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                            </tr>
                            <tr class="success">
                                    <td>3</td>
                                    <td>00001251</td>
                                    <td>Customs Intelligence Investigation directorate</td>
                                    <td>Mark Hamill</td>
                                    <td>Intelligence analyst</td>
                                    <td><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                            </tr>
                            <tr class="danger">
                                    <td>4</td>
                                    <td>00001251</td>
                                    <td>Customs Intelligence Investigation directorate</td>
                                    <td>Mark Hamill</td>
                                    <td>Intelligence analyst</td>
                                    <td><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                            </tr>
                        </table>         
                        <nav aria-label="Page navigation">
                                <ul class="pagination">
                                  <li>
                                    <a href="#" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                    </a>
                                  </li>
                                  <li><a href="#">1</a></li>
                                  <li><a href="#">2</a></li>
                                  <li><a href="#">3</a></li>
                                  <li><a href="#">4</a></li>
                                  <li><a href="#">5</a></li>
                                  <li>
                                    <a href="#" aria-label="Next">
                                      <span aria-hidden="true">&raquo;</span>
                                    </a>
                                  </li>
                                </ul>
                        </nav>
                               
                    </div>
                    
                </div>
                    
        </div>
        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
            </div>
        </div>
       
        
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').focus()
            })
        </script>
    </body>
</html>