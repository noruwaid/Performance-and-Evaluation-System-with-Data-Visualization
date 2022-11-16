$(function(){
  
    $('#eye').click(function(){
         
          if($(this).hasClass('fas fa-eye-slash')){
             
            $(this).removeClass('fas fa-eye-slash');
            
            $(this).addClass('fas fa-eye');
            
            $('#password').attr('type','text');
              
          }else{
           
            $(this).removeClass('fas fa-eye');
            
            $(this).addClass('fas fa-eye-slash');  
            
            $('#password').attr('type','password');
          }
      });
  });

  $(function(){
  
    $('#eye2').click(function(){
         
          if($(this).hasClass('fas fa-eye-slash')){
             
            $(this).removeClass('fas fa-eye-slash');
            
            $(this).addClass('fas fa-eye');
            
            $('#passwordconfirm').attr('type','text');
              
          }else{
           
            $(this).removeClass('fas fa-eye');
            
            $(this).addClass('fas fa-eye-slash');  
            
            $('#passwordconfirm').attr('type','password');
          }
      });
  });

  var chart = document.getElementById('echart_pie');
  var barChart = echarts.init(chart);

  barChart.setOption({
      tooltip: {
          trigger: "item",
          formatter: "{a} <br/>{b} : {c} ({d}%)"
      },
      legend: {
          x: "center",
          y: "bottom",
          textStyle: { color: '#9aa0ac' },
          data: ["Direct Access", "E-mail ok ", "Video Ads", "Search Engine"]
      },

      calculable: !0,
      series: [{
          name: "Chart Data",
          type: "pie",
          radius: "55%",
          center: ["50%", "48%"],
          data: [{
              
              value: 335,
              name: "Direct Access"
          }, {
              value: 1000,
              name: "E-mail Marketing"
          }, {
              value: 135,
              name: "Video Ads"
          }, {
              value: 548,
              name: "Search Engine"
          }]
      }],
      color: ['#575B7A', '#DE725C', '#72BE81', '#50A5D8']
  });