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
        @php
          $hsl = 0;
        @endphp
        @foreach ($data2 as $key => $user)
        {
          label: ['{{$user[0]->name}}'],
          fill: false,
          backgroundColor: "hsl({{$hsl}}, 100%, 80%)",
          borderColor: "hsl({{$hsl}}, 100%, 70%)",
          pointBorderColor: "hsl({{$hsl}}, 100%, 75%)",
          pointBackgroundColor: "#fff",
          data: [
            <?php
            for($i=0;$i<12;$i++){
              for($j=0;$j<sizeof($user);$j++){
                $jum = 0;
                if($user[$j]->bulan == $i+1){
                  $jum = $user[$j]->jumlah;
                  break;
                }
              }
              if($jum == 0){
                echo "0, ";
              }else{
                echo $jum.", ";
              }
            }
            ?>
          ],
          spanGaps: false,
        },
        <?php $hsl += 51; ?>
        @endforeach
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
