<div>
    <canvas id="pie"></canvas>
</div>
<script>
    const ctx1 = document.getElementById('pie');
    let transaction = JSON.parse(`<?php echo json_encode($transaction); ?>`);

    console.log(transaction);

    new Chart(ctx1, {
        plugins: [ChartDataLabels],
        type: 'pie',
        data: {
            datasets: [{
                backgroundColor: ['#6C8198', '#304E6E', '#9CA3AF'],
                borderColor: ['#6C8198', '#304E6E', '#9CA3AF'],
                data: transaction['count'],
            }],
            labels: transaction['status']
        },
        options: {
            plugins: {
               datalabels: {
                    color: '#fff',
                    font: {
                        weight: 'bold',
                        size: 16
                    },
                },
                title: {
                    display: true,
                    text: 'Tagihan Bulan Ini',
                    padding: {
                        top: 10,
                        bottom: 10
                    }
                }
            }
        }
    });
</script>
