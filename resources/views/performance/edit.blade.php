@include ('partials.head')
@include ('partials.navbar')
@include ('partials.sidebar')
@if(Auth::User()->role=="administrator")
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header">
                  <h4>Evaluate Your Colleague's Performance</h4>
                  </div>
                  <div class="card-body">
                  <p>Evaluate your colleague's performance in the past four months.
                    This is highly confidential, you may rate your colleague sincerely.
                  </p>
                    <div id="wizard_vertical">
                      <h2>Teamwork</h2>
                      <section>
                      <div class="form-group form-float">
                          <div class="form-line">
                            <label class="form-label">Teamwork*</label>
                            @foreach ($administrator as $index => $administrator)
                            <form method="POST" action="{{ route('performance/update',$administrator->id)}}">
                            @csrf
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
                          <td>teamwork</td>
                          <td>{{$administrator->name}}</td>
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
                        <button style="align:right" type="submit" onClick="return confirm('Are you sure to submit? Once you have submitted, you may not be able to review or update the form.');" class="btn btn-success">Submit</button>

                        @endforeach
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
                      </section>
                      
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
@elseif(Auth::User()->role =="sales")
<div class="main-content">
        <section class="section">
        @foreach ($sales as $index => $sales)
                  <form method="POST" action="{{ route('performance/update',$sales->id)}}">
                            @csrf
          <div class="section-body">
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header">
                 
                  <h4>Evaluate Your Colleague's Performance</h4>
                  </div>
                  <div class="card-body">
                  <p>Evaluate your colleague's performance in the past four months.
                    This is highly confidential, you may rate your colleague sincerely.
                  </p>
                    <div id="wizard_vertical">
                    
                      <h2>Teamwork</h2>
                      
                      <section>
                      
                      <div class="form-group form-float">
                          <div class="form-line">
                            <label class="form-label">Teamwork*</label>
                            
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
                          <td>teamwork</td>
                          <td>{{$sales->name}}</td>
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
                      </section>
                      <h2>Communication</h2>
                      <section>
                      <div class="form-group form-float">
                          <div class="form-line">
                            <label class="form-label">Communication* Evaluate the sales employees' communication</label>
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
                          <td> Communication</td>
                          <td>{{$sales->name}}</td>
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
                         <button style="align:right" type="submit" onClick="return confirm('Are you sure to submit? Once you have submitted, you may not be able to review or update the form.');" class="btn btn-success">Submit</button>

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
                      </section>
                    </div></div>
                      
                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>
                  @endforeach
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