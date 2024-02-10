$('#edit-user').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('user') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#edit_user_id').val(recipient);
    var base=$('#base_url').val();
    $.ajax({
        method: 'POST',
        url: base+'usuarios/getonejson',
        data:{id:recipient},
        dataType: 'json',
        success: function(request) {
            $('#edit_name_user').val(request['nombre']);
            $('#edit_email_user').val(request['email']);
            $('#edit_rol_user option[value="' + request['rol'] + '"]').prop('selected', true);
        }
    });

  });


  $('#change-user').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('user') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#change_user_id').val(recipient);
    
  });

  $('#delete-user').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('user') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#delete_user_id').val(recipient);
    
  });

  

  "use strict";
  !function (NioApp, $) {
    var promedio_1=0;
    var promedio_2=0;
    var promedio_3=0;
    var promedio_4=0;
   
   var base=$('#base').val();

    $.ajax({
      'async': false,
      'method': "POST",
      'url': base + "dashboard/getcomp_1",
      'global': false,
      'dataType': "json",
      'success': function(request) {
        console.log(request);
        promedio_1 = request['promedio_1'];
        promedio_2 = request['promedio_2'];
        promedio_3 = request['promedio_3'];
        promedio_4 = request['promedio_4'];
      }
    });
   console.log(promedio_1);
   
    var TrafficChannelDoughnutDatac1 = {
      labels: ["No se como hacerlo", "Puedo hacerlo con ayuda", "Puedo hacerlo por mi cuenta", "Puedo Hacerlo y ayudo a otros."],
      dataUnit: 'Empleados',
      legend: false,
      datasets: [{
        borderColor: "#fff",
        background: ["#798bff", "#b8acff", "#ffa9ce", "#f9db7b"],
        data: [promedio_1, promedio_2, promedio_3,promedio_4],
      }]
    };
  
    function analyticsDoughnut(selector, set_data) {
      var $selector = selector ? $(selector) : $('.analytics-doughnutc1');
      $selector.each(function () {
        var $self = $(this),
            _self_id = $self.attr('id'),
            _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
  
        var selectCanvas = document.getElementById(_self_id).getContext("2d");
        var chart_data = [];
  
        for (var i = 0; i < _get_data.datasets.length; i++) {
          chart_data.push({
            backgroundColor: _get_data.datasets[i].background,
            borderWidth: 2,
            borderColor: _get_data.datasets[i].borderColor,
            hoverBorderColor: _get_data.datasets[i].borderColor,
            data: _get_data.datasets[i].data
          });
        }
  
        var chart = new Chart(selectCanvas, {
          type: 'doughnut',
          data: {
            labels: _get_data.labels,
            datasets: chart_data
          },
          options: {
            legend: {
              display: _get_data.legend ? _get_data.legend : false,
              labels: {
                boxWidth: 12,
                padding: 20,
                fontColor: '#6783b8'
              }
            },
            rotation: -1.5,
            cutoutPercentage: 70,
            maintainAspectRatio: false,
            tooltips: {
              enabled: true,
              rtl: NioApp.State.isRTL,
              callbacks: {
                title: function title(tooltipItem, data) {
                  return data['labels'][tooltipItem[0]['index']];
                },
                label: function label(tooltipItem, data) {
                  return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']] + ' ' + _get_data.dataUnit;
                }
              },
              backgroundColor: '#fff',
              borderColor: '#eff6ff',
              borderWidth: 2,
              titleFontSize: 13,
              titleFontColor: '#6783b8',
              titleMarginBottom: 6,
              bodyFontColor: '#9eaecf',
              bodyFontSize: 12,
              bodySpacing: 4,
              yPadding: 10,
              xPadding: 10,
              footerMarginTop: 0,
              displayColors: false
            }
          }
        });
      });
    } // init chart
  
  
    NioApp.coms.docReady.push(function () {
      analyticsDoughnut();
    });
  }(NioApp, jQuery);