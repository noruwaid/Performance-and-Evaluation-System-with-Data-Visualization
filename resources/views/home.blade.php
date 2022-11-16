@include ('partials.head')
@include ('partials.navbar')
@include ('partials.sidebar')
@if(Auth::User()->role == 'administrator')
<div class="main-content">
        <section class="section">
          @if(Auth::User()->role!='sales')
        <div class="row ">
        @if(session('success'))
                  <div class="alert alert-success">
                    {{session('success')}}
                  </div>
                  @endif
            </p>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">{{ $completedtask->count() }}</h5>
                          <p class="mb-0"><span class="col-green">Completed Task</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{ asset('/img/banner/1.png') }}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> {{ $incompleted->count() }}</h5>
                          <p class="mb-0"><span class="col-green">Incompleted Task</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{ asset('/img/banner/2.png') }}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">{{ $inprogress->count() }}</h5>
                          <p class="mb-0"><span class="col-green">In Progress Task</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{ asset('/img/banner/3.png') }}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">{{ $total->count() }}</h5>
                          <p class="mb-0"><span class="col-green">Total Tasks</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{ asset('/img/banner/4.png') }}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif
          <div class="section-body">
           
            <div class="row clearfix">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                  <div class="padding-20">
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                      <div >
                  <div class="card-header">
                    <h4>Task completion over time (12 Months)</h4>
                  </div>
                  <div class="card-body">
                    <div class="recent-report__chart">
                      <div id="chart1"></div>
                    </div>
                  </div>
                  <div class="card-header">
                          <h4>Total Sales Over Time</h4>
                        </div>
                        <div class="card-body">
                        <div class="recent-report__chart">
                          <div id="chart6"></div>
                        </div>
                      </div>
                  </div>
                      
                  </div>
                </div>
            </div>
          
          </div>
        </section>
        
      </div>
@elseif(Auth::User()->role == 'director')
<div class="main-content">
        <section class="section">
          @if(Auth::User()->role!='sales')
        <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">{{ $completedtask->count() }}</h5>
                          <p class="mb-0"><span class="col-green">Completed Task</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{ asset('/img/banner/1.png') }}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> {{ $incompleted->count() }}</h5>
                          <p class="mb-0"><span class="col-green">Incompleted Task</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{ asset('/img/banner/2.png') }}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">{{ $inprogress->count() }}</h5>
                          <p class="mb-0"><span class="col-green">In Progress Task</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{ asset('/img/banner/3.png') }}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">{{ $total->count() }}</h5>
                          <p class="mb-0"><span class="col-green">Total Tasks</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{ asset('/img/banner/4.png') }}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif
          <div class="section-body">
           
            <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">Task Summary</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="false">Sales Summary</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="row">
                          <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 col-6">
                              <div class="card-header">
                                <h4>Administrator</h4>
                              </div>
                              <div class="card-body">
                                <div class="recent-report__chart">
                                  <div id="chart1"></div>
                                </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 col-6">
                            <div class="card-header">
                              <h4>Summary</h4>
                            </div>
                            <div class="card-body">
                              <div class="recent-report__chart">
                                <div id="chart7"></div>
                              </div>
                            </div>
                        </div>
                        
                        </div>
                        <div>
                          <div class="card-header">
                            <h4>Task completion over time (12 Months)</h4>
                          </div>
                          <div class="card-body">
                            <div class="recent-report__chart">
                              <div id="chart3"></div>
                          </div> 
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                        <div class="card-header">
                          <h4>Total sales Over Time</h4>
                        </div>
                        <div class="card-body">
                        <div class="recent-report__chart">
                          <div id="chart6"></div>
                        </div>
                      </div>
                      <div class="card-header">
                          <h4>Total Sales Based on Employees</h4>
                        </div>
                      <div class="card-body">
                          <div class="recent-report__chart">
                              <div id="chart2"></div>
                          </div>
                      </div>
                      </div>    
                  </div>       
            </div> 
          </div>
</section>
      

     
@elseif(Auth::User()->role == 'sales')
<div class="main-content">
          <div class="section-body">
           
            <div class="row clearfix">
            @if(session('success'))
                  <div class="alert alert-success">
                    {{session('success')}}
                  </div>
                  @endif
            </p>
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                  <div class="padding-20">
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                      <div >
                  <div class="card-header">
                    <h4>Your sales over month</h4>
                  </div>
                  <div class="card-body">
                    <div class="recent-report__chart">
                      <div id="chart6"></div>
                    </div>
                  </div>
                  <div class="card-header">
                          <h4>Total Sales Over Time</h4>
                        </div>
                      <div class="card-body">
                          <div class="recent-report__chart">
                              <div id="chart1"></div>
                          </div>
                      </div>
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
@if(Auth::User()->role == 'director')
function chart7() {
var options = {
    chart: {
        width: 360,
        type: 'pie',
    },
    labels: ['Assigned', 'Completed', 'In-Progress'],
    series: [{{$assigned_count}}, {{$completed_count}}, {{$progress_count}}],
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
            legend: {
                position: 'bottom'
            }
        }
    }]
}

