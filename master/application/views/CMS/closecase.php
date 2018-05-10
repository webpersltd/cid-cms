<!DOCTYPE html>
<html>
    <head>
        <title>CMS</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        
                      </div>
                  
                      <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                        <?php cid_cms_tab(); ?>
                          <li><a href=""></a></li>
                          <li><a href=""></a></li>
                          <li><a href=""></a></li>
                          <li><a href=""></a></li>
                          <li><a href=""></a></li>
                          <li><a href=""></a></li>
                          
                          <li><a href=""></a></li>
                          
                          
                        </ul>
                        
                        <ul class="nav navbar-nav navbar-right">
                        <li style="position:relative;margin-top:6px"><a href=""><span style="border: 1px solid black;border-radius: 15px;padding: 5px;"class="glyphicon glyphicon-bell"></span></a><h5 style="position:absolute;top: 0%;background-color: red;left: 65%;padding: 3px;border-radius: 12px;color: white;">1</h5></li>
                          <li class="dropdown" style="margin-top: 3px;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img style="border-radius: 50%;width: 33px;display: inline-block;"  src="https://www.w3schools.com/howto/img_avatar.png">&nbspHi , Jon Doe <span class="caret"></span></a>
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
        
            <div class="col-md-4">
                <div>
                    <img style="border-radius: 50%;width: 33px;display: inline-block;"  src="https://www.w3schools.com/howto/img_avatar.png">
                    <p style="font-size:16px;display:inline-block">Jon doe</p>
                    <a style="display:block;display: block;margin-top: -5px;margin-left:38px;font-size: 10px;" href="#">Log out</a>
                </div>
                <div style="margin-top:20px;margin-bottom:20px" class="topnav">
                   <div class="search-container">
                        <form action="">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div>
                    <h4>MAIN MENU</h4>
                </div>
                <div class="col-md-5">
                    <ul class="list-group">
                        <li  class="list-group-item"><a href="<?php echo base_url(); ?>CMS/newcase/"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbspNew Case</a></li>
                        <li class="list-group-item"><a href="<?php echo base_url(); ?>CMS/updatecase/"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbspUpdate Case</a></li>
                        <li class="list-group-item"><a href="<?php echo base_url(); ?>CMS/closecase/"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbspClose Case</a></li>
                        
                    </ul>
                   
                   
                
                </div>
                <div style="margin-left: -19px;" class="search-container col-md-12">
                        <form action="">
                        <input type="text" placeholder="Advanced Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                </div>
                <div class="col-md-4">
                    <h4 style="margin-left: -14px;margin-top: 28px;">MANAGEMENTS</h4>
                   
                    <ul class="list-group">
                        <li  class="list-group-item"><a href="<?php echo base_url(); ?>initials/"><span class="glyphicon glyphicon-user"></span>&nbsp&nbspUsers</a></li>
                        <li class="list-group-item"><a href="<?php echo base_url(); ?>subjects/"><span class="glyphicon glyphicon-book"></span>&nbsp&nbspLogs</a></li>
                        
                        
                    </ul>
                   
                   
                
                
                </div>
                
                
               
            </div>
            <div style="margin-left: -178px;" class="col-md-7">
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
                            <th>Subject/Operation</th>
                            <th>Officer in Charge(OIC)</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                        </tr>
                        <tr class="success">
                            <td>1</td>
                            <td><a href="#">00001251</a></td>
                            <td>subject/operation</td>
                            <td>OIC</td>
                            <td>Status</td>
                            <td>Last updated</td>
                        </tr> 
                        <tr class="danger">
                            <td>2</td>
                            <td><a href="#">00001251</a></td>
                            <td>subject/operation</td>
                            <td>OIC</td>
                            <td>Status</td>
                            <td>Last updated</td>
                        </tr> 
                        <tr class="info">
                            <td>3</td>
                            <td><a href="#">00001251</a></td>
                            <td>subject/operation</td>
                            <td>OIC</td>
                            <td>Status</td>
                            <td>Last updated</td>
                        </tr> 
                        <tr class="danger">
                            <td>4</td>
                            <td><a href="#">00001251</a></td>
                            <td>subject/operation</td>
                            <td>OIC</td>
                            <td>Status</td>
                            <td>Last updated</td>
                        </tr> 
                    </table>
                </div>
                
            </div>

            <!--- Associative records start -->


           

            <div style="margin-left: -178px;" class="col-md-7">
                    <div  class="row">
                    <div class="col-md-2">
                        <button class='btn btn-primary btn-radious'><span class="glyphicon glyphicon-list" aria-hidden="true">&nbsp</span>Associated Records</button>
                    </div>
                </div>
                <div style="margin-top:10px;overflow-x: hidden;" class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>NO</th>
                            <th>URN</th>
                            <th>Subject/Operation</th>
                            <th>Officer in Charge(OIC)</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                        </tr>
                        <tr class="success">
                            <td>1</td>
                            <td><a href="#">00001251</a></td>
                            <td>subject/operation</td>
                            <td>OIC</td>
                            <td>Status</td>
                            <td>Last updated</td>
                        </tr> 
                        <tr class="danger">
                            <td>2</td>
                            <td><a href="#">00001251</a></td>
                            <td>subject/operation</td>
                            <td>OIC</td>
                            <td>Status</td>
                            <td>Last updated</td>
                        </tr> 
                        <tr class="info">
                            <td>3</td>
                            <td><a href="#">00001251</a></td>
                            <td>subject/operation</td>
                            <td>OIC</td>
                            <td>Status</td>
                            <td>Last updated</td>
                        </tr> 
                        <tr class="danger">
                            <td>4</td>
                            <td><a href="#">00001251</a></td>
                            <td>subject/operation</td>
                            <td>OIC</td>
                            <td>Status</td>
                            <td>Last updated</td>
                        </tr> 
                    </table>


                    <div>
                        <h4 style="color:white;display:block;background-color:#337ab7;padding-top:10px;padding-bottom:10px;padding-left:0px">Search Recodrs</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <h5>URN</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" type="text" name="time"/>
                               </div>

                               <div>
                                    <h5>Subject surname</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" type="text" name="time"/>
                               </div>

                               <div>
                                    <h5>Date of Birth</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" type="date" name="time"/>
                               </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <h5 style="width:20%">Case type</h5>
                                    <select style="display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;">
                                            <option value="Counterfeit_goods">Counterfeit Goods</option>
                                            <option value="Drugs">Drugs</option>
                                            <option value="Excise Evasion">Excise Evasion</option>
                                            <option value="Firearms">Firearms</option>
                                            <option value="Money laundering">Money laundering</option>
                                            <option value="Prohibited Goods">Prohibited Goods</option>
                                            <option value="Smuggling(other)">Smuggling(other)</option>
                                    </select>
                               </div>
                               <div>
                                    <h5>Subject Firstname</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" type="text" name="time"/>
                               </div>

                               <div>
                                    <h5 style="width:20%">Department</h5>
                                    <select style="display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;">
                                            <option value="Customs Intelligence & Investigation Directorate (CIID)">Customs Intelligence & Investigation Directorate (CIID</option>
                                            <option value="Benapole Custom House">Benapole Custom House</option>
                                            <option value="Chittagong Custom House">Chittagong Custom House</option>
                                            <option value="Dhaka Custom House">Dhaka Custom House</option>
                                            <option value="ICD (Dhaka) Custom House">ICD (Dhaka) Custom House</option>
                                    </select>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Associative record end -->


            <!-- Search box start -->
           

            <!-- Search box end -->
                
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