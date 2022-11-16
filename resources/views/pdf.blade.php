<!DOCTYPE html>
<html>

  <body>
@if($role =="administrator")

  <div class="main-content">
        <section class="section">
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Evaluation Details</h4>
                    <div class="card-body">
                  </div>        
                  </div>
                  <div class="card-body">
                  <div>
                  @foreach ($adminevaluation as $adminevaluation)
                  <label>Employee Name   :   <b>{{$adminevaluation->name}}</b></label><br>
                  <label>Recorded Date   :   <b>{{$adminevaluation->evaluationdate}}</b></label><br>
                  <label>Remarks         :   <b>{{$adminevaluation->remarks}}</b></label><br>
                  <label>Total Rating    :   <b>{{$adminevaluation->totalrating}}</b></label><br><br>
                  </div>
                      <table class="bordered">
                          <tr>
                              <th>No</th>
                              <th>Indicator</th>
                              <th style="width:40%;">Description</th>
                              <th>Rate</th>
                              <th>Evidence</th>
                          </tr>
                          <tr>
                                  <td>1</td>
                                  <td>Quantity of work</td>
                                  <td>
                                  @if ($adminevaluation->quantityofwork==5)
                                  Total tasks are more than 100.
                                  @elseif ($adminevaluation->quantityofwork==4)
                                  Total tasks are more than 85
                                  @elseif ($adminevaluation->quantityofwork==3)
                                  Total tasks are more than 50.
                                  @elseif ($adminevaluation->quantityofwork==2)
                                  Total tasks are more than 30.
                                  @elseif ($adminevaluation->quantityofwork==1)
                                  Total tasks are more than 10.
                                  @endif
                                  </td>
                                  <td>{{$adminevaluation->quantityofwork}}</td>
                                  <td><label>Total Task       :   <b>{{$totaltask}}</b></label><br></td>
                          
                            </tr>
                            <tr>
                                  <td>2</td>
                                  <td>Quality of work</td>
                                  <td>
                                  @if ($adminevaluation->qualityofwork==5)
                                  Always carry out assigned tasks, and complete tasks on time and 
                            results in accordance with instructions leader                                  
                            @elseif ($adminevaluation->qualityofwork==4)
                            Always doing the assigned task and completing the task on time sometimes makes mistakes                                  
                            @elseif ($adminevaluation->qualityofwork==3)
                            Performs assigned tasks even if late and less accurate with what is instructed                                  
                            @elseif ($adminevaluation->qualityofwork==2)
                            Work on tasks but are often late and many mistakes occur
                        
                                  @elseif ($adminevaluation->qualityofwork==1)
                                  Often does not do assigned tasks                                  @endif
                                  </td>
                                  <td>{{$adminevaluation->quantityofwork}}</td>
                                  <td>
                                      <label>On-Time Task     :   <b>{{$ontimetask}}</b></label><br>
                                      <label>Late Submission Task     :   <b>{{$latesubmissiontask}}</b></label><br>
                                  </td>
                          
                            </tr>
                            <tr>
                                  <td>3</td>
                                  <td>Attendance</td>
                                  <td>
                                  @if ($adminevaluation->attendance==5)
                                  Be on time consistently with 0% tardiness                            
                            @elseif ($adminevaluation->attendance==4)
                            Attendance rate ≥ 95%                                  
                            @elseif ($adminevaluation->attendance==3)
                            Attend but sometimes like to come late with the condition of getting permission
                            @elseif ($adminevaluation->attendance==2)
                            Absenteeism rate > 10% and coming late
                        
                                  @elseif ($adminevaluation->attendance==1)
                                  Often comes late and the attendance record is not clear
                                  @endif
                                  </td>
                                  <td>{{$adminevaluation->attendance}}</td>
                                  <td><label>Total Attendance          :   <b>{{$totalattendance}}</b></label><br>
                          <label>Absent                    :   <b>{{$absentattendance}}</b></label><br>
                          <label>Attend                    :   <b>{{$attendattendance}}</b></label>
                          <label>Early                    :   <b>{{$earlyattendance}}</b></label><br>
                                  <label>Late                    :   <b>{{$lateattendance}}</b></label><br></td>
                          
                            </tr>

                            <tr>
                                  <td>4</td>
                                  <td>Dependability</td>
                                  <td>
                                  @if ($adminevaluation->dependability==5)
                                  Consistently exhibits drive and willingness to get the job done. Organizes work and sets priorities without 
                            direct supervision in the performance of established job duties.                            
                            @elseif ($adminevaluation->dependability==4)
                            Understands and performs job duties with occasional need for minor corrective supervisory intervention.                            
                            @elseif ($adminevaluation->dependability==3)
                            Frequently requires supervision and direction in the performance of job duties.
                            @elseif ($adminevaluation->dependability==2)
                            Frequently requires supervision and direction in the performance of job duties.
                                  @elseif ($adminevaluation->dependability==1)
                                  Requires extensive supervision and direction in the performance of job duties.                        
                                  @endif
                                  </td>
                                  <td>{{$adminevaluation->dependability}}</td>
                                  <td>
                                      <label>Require Help        :   <b>{{$dependability}}</b></label><br>
                                      <label>Require Help and complete on time       :   <b>{{$dependabilityontime}}</b></label><br>
                                  </td>
                          
                            </tr>
                            <tr>
                                  <td>5</td>
                                  <td>Teamwork</td>
                                  <td>
                                  @if ($adminevaluation->initiative==5)
                                  Able to communicate and coordinate with various parties, 
                            as well as appreciate the opinions and opinions of others consistently
                            @elseif ($adminevaluation->initiative==4)
                            Knows the duties of others related to his duties as well as is willing to learn from others                            
                            @elseif ($adminevaluation->initiative==3)
                            Knows the outline of the task of others in relation to his task and occasionally must be convinced first to adjust his income.
                            @elseif ($adminevaluation->initiative==2)
                            Refuses to accept a joint decision if it is contrary to his opinion and does not know for sure the task
                              others who are in touch with him
                                  @elseif ($adminevaluation->initiative==1)
                                  Absolutely unable to coordinate and communicate with various parties and unable to 
                            appreciate opinions other people                
                                  @endif
                                  </td>
                                  <td>{{$adminevaluation->teamwork}}</td>
                                  <td>Confidential due to employee's privacy</td>
                          
                            </tr>
                            <tr>
                                  <td>6</td>
                                  <td>Initative</td>
                                  <td>
                                  @if ($adminevaluation->initiative==5)
                                  In urgent circumstances, without waiting for instructions or orders from superiors on decisions or take the 
                            necessary actions in the implementation duty, but not against public policy company.
                            @elseif ($adminevaluation->initiative==4)
                            During a precarious situation, consider first the decision to be taken or action what will be done in carrying out the task.                          
                            @elseif ($adminevaluation->initiative==3)
                            Waiting for instructions or orders from superiors in take a decision or action to be taken during urgency.
                            @elseif ($adminevaluation->initiative==2)
                            Panic when the incident to make a decision or
                              take the necessary actions in the implementation task during an urgent situation.
                                  @elseif ($adminevaluation->initiative==1)
                                  Apathetic.              
                                  @endif
                                  </td>
                                  <td>{{$adminevaluation->initiative}}</td>
                                  <td>
                                  <label>Does not any suggestion or supervision based on tasks            : <b>{{$admininitiative}}</b></label><br>
                                  </td>
                          
                            </tr>
                      
                        @endforeach

                        
                      </table>
                  </div>
                  
                </div>
                
              </div>
            </div>
          </div>
        </section>
