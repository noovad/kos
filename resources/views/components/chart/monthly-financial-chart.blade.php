<div>
    <canvas id="myChart"></canvas>
</div>
<script>
    const ctx = document.getElementById('myChart');
    const currentYear = new Date().getFullYear();
    let yearly = JSON.parse('{{ json_encode($yearly) }}');
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                backgroundColor: '#304E6E',
                label: 'Transaksi ' + currentYear + ' (Rp)',
                data: yearly,
                borderWidth: 1
            }]
        },
        options: {
               plugins: {
                    title: {
                         display: true,
                         text: 'Transaksi Tahun ' + currentYear,
                         padding: {
                              top: 10,
                              bottom: 10
                         }
                    }
               }
          }
    });
</script>
</script>