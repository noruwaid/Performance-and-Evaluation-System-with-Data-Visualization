
@include ('partials.head')
@include ('partials.navbar')
@include ('partials.sidebar')
@if($role =="administrator")
<div class="main-content">
        <section class="section">
          <div class="section-body">              
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Employee Evaluation</h4>
                  </div>
                  <div class="card-body">
                    <form id="wizard_with_validation" method="POST" action="{{ route('evaluation/store')}}">
                    @csrf
                      <input type="hidden" name="userperformanceid" value="{{ $id }}">
                      <input type="hidden" name="role" value="{{$role}}">
                      <h3>Quality of <br>Work</h3>
                      <fieldset>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <h3>Performance Indicator</h3>
                            <label>Total Task       :   <b>{{$totaltask}}</b></label><br>
                            <label>On-Time Task     :   <b>{{$ontimetask}}</b></label><br>
                            <label>Late Submission Task     :   <b>{{$latesubmissiontask}}</b></label><br>

                            <label class="form-label">Quality of Work*</label>
                            <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th class="text-center pt-2">1 <br>Unacceptable</th>
                          <th class="text-center pt-2">2 <br>Weak</th>
                          <th class="text-center pt-2">3 <br>Fair</th>
                          <th class="text-center pt-2">4 <br>Good</th>
                          <th class="text-center pt-2">5 <br>Excellent</th>
                        </tr>
                        <tr>
                          <td>Quality of Work</td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="qualityofwork" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="qualityofwork" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="qualityofwork">
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="qualityofwork" >
                          </td>
                          <td class="text-center pt-2">                      
                              <input class="form-check-input" type="checkbox" value="5" id="defaultCheck2"  name="qualityofwork">
                          </td>
                        </tr>
                        </table>                          </div>
                          <br>
                          <br>
                          
                          <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Weight (%)</th>
                          <th>Rating</th>
                          <th>Description</th>
                        </tr>
                        <tr>
                          <td rowspan="5">Quality of Work</td>
                          <td rowspan="5">15</td>
                          <td>5</td>
                          <td>Always carry out assigned tasks, and complete tasks on time and 
                            results in accordance with instructions leader
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Always doing the assigned task and completing the task on time sometimes makes mistakes</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Performs assigned tasks even if late and less accurate with what is instructed
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Work on tasks but are often late and many mistakes occur
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Often does not do assigned tasks
                          </td>
                        </tr>
                        </table>
                        </div>
                      </fieldset>
                      <h3>Quantity of Work</h3>
                      <fieldset>
                      <div class="form-group form-float">
                          <div class="form-line">
                          <h5><u>Performance Indicator</u></h5>                          <label>Total task in these four months       :   <b>{{$totaltask}}</b></label><br><br>
                            <label class="form-label">Quantity of Work*</label>
                            <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th class="text-center pt-2">1 <br>Unacceptable</th>
                          <th class="text-center pt-2">2 <br>Weak</th>
                          <th class="text-center pt-2">3 <br>Fair</th>
                          <th class="text-center pt-2">4 <br>Good</th>
                          <th class="text-center pt-2">5 <br>Excellent</th>
                        </tr>
                        <tr>
                          <td>Quantity of Work</td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="quantityofwork" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="quantityofwork" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="quantityofwork">
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="quantityofwork" >
                          </td>
                          <td class="text-center pt-2">                      
                              <input class="form-check-input" type="checkbox" value="5" id="defaultCheck2"  name="quantityofwork">
                          </td>
                        </tr>
                        </table> 
                         </div>
                          <br>
                          <br>
                          
                          <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Weight (%)</th>
                          <th>Rating</th>
                          <th>Description</th>
                        </tr>
                        <tr>
                          <td rowspan="5">Quantity of Work</td>
                          <td rowspan="5">50</td>
                          <td>5</td>
                          <td>Total tasks are more than 100.
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Total tasks are more than 85.</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Total tasks are more than 50.
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Total tasks are more than 30.
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Total tasks are more than 10.
                          </td>
                        </tr>
                        </table>
                        </div>
                      </fieldset>
                      <h3>Teamwork<br> </h3>
                      <fieldset>
                      <div class="form-group form-float">
                          <div class="form-line">
                          <h3>Performance Indicator</h3>
                          <label class="form-label">Self-evaluation's rating             : {{$employeeownteamwork}}</label><br>
                            @foreach($employeerateteamwork as $index => $rate)
                            <label class="form-label">Employee {{$index+1}}'s rate this employee    : {{$rate->rating}}</label><br>
                            @endforeach
                            <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Colleague</th>
                          <th class="text-center pt-2">1 <br>Unacceptable</th>
                          <th class="text-center pt-2">2 <br>Weak</th>
                          <th class="text-center pt-2">3 <br>Fair</th>
                          <th class="text-center pt-2">4 <br>Good</th>
                          <th class="text-center pt-2">5 <br>Excellent</th>
                        </tr>
                        <tr>
                          <td rowspan="2"> Teamwork</td>
                          <td>Sara</td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="teamwork" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="teamwork" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="teamwork">
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="teamwork" >
                          </td>
                          <td class="text-center pt-2">                      
                              <input class="form-check-input" type="checkbox" value="5" id="defaultCheck2"  name="teamwork">
                          </td>
                        </tr>
                        </table> 
                         </div>
                          <br>
                          <br>
                          
                          <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Weight (%)</th>
                          <th>Rating</th>
                          <th>Description</th>
                        </tr>
                        <tr>
                          <td rowspan="5">Teamwork</td>
                          <td rowspan="5">5</td>
                          <td>5</td>
                          <td>Able to communicate and coordinate with various parties, 
                            as well as appreciate the opinions and opinions of others consistently
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Knows the duties of others related to his duties as well as is willing to learn from others</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Knows the outline of the task of others in relation to his task and occasionally must be convinced first to adjust his income.
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Refuses to accept a joint decision if it is contrary to his opinion and does not know for sure the task
                              others who are in touch with him
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Absolutely unable to coordinate and communicate with various parties and unable to 
                            appreciate opinions other people

                          </td>
                        </tr>
                        </table>
                        </div>
                      </fieldset>
                      <h3>Dependability<br> </h3>
                      <fieldset>
                      <div class="form-group form-float">
                          <div class="form-line">
                          <h5><u>Performance Indicator</u></h5>                          <label>Total Task          :   <b>{{$totaltask}}</b></label><br>
                          <label>Require Help        :   <b>{{$dependability}}</b></label><br>
                          <label>Require Help and complete on time       :   <b>{{$dependabilityontime}}</b></label><br><br>

                            <label class="form-label">Dependability*</label>
                            <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th class="text-center pt-2">1 <br>Unacceptable</th>
                          <th class="text-center pt-2">2 <br>Weak</th>
                          <th class="text-center pt-2">3 <br>Fair</th>
                          <th class="text-center pt-2">4 <br>Good</th>
                          <th class="text-center pt-2">5 <br>Excellent</th>
                        </tr>
                        <tr>
                          <td>Dependability</td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="dependability" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="dependability" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="dependability">
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="dependability" >
                          </td>
                          <td class="text-center pt-2">                      
                              <input class="form-check-input" type="checkbox" value="5" id="defaultCheck2"  name="dependability">
                          </td>
                        </tr>
                        </table> 
                         </div>
                          <br>
                          <br>
                          
                          <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Weight (%)</th>
                          <th>Rating</th>
                          <th>Description</th>
                        </tr>
                        <tr>
                          <td rowspan="5">Dependability</td>
                          <td rowspan="5">10</td>
                          <td>5</td>
                          <td>Consistently exhibits drive and willingness to get the job done. Organizes work and sets priorities without 
                            direct supervision in the performance of established job duties.
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Requires minimal direct supervision in the performance and of job duties and exhibits self‐ direction.</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Understands and performs job duties with occasional need for minor corrective supervisory intervention.
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Frequently requires supervision and direction in the performance of job duties.
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Requires extensive supervision and direction in the performance of job duties.
                          </td>
                        </tr>
                        </table>
                        </div>
                      </fieldset>
                      <h3>Attendance<br> </h3>
                      <fieldset>
                      <div class="form-group form-float">
                          <div class="form-line">
                          <h5><u>Performance Indicator</u></h5>                          <label>Total Attendance          :   <b>{{$totalattendance}}</b></label><br>
                          <label>Absent                    :   <b>{{$absentattendance}}</b></label><br>
                          <label>Attend                    :   <b>{{$attendattendance}}</b></label><br>
                          <label>Early                    :   <b>{{$earlyattendance}}</b></label><br>
                          <label>Late                    :   <b>{{$lateattendance}}</b></label><br><br>
                            <label class="form-label">Attendance*</label>
                            <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th class="text-center pt-2">1 <br>Unacceptable</th>
                          <th class="text-center pt-2">2 <br>Weak</th>
                          <th class="text-center pt-2">3 <br>Fair</th>
                          <th class="text-center pt-2">4 <br>Good</th>
                          <th class="text-center pt-2">5 <br>Excellent</th>
                        </tr>
                        <tr>
                          <td>Attendance</td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="attendance" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="attendance" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="attendance">
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="attendance" >
                          </td>
                          <td class="text-center pt-2">                      
                              <input class="form-check-input" type="checkbox" value="5" id="defaultCheck2"  name="attendance">
                          </td>
                        </tr>
                        </table> 
                         </div>
                          <br>
                          <br>
                          
                          <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Weight (%)</th>
                          <th>Rating</th>
                          <th>Description</th>
                        </tr>
                        <tr>
                          <td rowspan="5">Attendance</td>
                          <td rowspan="5">15</td>
                          <td>5</td>
                          <td>Be on time consistently with 0% tardiness</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Attendance rate ≥ 95%</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Attend but sometimes like to come late with the condition of getting permission
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Absenteeism rate > 10% and coming late
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Often comes late and the attendance record is not clear
                          </td>
                        </tr>
                        </table>
                        </div>
                      </fieldset>
                      <h3>Initiative<br> </h3>
                      <fieldset>
                      <div class="form-group form-float">
                          <div class="form-line">
                          <h5><u>Performance Indicator</u></h5>                          <label>Total tasks that have been completed since four months           : <b>{{$totaltask}}</b></label><br>
                          <label>Does not any suggestion or supervision based on tasks            : <b>{{$admininitiative}}</b></label><br><br>
                            <label class="form-label">Initiative*</label>
                            <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th class="text-center pt-2">1 <br>Unacceptable</th>
                          <th class="text-center pt-2">2 <br>Weak</th>
                          <th class="text-center pt-2">3 <br>Fair</th>
                          <th class="text-center pt-2">4 <br>Good</th>
                          <th class="text-center pt-2">5 <br>Excellent</th>
                        </tr>
                        <tr>
                          <td>Initiative</td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="initiative" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="initiative" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="initiative">
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="initiative" >
                          </td>
                          <td class="text-center pt-2">                      
                              <input class="form-check-input" type="checkbox" value="5" id="defaultCheck2"  name="initiative">
                          </td>
                        </tr>
                        </table> 
                         </div>
                          <br>
                          <br>
                          
                          <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Weight (%)</th>
                          <th>Rating</th>
                          <th>Description</th>
                        </tr>
                        <tr>
                          <td rowspan="5">Iniatiative</td>
                          <td rowspan="5">5</td>
                          <td>5</td>
                          <td>In urgent circumstances, without waiting for instructions or orders from superiors on decisions or take the 
                            necessary actions in the implementation duty, but not against public policy company.
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>During a precarious situation, consider first the decision to be taken or action what will be done in carrying out the task.</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Waiting for instructions or orders from superiors in take a decision or action to be taken during urgency.
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Panic when the incident to make a decision or
                              take the necessary actions in the implementation task during an urgent situation.
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Apathetic.
                          </td>
                        </tr>
                        </table>
                        </div>
                      </fieldset>
                      <h3>Remarks</h3>
                      <fieldset>
                        <div class="form-group form-float">
                          <div class="form-line">
                          <h5><u>Performance Indicator</u></h5>                          <label>Remarks : <b>{{$adminremarks}}</b></label><br><br>
                            <label class="form-label">Remarks*</label>
                            <input type="text" class="form-control" name="remarks" required>
                          </div><br><br>
                          <button style="align:right" type="submit" onClick="return confirm('Are you sure to submit? Once you have submitted, you may not be able to review or update the form.');" class="btn btn-success">Submit</button>

                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
