<div>
     <canvas id="line1"></canvas>
</div>
<script>
     const line1 = document.getElementById('line1');

     new Chart(line1, {
          type: 'line',
          data: {
               labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
               datasets: [{
                         label: 'Jumlah Kamar',
                         data: [65, 59, 80, 81, 56, 55, 40],
                         fill: false,
                         borderColor: '#E5E7EB',
                         backgroundColor: '#E5E7EB',
                         tension: 0.1
                    },
                    {
                         label: 'Jumlah Kamar Terisi',
                         data: [65, 90, 80, 88, 56, 50, 40],
                         fill: false,
                         borderColor: '#304E6E',
                         backgroundColor: '#304E6E',
                         tension: 0.1
                    }
               ]
          },
          options: {
               plugins: {
                    title: {
                         display: true,
                         text: 'Custom Chart Title',
                         padding: {
                              top: 10,
                              bottom: 10
                         }
                    }
               }
          }


     });
</script>