<!-- <div class="chart-container"> -->
<!-- Ignore Comments for now, only this div below is included + scripting -->
<!-- Refer accommodationStatus_Bar.php if needed -->
<div class="chartBox">
    <h4 class="text-center p-2">Water Tankers</h4>
    <canvas id="myLineChart"></canvas>
</div>
<!-- </div> -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php include('../controllers/includes/common.php');
try{
$tanker_detail = "SELECT
                  MONTH(t.timestamp) AS 'month',
                  YEAR(t.timestamp) AS 'year',
                  tv.id AS vendor_id,
                  tv.vname AS 'vendor_name',
                  COUNT(*) AS 'count_per_month'
                  FROM
                      tankers t
                  JOIN
                      tanker_vendors tv ON tv.id = t.vendor_id
                  GROUP BY
                      MONTH(t.timestamp),
                      YEAR(t.timestamp),
                      tv.id,
                      tv.vname
                  ORDER BY
                      YEAR(t.timestamp),
                      MONTH(t.timestamp),
                      tv.id;
                  ";
                   $result=mysqli_query($conn,$tanker_detail);
                   
                   $res=array();
                   while ($row = $result->fetch_assoc()) 
                   {
                       $entry = array(
                           'month' => $row['month'],
                           'year' => $row['year'],
                           'vendor_id' => $row['vendor_id'],
                           'vendor_name' => $row['vendor_name'],
                           'count_per_month' => $row['count_per_month']
                       );
                       $res[]=$entry;
                   }
                   
                       //Different arrays storing data of tankers of respective month.
                       $jan = array();
                       $feb = array();
                       $mar = array();
                       $apr = array();
                       $may = array();
                       $jun = array();
                       $jul = array();
                       $aug = array();
                       $sep = array();
                       $oct = array();
                       $nov = array();
                       $dec = array();

                        for ($i = 0; $i < 12; $i++) {
                            foreach ($res as $entry) {
                                if ($i + 1 == $entry['month']) {
                                    switch ($i + 1) {
                                        case 1:
                                            $jan[] = $entry;
                                            break;
                                        case 2:
                                            $feb[] = $entry;
                                            break;
                                        case 3:
                                            $mar[] = $entry;
                                            break;
                                        case 4:
                                            $apr[] = $entry;
                                            break;
                                        case 5:
                                            $may[] = $entry;
                                            break;
                                        case 6:
                                            $jun[] = $entry;
                                            break;
                                        case 7:
                                            $jul[] = $entry;
                                            break;
                                        case 8:
                                            $aug[] = $entry;
                                            break;
                                        case 9:
                                            $sep[] = $entry;
                                            break;
                                        case 10:
                                            $oct[] = $entry;
                                            break;
                                        case 11:
                                            $nov[] = $entry;
                                            break;
                                        case 12:
                                            $dec[] = $entry;
                                            break;
                                    }
                                }
                            }
                        }

}
catch(PDOException $e) {
    die("ERROR: Could not able to execute. " . $e->getMessage());
}

?>

<script>
    //Dummy data, Write SQL queries here
    var xValues = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
    var yValues = [
        <?php echo count($jan); ?>,
        <?php echo count($feb); ?>,
        <?php echo count($mar); ?>,
        <?php echo count($apr); ?>,
        <?php echo count($may); ?>,
        <?php echo count($jun); ?>,
        <?php echo count($jul); ?>,
        <?php echo count($aug); ?>,
        <?php echo count($sep); ?>,
        <?php echo count($oct); ?>,
        <?php echo count($nov); ?>,
        <?php echo count($dec); ?>
    ];
    console.log(yValues);
    new Chart("myLineChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                label: "Number of Trips",
                fill: false,
                lineTension: 0,
                backgroundColor: 'rgb(54, 162, 235)',
                borderColor: 'rgba(153, 102, 255, 0.5)',
                data: yValues
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

     function getRandomColor() {
        var letters = "0123456789ABCDEF";
        var color = "#";
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>