@elseif ($role == "sales")
<div class="main-content">
        <section class="section">
          <div class="section-body">              
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Performance</h4>
                  </div>
                  <div class="card-body">
                    <form id="wizard_with_validation" method="POST" action="{{ route('evaluation/store')}}">
                    @csrf
                    <input type="hidden" name="userperformanceid" value="{{ $id }}">
                      <input type="hidden" name="role" value="{{$role}}">
                      <h3>Planning</h3>
                      <fieldset>
                        <div class="form-group form-float">
                          <div class="form-line">
                          <h5><u>Performance Indicator</u></h5>                            <label>Total Plan               :   <b>{{$totalplan}}</b></label><br>
                            <label>Total Plan Activities    :   <b>{{$totalplanactivity}}</b></label><br>
                            <label>Total Plan Completed     :   <b>{{$statusplan}}</b></label><br><br>

                            <label class="form-label">Quality of Work*</label>
                            <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th class="text-center pt-2">1 <br>Unacceptable</th>
                          <th class="text-center pt-2">2 <br>Weak</th>
                          <th class="text-center pt-2">3 <br>Fair</th>
                          <th class="text-center pt-2">4 <br>Good</th>
                          <th class="text-center pt-2">5 <br>Excellent</th>
                        </tr>
                        <tr>
                          <td>Planning</td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="planning" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="planning" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="planning">
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="planning" >
                          </td>
                          <td class="text-center pt-2">                      
                              <input class="form-check-input" type="checkbox" value="5" id="defaultCheck2"  name="planning">
                          </td>
                        </tr>
                        </table>                          </div>
                          <br>
                          <br>
                          
                          <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Weight (%)</th>
                          <th>Rating</th>
                          <th>Description</th>
                        </tr>
                        <tr>
                          <td rowspan="5">Planning</td>
                          <td rowspan="5">15</td>
                          <td>5</td>
                          <td>Always make a plan before work as well
                              carry out monitoring to ensure the plan is running.

                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Make work plans and execute them with good.
                        </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Sometimes not executing work plans with good.

                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Often make plans at work but often times can't be executed properly.

                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Working with no plan at all.

                          </td>
                        </tr>
                        </table>
                        </div>
                      </fieldset>
                      <h3>Quantity of Work</h3>
                      <fieldset>
                      <div class="form-group form-float">
                          <div class="form-line">
                          <h5><u>Performance Indicator</u></h5>                          <label>Total sales in these four months      :   <b>RM {{$totalsales}}</b></label><br><br>
                            <label class="form-label">Quantity of Work*</label>
                            <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th class="text-center pt-2">1 <br>Unacceptable</th>
                          <th class="text-center pt-2">2 <br>Weak</th>
                          <th class="text-center pt-2">3 <br>Fair</th>
                          <th class="text-center pt-2">4 <br>Good</th>
                          <th class="text-center pt-2">5 <br>Excellent</th>
                        </tr>
                        <tr>
                          <td>Quantity of Work</td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="quantityofwork" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="quantityofwork" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="quantityofwork">
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="quantityofwork" >
                          </td>
                          <td class="text-center pt-2">                      
                              <input class="form-check-input" type="checkbox" value="5" id="defaultCheck2"  name="quantityofwork">
                          </td>
                        </tr>
                        </table> 
                         </div>
                          <br>
                          <br>
                          
                          <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Weight (%)</th>
                          <th>Rating</th>
                          <th>Description</th>
                        </tr>
                        <tr>
                          <td rowspan="5">Quantity of Work</td>
                          <td rowspan="5">50</td>
                          <td>5</td>
                          <td>Total sales are more than RM50,000.
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Total sales are more than RM40,000.</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Total sales are more than RM30,000.
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Total sales are more than RM20,000.
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Total sales are more than RM10,000.
                          </td>
                        </tr>
                        </table>
                        </div>
                      </fieldset>
                      <h3>Teamwork<br> </h3>
                      <fieldset>
                      <div class="form-group form-float">
                          <div class="form-line">
                          <h5><u>Performance Indicator</u></h5>                          <label class="form-label">Self-evaluation's rating                         : {{$employeeownteamwork}}</label><br>
                            @foreach($employeerateteamwork as $index => $rate)  
                            <label class="form-label">Employee {{$index+1}}'s rate this employee     : {{$rate->rating}}</label><br>
                            @endforeach
                            <br><br><table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Colleague</th>
                          <th class="text-center pt-2">1 <br>Unacceptable</th>
                          <th class="text-center pt-2">2 <br>Weak</th>
                          <th class="text-center pt-2">3 <br>Fair</th>
                          <th class="text-center pt-2">4 <br>Good</th>
                          <th class="text-center pt-2">5 <br>Excellent</th>
                        </tr>
                        <tr>
                          <td rowspan="2"> Teamwork</td>
                          <td>Sara</td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="teamwork" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="teamwork" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="teamwork">
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="teamwork" >
                          </td>
                          <td class="text-center pt-2">                      
                              <input class="form-check-input" type="checkbox" value="5" id="defaultCheck2"  name="teamwork">
                          </td>
                        </tr>
                        </table> 
                         </div>
                          <br>
                          <br>
                          
                          <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Weight (%)</th>
                          <th>Rating</th>
                          <th>Description</th>
                        </tr>
                        <tr>
                          <td rowspan="5">Teamwork</td>
                          <td rowspan="5">5</td>
                          <td>5</td>
                          <td>Able to communicate and coordinate with various parties, 
                            as well as appreciate the opinions and opinions of others consistently
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Knows the duties of others related to his duties as well as is willing to learn from others</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Knows the outline of the task of others in relation to his task and occasionally must be convinced first to adjust his income.
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Refuses to accept a joint decision if it is contrary to his opinion and does not know for sure the task
                              others who are in touch with him
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Absolutely unable to coordinate and communicate with various parties and unable to 
                            appreciate opinions other people

                          </td>
                        </tr>
                        </table>
                        </div>
                      </fieldset>
                      <h3>Communication<br> </h3>
                      <fieldset>
                      <div class="form-group form-float">
                          <div class="form-line">
                          <h5><u>Performance Indicator</u></h5>                          <label>Self-evaluation's rating         :   <b>{{$employeeowncommunication}}</b></label><br>
                          @foreach($employeeratecommunication as $index => $rate)
                            <label class="form-label">Employee {{$index+1}}'s rate this employee     : {{$rate->rating}}</label><br>
                          @endforeach
                            <label class="form-label">Communication*</label>
                            <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th class="text-center pt-2">1 <br>Unacceptable</th>
                          <th class="text-center pt-2">2 <br>Weak</th>
                          <th class="text-center pt-2">3 <br>Fair</th>
                          <th class="text-center pt-2">4 <br>Good</th>
                          <th class="text-center pt-2">5 <br>Excellent</th>
                        </tr>
                        <tr>
                          <td>Communication</td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="communication" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="communication" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="communication">
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="communication" >
                          </td>
                          <td class="text-center pt-2">                      
                              <input class="form-check-input" type="checkbox" value="5" id="defaultCheck2"  name="communication">
                          </td>
                        </tr>
                        </table> 
                         </div>
                          <br>
                          <br>
                          
                          <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Weight (%)</th>
                          <th>Rating</th>
                          <th>Description</th>
                        </tr>
                        <tr>
                          <td rowspan="5">Communication</td>
                          <td rowspan="5">10</td>
                          <td>5</td>
                          <td>
                            Consistently models highly effective behaviors in sharing knowledge and information that propels and teaches others to perform in like manner.                            

                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Effectively encourages others to share knowledge and information in accordance with roles and responsibilities</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Asks questions and shares knowledge and information to help others clearly understand processes and desired results.
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>At times is reluctant to question or share knowledge and/or information in timely manner.
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Does not ask questions or share knowledge and information to help others clearly understand processes and desired results. 
                          </td>
                        </tr>
                        </table>
                        </div>
                      </fieldset>
                      <h3>Attendance<br> </h3>
                      <fieldset>
                      <div class="form-group form-float">
                          <div class="form-line">
                          <h5><u>Performance Indicator</u></h5>                          <label>Total Attendance          :   <b>{{$totalattendance}}</b></label><br>
                          <label>Absent                    :   <b>{{$absentattendance}}</b></label><br>
                          <label>Attend                    :   <b>{{$attendattendance}}</b></label><br>
                          <label>Early                    :   <b>{{$earlyattendance}}</b></label><br>
                          <label>Late                    :   <b>{{$lateattendance}}</b></label><br><br>
                            <label class="form-label">Attendance*</label>
                            <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th class="text-center pt-2">1 <br>Unacceptable</th>
                          <th class="text-center pt-2">2 <br>Weak</th>
                          <th class="text-center pt-2">3 <br>Fair</th>
                          <th class="text-center pt-2">4 <br>Good</th>
                          <th class="text-center pt-2">5 <br>Excellent</th>
                        </tr>
                        <tr>
                          <td>Attendance</td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="attendance" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="attendance" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="attendance">
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="attendance" >
                          </td>
                          <td class="text-center pt-2">                      
                              <input class="form-check-input" type="checkbox" value="5" id="defaultCheck2"  name="attendance">
                          </td>
                        </tr>
                        </table> 
                         </div>
                          <br>
                          <br>
                          
                          <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Weight (%)</th>
                          <th>Rating</th>
                          <th>Description</th>
                        </tr>
                        <tr>
                          <td rowspan="5">Attendance</td>
                          <td rowspan="5">15</td>
                          <td>5</td>
                          <td>Be on time consistently with 0% tardiness</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Attendance rate ≥ 95%</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Attend but sometimes like to come late with the condition of getting permission
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Absenteeism rate > 10% and coming late
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Often comes late and the attendance record is not clear
                          </td>
                        </tr>
                        </table>
                        </div>
                      </fieldset>
                      <h3>Initiative<br> </h3>
                      <fieldset>
                      <div class="form-group form-float">
                          <div class="form-line">
                          <h5><u>Performance Indicator</u></h5>                          <label>Total Plan: <b>{{$totalplan}}</b></label><br><br>
                          <label>Total suggestion based on plan: <b>{{$salesinitiative}}</b></label><br><br>
                            <label class="form-label">Initiative*</label>
                            <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th class="text-center pt-2">1 <br>Unacceptable</th>
                          <th class="text-center pt-2">2 <br>Weak</th>
                          <th class="text-center pt-2">3 <br>Fair</th>
                          <th class="text-center pt-2">4 <br>Good</th>
                          <th class="text-center pt-2">5 <br>Excellent</th>
                        </tr>
                        <tr>
                          <td>Initiative</td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="initiative" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="initiative" >
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="3" id="defaultCheck2" name="initiative">
                          </td>
                          <td class="text-center pt-2">
                            <input class="form-check-input" type="checkbox" value="4" id="defaultCheck2" name="initiative" >
                          </td>
                          <td class="text-center pt-2">                      
                              <input class="form-check-input" type="checkbox" value="5" id="defaultCheck2"  name="initiative">
                          </td>
                        </tr>
                        </table> 
                         </div>
                          <br>
                          <br>
                          
                          <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Weight (%)</th>
                          <th>Rating</th>
                          <th>Description</th>
                        </tr>
                        <tr>
                          <td rowspan="5">Iniatiative</td>
                          <td rowspan="5">5</td>
                          <td>5</td>
                          <td>In urgent circumstances, without waiting for instructions or orders from superiors on decisions or take the 
                            necessary actions in the implementation duty, but not against public policy company.
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>During a precarious situation, consider first the decision to be taken or action what will be done in carrying out the task.</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Waiting for instructions or orders from superiors in take a decision or action to be taken during urgency.
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Panic when the incident to make a decision or
                              take the necessary actions in the implementation task during an urgent situation.
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Apathetic.
                          </td>
                        </tr>
                        </table>
                        </div>
                      </fieldset>
                      <h3>Remarks</h3>
                      <fieldset>
                        <div class="form-group form-float">
                          <div class="form-line">
                          <h5><u>Performance Indicator</u></h5>                          <label>Remarks : <b>{{$adminremarks}}</b></label><br><br>
                            <label class="form-label">Remarks*</label>
                            <input type="text" class="form-control" name="remarks" required>
                          </div>
                          <br><br><button style="align:right" type="submit" onClick="return confirm('Are you sure to submit? Once you have submitted, you may not be able to review or update the form.');" class="btn btn-success">Submit</button>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
@endif
@include ('partials.footer')
@include ('partials.javascript')
<script>
 
 jQuery(function($) {
  var requiredCheckboxes = $(':checkbox[required]');
  requiredCheckboxes.on('change', function(e) {
    var checkboxGroup = requiredCheckboxes.filter('[name="' + $(this).attr('name') + '"]');
    var isChecked = checkboxGroup.is(':checked');
    checkboxGroup.prop('required', !isChecked);
  });
  requiredCheckboxes.trigger('change');
});

 $(function() {
    $("input:checkbox").on('click', function() {
      // in the handler, 'this' refers to the box clicked on
      var $box = $(this);
      if ($box.is(":checked")) {
        // the name of the box is retrieved using the .attr() method
        // as it is assumed and expected to be immutable
        var group = "input:checkbox[name='" + $box.attr("name") + "']";
        // the checked state of the group/box on the other hand will change
        // and the current value is retrieved using .prop() method
        $(group).prop("checked", false);
        $box.prop("checked", true);
      } else {
        $box.prop("checked", false);
      }
    });
  });

</script>