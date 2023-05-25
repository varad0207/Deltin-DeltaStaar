<!-- <div class="chart-container"> -->
    <!-- Ignore Comments for now, only this div below is included + scripting -->
    <!-- Refer accommodationStatus_Bar.php if needed -->
<div class="chartBox">
    <h4 class="text-center p-2">Water Tankers Line</h4>
    <canvas id="myLineChart"></canvas>
</div>
<!-- </div> -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    //Setup Block
    const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'My First Dataset',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };

    //Config Block
    const configLine = {
        type: 'line',
        data: data,
        options: {
            //aspectRatio: 1.2,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    //Render Block
    const myLineChart = new Chart(
        document.getElementById('myLineChart'), configLine
    );
</script>
