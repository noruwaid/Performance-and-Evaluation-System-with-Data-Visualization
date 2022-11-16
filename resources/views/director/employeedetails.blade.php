
@include ('partials.head')
@include ('partials.navbar')
@include ('partials.sidebar')
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#">{{ $users->name }}</a>
                      </div>
                      <div class="author-box-job">{{ $users->jobdescription }}</div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-left">
                          Birthday
                        </span>
                        <span class="float-right text-muted">
                        {{ $users->dob }}
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                          +60-{{ $users->phoneno }}
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                        {{ $users->email }}
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Department
                        </span>
                        <span class="float-right text-muted">
                        {{ $users->role }}
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Age
                        </span>
                        <span class="float-right text-muted">
                        {{ $users->employeeage() }}
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
                </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                <div class="card-body">
                    <div class="author-box-center">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <center><a href="">{{ $users->name }}</a></center>
                      </div>
                      <center> <div class="author-box-job">{{ $users->jobdescription }}</div></center>
                    </div>
                </div>
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="false">Performance Visualization</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="row">
                          <div class="col-md-3 col-6 b-r">
                            <strong>IC Number</strong>
                            <br>
                            <p class="text-muted">{{ $users->ic }}</p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Salary</strong>
                            <br>
                            <p class="text-muted">RM {{ $users->salary }}</p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Start Date</strong>
                            <br>
                            <p class="text-muted">{{ $users->startdate }}</p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Duration</strong>
                            <br>
                            <p class="text-muted">{{ $users->employeeduration() }}</p>
                          </div>
                        </div>
                        <div class="section-title">Education</div>
                        <ul>
                          <li>{{ $users->education }}</li>
                        </ul>
                        <div class="section-title">Address</div>
                        <ul>
                          <li>{{ $users->address }}</li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                          <div class="card-header">
                            <h4>Task Completion Over Time (12 Month)</h4>
                          </div>
                          <div >
                            @if(( $users->role ) == "administrator")
                              <div class="card-body">
                                <div class="recent-report__chart">
                                  <div id="chart1"></div>
                                </div>
                              </div>
                            @else
                              <div class="card-body">
                                <div class="recent-report__chart">
                                  <div id="chart6"></div>
                                </div>
                              </div>
                            @endif
                          </div>
                        </div>    
                    </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
@include ('partials.footer')
@include ('partials.javascript')
<script>
function chart1() {
  var monthname = <?php echo json_encode($MonthName); ?>;
  var completed = <?php echo json_encode($completiondata); ?>;
  var ontime = <?php echo json_encode($ontime); ?>;
  var late = <?php echo json_encode($late); ?>;

    var options = {
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                horizontal: false,
                endingShape: 'rounded',
                columnWidth: '55%',
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'On-Time',
            data: ontime
        }, {
            name: 'Late',
            data: late
        }, {
            name: 'Completed',
            data: completed
        }],
        xaxis: {
            categories: monthname,
            labels: {
                style: {
                    colors: '#9aa0ac',
                }
            }
        },
        yaxis: {
            title: {
                text: '$ (thousands)'
            },
            labels: {
                style: {
                    color: '#9aa0ac',
                }
            }
        },
        fill: {
            opacity: 1

        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + "task(s)"
                }
            }
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#chart1"),
        options
    );

    chart.render();


}

function chart6() {
  var salesmonth = <?php echo json_encode($salesmonth); ?>;
  var sales = <?php echo json_encode($sales); ?>;

    var options = {
        chart: {
            height: 350,
            type: 'area',
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        series: [{
            name: 'Total Sales',
            data: sales
        }], 

        xaxis: {
            type: 'month',
            categories: salesmonth,
            labels: {
                style: {
                    colors: '#9aa0ac',
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    color: '#9aa0ac',
                }
            }

        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#chart6"),
        options
    );

    chart.render();
}
</script>