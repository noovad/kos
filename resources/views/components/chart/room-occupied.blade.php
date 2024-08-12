<div>
     <canvas id="line"></canvas>
</div>
<script>
     const line = document.getElementById('line');
     let roomtype = JSON.parse(`<?php echo json_encode($roomtype); ?>`);

     new Chart(line, {
          data: {
               labels: roomtype['roomTypes'],
               datasets: [{
                         type: 'line',
                         label: 'Jumlah Kamar',
                         data: roomtype['rooms'],
                         borderColor: '#6C8198',
                         backgroundColor: '#6C8198',
                    },
                    {
                         type: 'bar',
                         backgroundColor: '#304E6E',
                         label: 'Kamar Terisi',
                         data: roomtype['users'],
                         borderWidth: 1
                    }
               ]
          },
          options: {
               plugins: {
                    title: {
                         display: true,
                         text: 'Keterisian Kamar (Tipe Kamar)',
                         padding: {
                              top: 10,
                              bottom: 10
                         }
                    }
               }
          }
     });
</script>