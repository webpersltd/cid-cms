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
            <div style="margin-left: -178px;background-color: #00ABEA;" class="col-md-7">
                <div style="margin-bottom:23px;margin-top: 38px;" class="tabs">
                        <input type="radio" name="tabs" id="tabone" checked="checked">
                        <label for="tabone"><span class="glyphicon glyphicon-italic"></span>&nbspInitials</label>
                        <div class="tab">
                            <form class="initials-form" style="margin-left:10%" action="#">
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
                               <div>
                                    <h5 style="width:20%">Submitted by</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" type="text" name="case_submitted_by" value="Submitted by"/>
                               </div>
                               <div>
                                    <h5 style="width:20%">Date</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" type="text" name="date"/>
                               </div>
                               <div>
                                    <h5 style="width:20%">Time</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" type="text" name="time"/>
                               </div>
                               

                               <div>
                                    <h5 style="width:20%">Operation name</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" type="text" name="time"/>
                               </div>

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
                                    <h5 style="width:20%">CID(URN)s</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" type="url" name="time"/>
                               </div>
                                <div>
                                    <button class="btn btn-danger">Cancel</button>
                                    <button class="btn btn-success">Save and continue</button>
                                </div>
                            </form>
                        </div>
                        <input type="radio" name="tabs" id="tabtwo">
                        <label for="tabtwo"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbspSubject</label>
                        <div class="tab">
                            <div style="margin-left:10%">
                                <div>
                                    <h5 style="width:20%">First Name</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" type="text" name="first_name" placeholder="Frist name"/>
                                </div>
                                <div>
                                    <h5 style="width:20%">Surname</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" placeholder="surname" type="text" name="surname"/>
                                </div>
                                <div>
                                    <h5 style="width:20%">Father's name</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" placeholder="Father's name" type="text" name="Father's name"/>
                                </div>
                                <div>
                                    <h5 style="width:20%">Gender</h5>
                                    <select style="display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                    </select>
                               </div>

                               <div>
                                    <h5 style="width:20%">Place of birth</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" placeholder="Place of birth" type="text" name="place_of-birth"/>
                                </div>


                                <div>
                                    <h5 style="width:20%">Date of birth</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="date" name="date_of_birth"/>
                                </div>

                                <div>
                                    <h5 style="width:20%">Approximate age</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="a_age"/>
                                </div>



                                <div>
                                    <h5 style="width:20%">Nationality</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="nationality"/>
                                </div>

                                <div>
                                    <h5 style="width:20%">Identification(ID)type</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="id_type"/>
                                </div>


                                <div>
                                    <h5 style="width:20%">ID number</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="id_number"/>
                                </div>
                                <div>
                                    <h5 style="width:20%">Home addess</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="home_address"/>
                                </div>
                                <div>
                                    <h5 style="width:20%">Business Name</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="nationality"/>
                                </div>
                                <div>
                                    <h5 style="width:20%">Business address</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="business-address"/>
                                </div>

                                <div>
                                    <h5 style="width:20%">BIN or TIN</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="bin_tin"/>
                                </div>

                                <div>
                                    <h5 style="width:20%">Telephone numbers</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="t_numbers"/>
                                </div>

                                <div>
                                    <h5 style="width:20%">Description</h5>
                                    <textarea style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"></textarea>
                                </div>

                                <div>
                                    <h5 style="width:20%">Attach file</h5>
                                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" type="file"/>
                                </div>

                                <div>
                                    <button id="add_additional_subject_cms" class="btn btn-success">Add additional subject</button>
                                    <button class="btn btn-danger">cancel</button>
                                    <button class="btn btn-primary">Save and continue</button>
                                </div>