@elseif($role =="sales")
<div class="main-content">
        <section class="section">
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Evaluation Details</h4>
                    <div class="card-body">
                  </div>        
                  </div>
                  <div class="card-body">
                  <div>
                  @foreach ($salesevaluation as $adminevaluation)
                  <label>Employee Name   :   <b>{{$adminevaluation->name}}</b></label><br>
                  <label>Recorded Date   :   <b>{{$adminevaluation->evaluationdate}}</b></label><br>
                  <label>Remarks         :   <b>{{$adminevaluation->remarks}}</b></label><br>
                  <label>Total Rating    :   <b>{{$adminevaluation->totalrating}}</b></label><br><br>
                  </div>
                      <table class="bordered">
                          <tr>
                              <th>No</th>
                              <th>Indicator</th>
                              <th style="width:40%;">Description</th>
                              <th>Rate</th>
                              <th>Evidence</th>
                          </tr>
                          <tr>
                                  <td>1</td>
                                  <td>Quantity of work</td>
                                  <td>
                                  @if ($adminevaluation->quantityofwork==5)
                                  Total sales are more than RM50,000.
                                  @elseif ($adminevaluation->quantityofwork==4)
                                  Total sales are more than RM40,000.
                                  @elseif ($adminevaluation->quantityofwork==3)
                                  Total sales are more than RM30,000.
                                  @elseif ($adminevaluation->quantityofwork==2)
                                  Total sales are more than RM20,000.
                                  @elseif ($adminevaluation->quantityofwork==1)
                                  Total sales are more than RM10,000.
                                  @endif
                                  </td>
                                  <td>{{$adminevaluation->quantityofwork}}</td>
                                  <td><label>Total sales in these four months      :   <b>RM {{$totalsales}}</b></label></td>
                          
                            </tr>
                            <tr>
                                  <td>2</td>
                                  <td>Communication</td>
                                  <td>
                                  @if ($adminevaluation->communication==5)
                                  Consistently models highly effective behaviors in sharing knowledge and information that propels and teaches others to perform in like manner.                            
                                  @elseif ($adminevaluation->communication==4)
                            Effectively encourages others to share knowledge and information in accordance with roles and responsibilities                   
                            @elseif ($adminevaluation->communication==3)
                            Asks questions and shares knowledge and information to help others clearly understand processes and desired results. 
                            @elseif ($adminevaluation->communication==2)
                            At times is reluctant to question or share knowledge and/or information in timely manner.                        
                                  @elseif ($adminevaluation->communication==1)
                                  Does not ask questions or share knowledge and information to help others clearly understand processes and desired results.                                
                                @endif  
                                </td>
                                  <td>{{$adminevaluation->communication}}</td>
                                  <td>Confidential due to employee's privacy</td>
                          
                            </tr>
                            <tr>
                                  <td>3</td>
                                  <td>Attendance</td>
                                  <td>
                                  @if ($adminevaluation->attendance==5)
                                  Be on time consistently with 0% tardiness                            
                            @elseif ($adminevaluation->attendance==4)
                            Attendance rate ≥ 95%                                  
                            @elseif ($adminevaluation->attendance==3)
                            Attend but sometimes like to come late with the condition of getting permission
                            @elseif ($adminevaluation->attendance==2)
                            Absenteeism rate > 10% and coming late
                        
                                  @elseif ($adminevaluation->attendance==1)
                                  Often comes late and the attendance record is not clear
                                  @endif
                                  </td>
                                  <td>{{$adminevaluation->attendance}}</td>
                                  <td>
                                  <label>Total Attendance          :   <b>{{$totalattendance}}</b></label><br>
                                  <label>Absent                    :   <b>{{$absentattendance}}</b></label><br>
                                  <label>Attend                    :   <b>{{$attendattendance}}</b></label><br>
                                  <label>Early                    :   <b>{{$earlyattendance}}</b></label><br>
                                  <label>Late                    :   <b>{{$lateattendance}}</b></label><br>
                                  </td>
                          
                            </tr>

                            <tr>
                                  <td>4</td>
                                  <td>Planning</td>
                                  <td>
                                  @if ($adminevaluation->planning==5)
                                  Always make a plan before work as well
                              carry out monitoring to ensure the plan is running.                           
                            @elseif ($adminevaluation->planning==4)
                            Make work plans and execute them with good.                          
                            @elseif ($adminevaluation->planning==3)
                            Sometimes not executing work plans with good.
                            @elseif ($adminevaluation->planning==2)
                            Often make plans at work but often times can't be executed properly.
                                  @elseif ($adminevaluation->planning==1)
                                  Working with no plan at all.             
                                  @endif
                                  </td>
                                  <td>{{$adminevaluation->planning}}</td>
                                  <td>
                                  <label>Total Plan               :   <b>{{$totalplan}}</b></label><br>
                                  <label>Total Plan Activities    :   <b>{{$totalplanactivity}}</b></label><br>
                                  <label>Total Plan Completed     :   <b>{{$statusplan}}</b></label><br><br>
                                  </td>
                          
                            </tr>
                            <tr>
                                  <td>5</td>
                                  <td>Teamwork</td>
                                  <td>
                                  @if ($adminevaluation->initiative==5)
                                  Able to communicate and coordinate with various parties, 
                            as well as appreciate the opinions and opinions of others consistently
                            @elseif ($adminevaluation->initiative==4)
                            Knows the duties of others related to his duties as well as is willing to learn from others                            
                            @elseif ($adminevaluation->initiative==3)
                            Knows the outline of the task of others in relation to his task and occasionally must be convinced first to adjust his income.
                            @elseif ($adminevaluation->initiative==2)
                            Refuses to accept a joint decision if it is contrary to his opinion and does not know for sure the task
                              others who are in touch with him
                                  @elseif ($adminevaluation->initiative==1)
                                  Absolutely unable to coordinate and communicate with various parties and unable to 
                            appreciate opinions other people                
                                  @endif
                                  </td>
                                  <td>{{$adminevaluation->teamwork}}</td>
                                  <td>Confidential due to employee's privacy</td>
                          
                            </tr>
                            <tr>
                                  <td>6</td>
                                  <td>Initative</td>
                                  <td>
                                  @if ($adminevaluation->initiative==5)
                                  In urgent circumstances, without waiting for instructions or orders from superiors on decisions or take the 
                            necessary actions in the implementation duty, but not against public policy company.
                            @elseif ($adminevaluation->initiative==4)
                            During a precarious situation, consider first the decision to be taken or action what will be done in carrying out the task.                          
                            @elseif ($adminevaluation->initiative==3)
                            Waiting for instructions or orders from superiors in take a decision or action to be taken during urgency.
                            @elseif ($adminevaluation->initiative==2)
                            Panic when the incident to make a decision or
                              take the necessary actions in the implementation task during an urgent situation.
                                  @elseif ($adminevaluation->initiative==1)
                                  Apathetic.              
                                  @endif
                                  </td>
                                  <td>{{$adminevaluation->initiative}}</td>
                                  <td><label>Total Plan: <b>{{$totalplan}}</b></label><br>
                                      <label>Suggestion: <b>{{$salesinitiative}}</b></label><br></td>
                          
                            </tr>
                         
                        @endforeach

                        
                      </table>
                  </div>
                  
                </div>
                
              </div>
@endif
</body>
</html>
