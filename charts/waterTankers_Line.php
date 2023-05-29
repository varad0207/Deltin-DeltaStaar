<!-- <div class="chart-container"> -->
    <!-- Ignore Comments for now, only this div below is included + scripting -->
    <!-- Refer accommodationStatus_Bar.php if needed -->
<div class="chartBox">
    <h4 class="text-center p-2">Water Tankers Lines</h4>
    <canvas id="myLineChart"></canvas>
</div>
<!-- </div> -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Nos of trips by each vendor in every month -->
<!-- 
    For Example: 3 vendors are there and data is to plotted for last 12 months
    So there will be 3 lines on the line chart, each line representing one vendor

    X-axis: Months
    Y-axis: Nos of Trips
-->
<script>
    //Dummy data, Write SQL queries here
    const xValues = [50,60,70,80,90,100,110,120,130,140,150];
    const yValues = [7,8,8,9,9,9,10,11,14,14,15];
    const zValues = [17,18,18,19,19,19,120,11,142,14,125];

    new Chart("myLineChart", {
        type: "line",
        data: {
            //and pass here the labels on X axis
            //last 12 months
            labels: xValues,
            
            datasets: [{
                //softcode name of first vendor
                label: "Varad",    
                fill: false,
                lineTension: 0,
                backgroundColor: "rgba(0,0,255,1.0)",
                borderColor: "rgba(255,255,255,1.0)",

                //pass variable for data to be plotted
                data: yValues
            },{
                //softcode name of second vendor and so on
                label: "Ivan",    
                fill: false,
                lineTension: 0,
                backgroundColor: "rgba(0,255,255,1.0)",
                borderColor: "rgba(255,0,255,1.0)",

                //pass variable for data to be plotted
                data: xValues
            },
            {
                label: "Vadiraj",    
                fill: false,
                lineTension: 0,
                backgroundColor: "rgba(0,0,255,1.0)",
                borderColor: "rgba(255,255,255,1.0)",

                //pass variable for data to be plotted
                data: zValues
            }]
        },
        options: {
            //aspectRatio: 1.2,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

</script>

<!-- Old Script Code -->
<!-- <script>
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
</script> -->