<canvas id="data1"></canvas>
<script type="text/javascript">
// For a pie chart
var data1 = document.getElementById("data1");
var myPieChart = new Chart(data1,{
  type: 'pie',
  data: {
    labels: [
      <?php for($i = 0; $i < sizeof($data1); $i++){
        echo '"'.$data1[$i]->name.'"';
        if($i!=sizeof($data1)-1){
          echo ", ";
        }
      } ?>
    ],
    datasets: [{
      data: [
        <?php for($i = 0; $i < sizeof($data1); $i++){
          echo $data1[$i]->jumlah;
          if($i!=sizeof($data1)-1){
            echo ", ";
          }
        } ?>
      ],
      backgroundColor: [
        <?php for($i = 0; $i < sizeof($data1); $i++){
          $hsl = $i*51;
          if($hsl > 350) $hsl-=350;
          echo '"hsl('.$hsl.', 100%, 70%)"';
          if($i!=sizeof($data1)-1){
            echo ", ";
          }
        } ?>
      ],
      hoverBackgroundColor: [
        <?php for($i = 0; $i < sizeof($data1); $i++){
          $hsl = $i*51;
          echo '"hsl('.$hsl.', 100%, 73%)"';
          if($i!=sizeof($data1)-1){
            echo ", ";
          }
        } ?>
      ]
    }]
  },
  options: {
    legend:{
      position:'bottom'
    }
  }
});
</script>
