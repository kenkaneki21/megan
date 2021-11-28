@extends('admin.admin_master')

@section('admin')
<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="border-bottom text-center pb-4">
                        <img src="https://th.bing.com/th/id/OIP.BYlUhGXWlMNsV1FFUisMFAHaH7?pid=ImgDet&rs=1" alt="profile" class="img-lg rounded-circle mb-3"/>
                        <div class="mb-3">
                          <h3>{{ $entities->f_name }} {{ $entities->m_name }} {{ $entities->l_name }} </h3>

                          
                         
                        </div>
                        
                        <div class="d-flex justify-content-center">
                          @if($entities->entity_type == 1)
                          <h5>Student</h5>
                          @else
                          <h5>Instructor</h5>
                          @endif
                        </div>
                      </div>
                     
                    
                      <div class="py-4">
                        <p class="clearfix">
                          <span class="float-left">
                            Status
                          </span>
                          <span class="float-right text-muted">
                            Active
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Phone
                          </span>
                          <span class="float-right text-muted">
                            {{ $entities->mobile }}
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Mail
                          </span>
                          <span class="float-right text-muted">
                             {{ $entities->email }}
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Birthdate 
                          </span>
                          <span class="float-right text-muted">
                            {{ $entities->birthdate }}
                          </span>
                        </p>
                      
                      </div>
                    
                    </div>
                    <div class="col-lg-8">
                      <div class="d-block d-md-flex justify-content-between mt-4 mt-md-0">
                        <div class="text-center mt-4 mt-md-0">
                          <button class="btn btn-outline-primary">C1</button>
                          <button class="btn btn-primary">C2</button>
                          <button class="btn btn-primary">C3</button>
                          <button class="btn btn-primary">C4</button>

                        </div>
                      </div>
                      <div class="mt-4 py-2 border-top border-bottom">
                        <ul class="nav profile-navbar">
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                              <i class="mdi mdi-account-outline"></i>
                              I. Personal Info
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" href="#">
                              <i class="mdi mdi-newspaper"></i>
                              II. Family Background
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                              <i class="mdi mdi-calendar"></i>
                              III. Educational Background
                            </a>
                          </li>
                       <!--    <li class="nav-item">
                            <a class="nav-link" href="#">
                              <i class="mdi mdi-attachment"></i>
                              IV. Civil Service Eligibility
                            </a>
                          </li>

                            <li class="nav-item">
                            <a class="nav-link" href="#">
                              <i class="mdi mdi-attachment"></i>
                              V. Work Experience  
                            </a>
                          </li>

                            <li class="nav-item">
                            <a class="nav-link" href="#">
                              <i class="mdi mdi-attachment"></i>
                              VI. VOLUNTARY WORK
                            </a>
                          </li>

                            <li class="nav-item">
                            <a class="nav-link" href="#">
                              <i class="mdi mdi-attachment"></i>
                              VII. LEARNING AND DEVELOPMENT
                            </a>
                          </li>

                            <li class="nav-item">
                            <a class="nav-link" href="#">
                              <i class="mdi mdi-attachment"></i>
                              VII. OTHER INFORMATION
                            </a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link" href="#">
                              <i class="mdi mdi-attachment"></i>
                              LGU-C
                            </a>
                          </li> -->


                        </ul>
                      </div>
                      <div class="profile-feed">
                         <div class="row">

                                <div class="col-md-1">
                                </div>
                                 <div class="col-md-10">

                               <h3><center>Personal Information </center></h3><br>
                               
                                <p><font size="3"> Name: &nbsp; {{ $entities->l_name }}, {{ $entities->f_name }} {{ $entities->suffix }} {{ $entities->m_name }} </font> </p>

                                <p><font size="3"> Date of Birth: &nbsp; {{ $entities->birthdate }} </font> </p>
                                 <p><font size="3">Place of Birth: &nbsp; {{ $entities->birthplace }} </font> </p>

                                  <p><font size="3">Sex: &nbsp; {{ $entities->sex }} </font> </p>

                                   <p><font size="3">Civil Status: &nbsp; {{ $entities->civil_status }} </font> </p>

                                  <p><font size="3">Height (m) &nbsp; {{ $entities->height }} </font> </p>

                                  <p><font size="3">Weight (kg) &nbsp; {{ $entities->weight }} </font> </p>

                                   <p><font size="3">Blood Type &nbsp; {{ $entities->blood_type }} </font> </p>

                                  <p><font size="3">GSIS ID NO. &nbsp; {{ $entities->gsis_id }} </font> </p>

                                   <p><font size="3">PHILHEALTH NO. &nbsp; {{ $entities->philhealth_no }} </font> </p>

                                    <p><font size="3">SSS NO. &nbsp; {{ $entities->sss_no }} </font> </p>

                                    <p><font size="3">TIN NO. &nbsp; {{ $entities->tin_no }} </font> </p>

                                    <p><font size="3">AGENCY EMPLOYEE NO. &nbsp; {{ $entities->agency_employee_no }} </font> </p>

                                     <p><font size="3">CITIZEN SHIP: &nbsp; {{ $entities->citizenship }} </font> </p>

                                       <p><font size="3">MEMBERSHIP: &nbsp; {{ $entities->membershipRadios }} </font> </p>

                                  

                                     <p><font size="3"> RESIDENTIAL ADDRESS: &nbsp; {{ $entities->res_house }} {{ $entities->res_street }} {{ $entities->res_subdivision }} {{ $entities->res_brgy }} {{ $entities->res_city }} {{ $entities->res_province }} {{ $entities->res_zipcode }} </font> </p>

                                      <p><font size="3"> PERMANENT ADDRESS: &nbsp; {{ $entities->per_house }} {{ $entities->per_street }} {{ $entities->per_subdivision }} {{ $entities->per_brgy }} {{ $entities->per_city }} {{ $entities->per_province }} {{ $entities->per_zipcode }} </font> </p>

                                      <p><font size="3">TELEPHONE NO. &nbsp; {{ $entities->telephone }} </font> </p>

                                        <p><font size="3">MOBILE NO. &nbsp; {{ $entities->mobile }} </font> </p>


                                           <p><font size="3">EMAIL &nbsp; {{ $entities->email }} </font> </p>

                                  </div> 

                                  <div class="col-md-1">
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
          @endsection