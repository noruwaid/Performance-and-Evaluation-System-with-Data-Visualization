@include ('partials.head')
@include ('partials.navbar')
@include ('partials.sidebar')

<div class="main-content">
        <section class="section">
          <div class="section-body">
           
            <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">Administrator Evaluation Rubric</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="false">Sales Employee Evaluation Rubric</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                      <h6>Administrator Evaluation Rubric</h6>
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Weight (%)</th>
                          <th width="10%">Rating</th>
                          <th>Description</th>
                        </tr>
                        <tr>
                          <td rowspan="5"> Attendance</td>
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

                        <tr>
                          <td rowspan="5">Quality Of Work</td>
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


                        <tr>
                          <td rowspan="5">Initiative</td>
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
                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                    <h6>Sales Employee Evaluation Rubric</h6>
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>Indicator</th>
                          <th>Weight (%)</th>
                          <th width="10%">Rating</th>
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
                          <td>Total sales are more than RM10,00.
                          </td>
                        </tr>


                        <tr>
                          <td rowspan="5">Initiative</td>
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
            </div> 
          </div>
</section>
      


@include ('partials.footer')
@include ('partials.javascript')
