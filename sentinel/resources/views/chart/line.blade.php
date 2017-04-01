<canvas id="data2"></canvas>
<script>
var data2 = document.getElementById("data2");
var myPieChart = new Chart(data2,{
  type: 'line',
  data: {
    labels: [
      <?php for($i=0;$i<12;$i++){
        echo $i+1;
        if($i!=11){
          echo ", ";
        }
      } ?>
    ],
    datasets: [
      {
        label: ["Kegiatan Internasional UM"],
        fill: false,
        backgroundColor: "rgba(75,192,192,0.4)",
        borderColor: "rgba(75,192,192,1)",
        pointBorderColor: "rgba(75,192,192,1)",
        pointBackgroundColor: "#fff",
        data: [
          <?php for($i=0,$j=0;$i<12;$i++){
            if($j<sizeof($data2)){
              if($i+1==$data2[$j]->bulan){
                echo $data2[$j]->jumlah;
                $j++;
              }else{
                echo "0";
              }
            }else{
              echo "0";
            }
            if($i!=11){
              echo ", ";
            }
          } ?>
        ],
        spanGaps: false,
      },
    ]
  },
  options: {
    scales: {
      yAxes: [{
          ticks: {
            beginAtZero:true
          }
      }]
    },
    legend: {
      position: 'bottom'
    }
  }
});
</script>