</div>
                        </div>
                        <input type="radio" name="tabs" id="tabthree">
                        <label for="tabthree"><span class="glyphicon glyphicon-text-size" aria-hidden="true"></span>&nbspText</label>
                        <div class="tab">
                           <button class="btn btn-primary" id="add_text_box_cms" style="display:block">ADD TEXT</button>
                           <div id="cms_text_box">
                                <textarea id="text_box_cms_0" style="margin-top:10px;display:inline-block;width:100%;padding-top:7px;padding-bottom:7px;"></textarea>
                           </div>
                           
                           <button class="btn btn-danger">cancel</button>
                           <button class="btn btn-success">Save</button>
                        </div>
                        <input type="radio" name="tabs" id="tabfour">
                        <label for="tabfour"><span class="glyphicon glyphicon-lock"></span>&nbspProtective marking</label>
                        <div class="tab">
                            <p style="border:3px solid red;text-align:center;padding:20px;font-weight:bold;font-size:20px">
                                You must apply the appropiate Protective Marking to this Report
                                Please ensure you apply the correct marking as it will directly impact how the information can be viewed and handled.
                                if you are unsure , then seek advice fro your supervisor
                            </p>
                            <div style="margin-left:15%;margin-top:5%;margin-bottom:5%">
                                <button  class="p_mark_cms" val="restricted">Restricted</button>
                                <button  class="p_mark_cms" val="confedential">Confidential</button>
                                <button  class="p_mark_cms" val="secret">Secret</button>
                                <button  class="p_mark_cms" val="topsecret">Top secret</button>
                            </div>
                           <div style="float:right">
                            <button class="btn btn-danger">Cancel</button>
                            <button class="btn btn-success">Save and Continue</button>
                           </div>
                        </div>
                </div>
            </div> 
        </div> 

        <!-- Protective marking modal box start -->

        <div id="myModal" class="modal">
                
        
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modal-header">
                    <h4 id="p_mark_head_cms" class="modal-title">kjdfgkjdfkgj</h4>
                </div>
                <h5 style="font-weight:bold">In your Assestment, the accidental loss or disclosure of this information may :</h5>
                <ul id="protective_marking_content">

                </ul>
                <div>
                    <button class="btn btn-danger">Cancel</button>
                    <button class="btn btn-success">Save and Continue</button>
                </div>
             </div>
        </div>


        <!-- Protective marking modal box end -->   


        <!-- Protective marking modal box start -->

        <div id="addSubjectModal" class="modal">
                
        
            <div class="modal-content">
                <span class="close close1">&times;</span>
                <div class="modal-header">
                    <h4 id="p_mark_head_cms" class="modal-title">Add new subject</h4>
                </div>
                <div style="margin-left:10%">
                <div>
                    <h5 style="width:20%">First Name</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" type="text" name="first_name" placeholder="Frist name"/>
                </div>
                <div>
                    <h5 style="width:20%">Surname</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" placeholder="surname" type="text" name="surname"/>
                </div>
                <div>
                    <h5 style="width:20%">Father's name</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" placeholder="Father's name" type="text" name="Father's name"/>
                </div>
                <div>
                    <h5 style="width:20%">Gender</h5>
                    <select style="display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                    </select>
               </div>

               <div>
                    <h5 style="width:20%">Place of birth</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" placeholder="Place of birth" type="text" name="place_of-birth"/>
                </div>


                <div>
                    <h5 style="width:20%">Date of birth</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="date" name="date_of_birth"/>
                </div>

                <div>
                    <h5 style="width:20%">Approximate age</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="a_age"/>
                </div>



                <div>
                    <h5 style="width:20%">Nationality</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="nationality"/>
                </div>

                <div>
                    <h5 style="width:20%">Identification(ID)type</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="id_type"/>
                </div>


                <div>
                    <h5 style="width:20%">ID number</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="id_number"/>
                </div>
                <div>
                    <h5 style="width:20%">Home addess</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="home_address"/>
                </div>
                <div>
                    <h5 style="width:20%">Business Name</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="nationality"/>
                </div>
                <div>
                    <h5 style="width:20%">Business address</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="business-address"/>
                </div>

                <div>
                    <h5 style="width:20%">BIN or TIN</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="bin_tin"/>
                </div>

                <div>
                    <h5 style="width:20%">Telephone numbers</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"  type="text" name="t_numbers"/>
                </div>

                <div>
                    <h5 style="width:20%">Description</h5>
                    <textarea style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;"></textarea>
                </div>

                <div>
                    <h5 style="width:20%">Attach file</h5>
                    <input style="margin-top:10px;display:inline-block;width:52%;padding-top:7px;padding-bottom:7px;" type="file"/>
                </div>
                <div>
                    <button class="btn btn-danger">Cancel</button>
                    <button class="btn btn-success">Save and Continue</button>
                </div>
             </div>
        </div>


        <!-- Protective marking modal box end -->  

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/CMS/newcase.js"></script>

        



        
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