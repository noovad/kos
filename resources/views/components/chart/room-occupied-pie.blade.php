<div>
    <canvas id="pie2"></canvas>
</div>
<script>
    const ctxpiee1 = document.getElementById('pie2');
    let room = JSON.parse(`<?php echo json_encode($room); ?>`);

    new Chart(ctxpiee1, {
        type: 'pie',
        data: {

            datasets: [{
                backgroundColor: ['#6C8198', '#304E6E'],
                borderColor: ['#6C8198', '#304E6E'],
                data: room
            }],
            labels: [
                'Kamar Terisi',
                'Kamar Kosong',
            ]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Kamar Tersedia',
                    padding: {
                        top: 10,
                        bottom: 10
                    }
                }
            }
        }
    });
</script>