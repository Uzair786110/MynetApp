<?php include'header.php' ;
 $Customers="SELECT count(*) c from user";
 $results = mysqli_query($db,$Customers);
 $cntcustom = mysqli_fetch_assoc($results);

 $Employee="SELECT count(*) c from employee";
 $results = mysqli_query($db,$Employee);
 $cntemp = mysqli_fetch_assoc($results);

 
 $package="SELECT count(*) c from packages";
 $results = mysqli_query($db,$package);
 $cntpack = mysqli_fetch_assoc($results);

 $des="SELECT count(*) c from designation";
 $dresults = mysqli_query($db,$des);
 $cntdes = mysqli_fetch_assoc($dresults);


 $am=" SELECT SUM(amount) as t_amount FROM `bill`";
 $amresults = mysqli_query($db,$am);
 $tam = mysqli_fetch_assoc($amresults);

 $r="SELECT SUM(Remaining) as remain FROM `user`";
 $rresults = mysqli_query($db,$r);
 $ram = mysqli_fetch_assoc($rresults);


 $x="SELECT SUM(Amount) as exp FROM `expense`";
 $xresults = mysqli_query($db,$x);
 $xam = mysqli_fetch_assoc($xresults);
?>

<div class="container-fluid">
   <div class="row">
      <div class="col-md-12 mb-4 mt-1">
         <div class="d-flex flex-wrap justify-content-between align-items-center">
             <h4 class="font-weight-bold">Overview</h4>
                              
            </div>
         </div>
      </div>
      <div class="col-lg-12 col-md-12">
         <div class="row">
            <div class="col-md-3">
               <div class="card">
                  <div class="card-body bg-box ">
                     <div class="d-flex align-items-center ">
                        <div class="">
                            <p class="mb-2 text-white">User Registeration</p>
                           
                            <div class="d-flex flex-wrap justify-content-start align-items-center">
                               <h5 class="mb-0 font-weight-bold text-white"><?php echo $cntcustom['c']?></h5>
                              
                            </div>                            
                        </div>
                     </div>
                  </div>
               </div>   
            </div>
            <div class="col-md-3"> 
               <div class="card">
                  <div class="card-body bg_box4">
                     <div class="d-flex align-items-center">
                           <div class="">
                              <p class="mb-2 text-white">Total Package</p>
                              <div class="d-flex flex-wrap justify-content-start align-items-center">
                                 <h5 class="mb-0 font-weight-bold text-white"><?php echo $cntpack['c']?></h5>
                               
                              </div>                            
                           </div>
                     </div>
                  </div>
               </div>  
            </div>
            <?php
             if($role=='admin')
             {
               ?>
            <div class="col-md-3">
               <div class="card">
                  <div class="card-body bg_box1">
                     <div class="d-flex align-items-center">
                           <div class="">
                              <p class="mb-2 text-white">Employee Registrations

</p>
                              <div class="d-flex flex-wrap justify-content-start align-items-center">
                                 <h5 class="mb-0 font-weight-bold text-white"><?php echo $cntemp['c']?></h5>
                                 
                              </div>                            
                           </div>
                     </div>
                  </div>
               </div>   
            </div>
           
            <div class="col-md-3">
               <div class="card">
                  <div class="card-body bg_box3" >
                     <div class="d-flex align-items-center">
                           <div class="">
                              <p class="mb-2 text-white">Total Designation</p>
                              <div class="d-flex flex-wrap justify-content-start align-items-center">
                                 <h5 class="mb-0 font-weight-bold text-white"><?php echo $cntdes['c']?></h5>
                                 
                              </div>                            
                           </div>
                     </div>
                  </div>
               </div>
            </div>
          
            <div class="col-md-3"> 
               <div class="card">
                  <div class="card-body bg_box5">
                     <div class="d-flex align-items-center">
                           <div class="">
                              <p class="mb-2 text-white">Total Income</p>
                              <div class="d-flex flex-wrap justify-content-start align-items-center">
                                 <h5 class="mb-0 font-weight-bold text-white"><?php echo $tam['t_amount']?></h5>
                                
                              </div>                            
                           </div>
                     </div>
                  </div>
               </div>  
            </div>
            <div class="col-md-3">
               <div class="card">
                <div class="card-body bg_box2">
                    <div class="d-flex align-items-center">
                        <div class="">
                           <p class="mb-2 text-white">Total Remaining Amount</p>
                           <div class="d-flex flex-wrap justify-content-start align-items-center">
                              <h5 class="mb-0 font-weight-bold text-white"><?php echo $ram['remain']?></h5>
                             
                           </div>                            
                        </div>
                    </div>
                </div>
               </div>  
            </div>
            <div class="col-md-3"> 
               <div class="card">
                  <div class="card-body bg_box4">
                     <div class="d-flex align-items-center">
                           <div class="">
                              <p class="mb-2 text-white">Total Expenses</p>
                              <div class="d-flex flex-wrap justify-content-start align-items-center">
                                 <h5 class="mb-0 font-weight-bold text-white"><?php echo $xam['exp']?></h5>
                               
                              </div>                            
                           </div>
                     </div>
                  </div>
               </div>  
            </div>
            <?php
             }
             ?>
            </div>
            <!-- <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                     <h4 class="font-weight-bold">Sales Report</h4>
                     <div class="d-flex justify-content-between align-items-center">
                        <div><svg width="24" height="24" viewBox="0 0 24 24" fill="primary" xmlns="http://www.w3.org/2000/svg">
                              <rect x="3" y="3" width="18" height="18" rx="2" fill="#3378FF" />
                              </svg>
                           <span>Incomes</span>
                        </div>
                        <div class="ml-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect x="3" y="3" width="18" height="18" rx="2" fill="#19b3b3" />
                                          </svg>
                           <span>Expenses</span>
                        </div>
                     </div>
                  </div>
                   <div id="chart-apex-column-01" class="custom-chart"></div>
                </div>
            </div>   
            </div> -->
         </div>
      </div>
    
      
     
      
      
      <!-- <div class="col-lg-4 col-md-12">
         <div class="card">
            <div class="card-body">
               <h4 class="font-weight-bold mb-3">City Orders Statistics</h4>
               <div id="chart-map-column-04" class="custom-chart"></div>
            </div>
         </div>
      </div> -->
   </div>
   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    <!-- Page end  -->
</div>
      </div>
    </div>
    <!-- Wrapper End-->
 
    <?php include'footer.php' ?>