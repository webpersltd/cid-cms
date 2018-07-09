<!DOCTYPE html>

<html>
    <head>
        <title>Title here</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="./css/style.css"/>
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
                          <li><a href=""></a></li>
                          <li><a href=""></a></li>
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
                        <li  class="list-group-item"><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp&nbspInitials</a></li>
                        <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp&nbspSubjects</a></li>
                        <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-text-size" aria-hidden="true"></span>&nbsp&nbspText</a></li>
                        <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-compressed" aria-hidden="true"></span>&nbsp&nbspHandling code</a></li>
                        <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-registration-mark" aria-hidden="true"></span>&nbsp&nbspProtective</a></li>
                        <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span>&nbsp&nbspMarking</a></li>
                        <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>&nbsp&nbspReview</a></li>
                        <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>&nbsp&nbspDissemination</a></li>
                        <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp&nbspSearch</a></li>
                        <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>&nbsp&nbspView log</a></li>
                    </ul>
                </div>
                <div  class="col-md-10">
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
                    
                    <a href="./templates/initials.html" style="margin-bottom:10px" class="btn btn-black"><span class="glyphicon  glyphicon-plus" aria-hidden="true">&nbsp</span>ADD NEW RECORD</a>
                    <div  class="row">
                        <div class="col-md-2">
                            <button class='btn btn-primary btn-radious'><span class="glyphicon glyphicon-list" aria-hidden="true">&nbsp</span>My Records</button>
                        </div>
                    </div>
                    <div style="margin-top:10px" class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>NO</th>
                                <th>URN</th>
                                <th>Location</th>
                                <th>Officer</th>
                                <th>View</th>
                                <th>Approved</th>
                            </tr>
                            <tr class="success">
                                <td>1</td>
                                <td>00001251</td>
                                <td>Customs Intelligence Investigation directorate</td>
                                <td>Mark Hamill</td>
                                <td><a href="#"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                                <td>Y</td>
                            </tr> 
                            <tr class="danger">
                                <td>2</td>
                                <td>00001252</td>
                                <td>Customs Intelligence Investigation directorate</td>
                                <td>Mark Hamill</td>
                                <td><a href="#"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                                <td>N</td>
                            </tr> 
                            <tr class="info">
                                    <td>3</td>
                                    <td>00001253</td>
                                    <td>Customs Intelligence Investigation directorate</td>
                                    <td>Mark Hamill</td>
                                    <td><a href="#"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                                    <td>Y</td>
                                </tr> 
                                <tr class="danger">
                                    <td>4</td>
                                    <td>00001254</td>
                                    <td>Customs Intelligence Investigation directorate</td>
                                    <td>Mark Hamill</td>
                                    <td><a href="#"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                                    <td>N</td>
                                </tr> 
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <button class='btn btn-danger btn-radious'><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true">&nbsp</span>For Approval</button>
                        </div>
                    </div>
                    <div style="margin-top:10px" class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>NO</th>
                                    <th>URN</th>
                                    <th>Location</th>
                                    <th>Officer</th>
                                    <th>View</th>
                                    <th>Approved</th>
                                </tr>
                                <tr class="danger">
                                    <td>1</td>
                                    <td>00001251</td>
                                    <td>Customs Intelligence Investigation directorate</td>
                                    <td>Mark Hamill</td>
                                    <td><a href="#"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                                    <td>N</td>
                                </tr> 
                                <tr class="danger">
                                    <td>2</td>
                                    <td>00001252</td>
                                    <td>Customs Intelligence Investigation directorate</td>
                                    <td>Mark Hamill</td>
                                    <td><a href="#"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                                    <td>N</td>
                                </tr> 
                                <tr class="danger">
                                        <td>3</td>
                                        <td>00001253</td>
                                        <td>Customs Intelligence Investigation directorate</td>
                                        <td>Mark Hamill</td>
                                        <td><a href="#"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                                        <td>N</td>
                                    </tr> 
                                    <tr class="danger">
                                        <td>4</td>
                                        <td>00001254</td>
                                        <td>Customs Intelligence Investigation directorate</td>
                                        <td>Mark Hamill</td>
                                        <td><a href="#"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                                        <td>N</td>
                                    </tr> 
                            </table>
                        </div>
                    <div class="row">
                            <div class="col-md-2">
                                <button class='btn btn-success btn-radious'><span class="glyphicon glyphicon-ok" aria-hidden="true">&nbsp</span>Approved</button>
                            </div>
                    </div>
                    <div style="margin-top:10px" class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>NO</th>
                                    <th>URN</th>
                                    <th>Location</th>
                                    <th>Officer</th>
                                    <th>View</th>
                                    <th>Approved</th>
                                </tr>
                                <tr class="success">
                                    <td>1</td>
                                    <td>00001251</td>
                                    <td>Customs Intelligence Investigation directorate</td>
                                    <td>Mark Hamill</td>
                                    <td><a href="#"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                                    <td>Y</td>
                                </tr> 
                                <tr class="success">
                                    <td>2</td>
                                    <td>00001252</td>
                                    <td>Customs Intelligence Investigation directorate</td>
                                    <td>Mark Hamill</td>
                                    <td><a href="#"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                                    <td>N</td>
                                </tr> 
                                <tr class="success">
                                        <td>3</td>
                                        <td>00001253</td>
                                        <td>Customs Intelligence Investigation directorate</td>
                                        <td>Mark Hamill</td>
                                        <td><a href="#"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                                        <td>Y</td>
                                    </tr> 
                                    <tr class="success">
                                        <td>4</td>
                                        <td>00001254</td>
                                        <td>Customs Intelligence Investigation directorate</td>
                                        <td>Mark Hamill</td>
                                        <td><a href="#"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>
                                        <td>N</td>
                                    </tr> 
                            </table>
                        </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="background-color:black">
            <div class="col-md-12" >
                <p class="footer" style="color:white">&copy;2017,All rights reserved</p>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>