
<!DOCTYPE html>
<html>
    <head>
        <title>Initials</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"/>
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
                    <a class="breadcrumb-item active" href="#">INITIALS&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">SUBJECT&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">TEXT&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">HANDLING CODE&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">PROTECTIVE MARKING&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">REVIEW&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                    <a class="breadcrumb-item" href="#">DISSEMINATION</a>
                </nav>
               
                <h2 class="main-headline" style="text-align:center">Initial information</h2>
                <form id="initials"  action="<?php echo base_url(); ?>saveinitials/" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div style="margin-top:5px" class="col-md-6">
                                <label for="exampleInputEmail1"></label>REPORT UNIQUE REFERENCE NUMBER(URN) : </label>
                            </div>
                            <div  class="col-md-5">
                                <input readonly style="border:none" name="urn" type="text" class="form-control" id="exampleInputEmail1" value="000151512">
                            </div>
                        </div>
                    </div>
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-6">
                                DEPARTMENT :
                           </div>
                           <div class="col-md-6">
                                <select name="department">
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
                                 <input type="date" name="date_of_report">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                            <div  class="row">
                                <div class="col-md-6">
                                    INFORMATION SOURCE:
                                </div>
                                <div class="col-md-6">
                                    <select id="source-selection" name="information_source">
                                        <option value="Anonymous Tip">Anonymous Tip</option>
                                        <option value="Customs (Bangladesh)">Customs (Bangladesh)</option>
                                        <option value="Customs (Foreign)">Customs (Foreign)</option>
                                        <option value="Customs Hotline">Customs Hotline</option>
                                        <option value="Donor Organization">Donor Organization</option>
                                        <option value="Other">Other(Please specify)</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div id="other-source-input-field" style="display:none" class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                     INFORMATION SOURCE OTHER :
                                </div>
                                <div class="col-md-6">
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
                                    <input type="text" name="submitting_person_name">
                                </div>
                            </div>
                    </div> 
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                     TIME OF REPORT :
                                </div>
                                <div class="col-md-6">
                                    <input type="time" name="time_of_report">
                                </div>
                            </div>
                    </div>  
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                     INTELLIGENCE SOURCE REFERENCE(ISR) :
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="ISR">
                                </div>
                            </div>
                    </div> 
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                   <button type="submit" class="btn btn-success">Save and Continue&nbsp;&nbsp<span class="glyphicon glyphicon-ok"></span></button>
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
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>js/initials.js"></script>





        
    <script type="text/javascript">
    /* addEventListener('load',function(e){
        $.ajax({
        url : "<?php echo base_url(); ?>Rest/",
        type : "POST",
        dataType : "json",
        data : {"account" :localStorage.getItem("data")},
        success : function(data) {
            console.log(data)
        },
        error : function(data) {
            console.log("fail to load.......");
        }
    });
     })*/
       
    
    </script>
    </body>
</html>