var chart = new ApexCharts(
    document.querySelector("#chart7"),
    options
);

chart.render();
}



function chart1() {

var completed = <?php echo json_encode($admincompleted); ?>;
var assigned = <?php echo json_encode($adminassigned); ?>;
var progress = <?php echo json_encode($adminprogress); ?>;
var name = <?php echo json_encode($administratorname); ?>;

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
        name: 'Assigned',
        data: assigned
    }, {
        name: 'Completed',
        data: completed
    }, {
        name: 'In-Progress',
        data: progress
    }],
    xaxis: {
        categories: name,
        labels: {
            style: {
                colors: '#9aa0ac',
            }
        }
    },
    yaxis: {
        title: {
            text: 'tasks'
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
                return  val + " task(s)"
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
function chart3() {
  var monthname = <?php echo json_encode($MonthName); ?>;
  var completed = <?php echo json_encode($completiondata); ?>;
  var assigned = <?php echo json_encode($assigneddata); ?>;

    var options = {
        chart: {
            height: 350,
            type: 'line',
            shadow: {
                enabled: true,
                color: '#000',
                top: 18,
                left: 7,
                blur: 10,
                opacity: 1
            },
            toolbar: {
                show: false
            }
        },
        colors: ['#77B6EA', '#545454', '#9aa0ac' ],
        dataLabels: {
            enabled: true,
        },
        stroke: {
            curve: 'smooth'
        },
        series: [{
            name: "Assigned",
            data: assigned
        },
        {
            name: "Completed Task",
            data: completed
        }
        ],
        title: {
            align: 'left'
        },
        grid: {
            borderColor: '#e7e7e7',
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        markers: {

            size: 6
        },
        xaxis: {
            categories: monthname,
            title: {
                text: 'Month'
            },
            labels: {
                style: {
                    colors: '#9aa0ac',
                }
            }
        },
        yaxis: {
            title: {
                text: 'Total task'
            },
            labels: {
                style: {
                    color: '#9aa0ac',
                }
            },
            min: 5,
            max: 40
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            floating: true,
            offsetY: -25,
            offsetX: -5
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#chart3"),
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
            name: 'TotalSales',
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

function chart2() {
var salesname = <?php echo json_encode($salesname); ?>;
var sumofsales = <?php echo json_encode($sumofsales); ?>;

var options = {
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    position: 'top', // top, center, bottom
                },
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val + " Ringgit (MYR)";
            },
            offsetY: -20,
            style: {
                fontSize: '12px',
                colors: ["#9aa0ac"]
            }
        },
        series: [{
            name: 'Inflation',
            data: sumofsales
        }],
        xaxis: {
            categories: salesname,
            position: 'top',
            labels: {
                offsetY: -18,
                style: {
                    colors: '#9aa0ac',
                }
            },
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            },
            crosshairs: {
                fill: {
                    type: 'gradient',
                    gradient: {
                        colorFrom: '#D8E3F0',
                        colorTo: '#BED1E6',
                        stops: [0, 100],
                        opacityFrom: 0.4,
                        opacityTo: 0.5,
                    }
                }
            },
            tooltip: {
                enabled: true,
                offsetY: -35,

            }
        },
        fill: {
            gradient: {
                shade: 'light',
                type: "horizontal",
                shadeIntensity: 0.25,
                gradientToColors: undefined,
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [50, 0, 100, 100]
            },
        },
        yaxis: {
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false,
            },
            labels: {
                show: false,
                formatter: function (val) {
                    return val + " Ringgit (MYR)";
                }
            }

        },
        title: {
            text: 'Total Sales of Employee',
            floating: true,
            offsetY: 320,
            align: 'center',
            style: {
                color: '#9aa0ac'
            }
        },
    }

    var chart = new ApexCharts(
        document.querySelector("#chart2"),
        options
    );

    chart.render();

}

@elseif(Auth::User()->role == 'administrator')
function chart1() { //task by month with userid
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

function chart6() { //sales by month all
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
            name: 'TotalSales',
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
@elseif(Auth::User()->role == 'sales')
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

function chart1() {

  var salesmonth = <?php echo json_encode($allsalesmonth); ?>;
  var sales = <?php echo json_encode($allsales); ?>;

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
        name: 'Total Sales',
        data: sales
    }],
    xaxis: {
        categories: salesmonth,
        labels: {
            style: {
                colors: '#9aa0ac',
            }
        }
    },
    yaxis: {
        title: {
            text: 'Ringgit (MYR)'
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
                return  val + " Ringgit (MYR)"
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
@endif
</script>