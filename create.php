<?php include'header.php' ?>
<style>

</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>User Name:</label>

                        <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" name="txtUserName">
                        </div>
                    
                    </div>   
                </div>               
                <div class="col-md-12">                                              
                    <div class="form-group">
                        <label>E-mail:</label>
                        
                            <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            
                            </div>
                                <input type="email" class="form-control" placeholder="E-mail" name="txtEmail">
                            </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Gender:</label>
                        
                            <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            
                            </div>
                            <select class="form-control" name="cmbGender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            </div>
                    </div>
                </div>
                <div class="col-md-12">    
                    <div class="form-group">
                        <label>Contact No:</label>
                        
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <input type="number" class="form-control" placeholder="Number" name="txtContact">
                        
                        </div>
                    </div>
                </div>
            
                <div class="col-md-12">
                    <div class="form-group">
                    <label> Address:</label>
                        
                        <div class="input-group">
                            <div class="input-group-addon">
                            <i class="glyphicon glyphicon-tags"></i>	
                            </div>
                        
                        <textarea class="form-control" rows="3" name="txtAddress"></textarea>
                        </div>
                    </div>
                    
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Joining Date:</label>

                        <div class="input-group date">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control pull-right hasDatepicker" id="Date" name="txtJoin">
                        </div>
                        <!-- /.input group -->
                    </div>
                </div>                            
                    
            </div>
        </div>
        <div class="col-md-6">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <img id="test" alt="" class="thumbnail" width="100" height="100">
                        <label> Image:</label>
                        
                        <div class="input-group">
                            
                            <input onchange="readURL(this);" type="file" name="pic">
                        
                        
                        </div>
                    
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Office Location :</label>
                        
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-map-marker"></i>
                            </div>
                            <select class="form-control" name="cmbOlocation">
                                <option value="Head Office">Head Office</option>
                                <option value="Brance Office">Branch Office</option>
                            </select>
                        
                        </div>
                    </div> 
                </div>    
                <div class="col-md-12">
                    <div class="form-group">
                        <label> User Status :</label>
                    
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-send"></i>
                            </div>
                            <select class="form-control" name="cmbStatus">
                                <option value="Active"> Active</option>
                                <option value="InActive"> InActive</option>
                            </select>
                        
                        </div>
                    </div> 
                </div>    
                <div class="col-md-12">
                    <div class="form-group">
                        <label> User Type :</label>
                        
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <select class="form-control" name="cmbUtype">
                            
                                <option>--select--</option>
                                                
                                <option value="1">Super Admin</option>
                                                
                                <option value="2">Admin</option>
                                                
                                <option value="3">Entry Operator</option>
                                                
                                <option value="4">Editor</option>
                                                
                                <option value="5">Super User</option>
                                                
                                <option value="6">User</option>
                            </select>
                        
                        </div>
                    </div> 
                </div>    
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Password:</label>
                        
                        <div class="input-group">
                            <div class="input-group-addon">
                            <i class="fa fa-key"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="**********" name="pwdPassword">
                        </div>
                    </div>
                </div>    
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Retype Password:</label>
                        
                        <div class="input-group">
                            <div class="input-group-addon">
                            <i class="fa fa-key"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="**********" name="pwdRePassword">
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>
<?php include'footer.php' ?>