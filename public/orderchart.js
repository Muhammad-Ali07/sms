$(document).ready(function(){
  $.ajax({
    url: "https://nsklog.com/NSK1029/public/api/chartviews",
    method: "GET",
    success: function(data) {
      console.log(data);
      var player = [];
      var score = [];

      for(var i in data) {
        player.push("Order Status : " + data[i].orderstatus);
        score.push(data[i].orderamount);
      }
      
      var COLORS = [
		'#4dc9f6',
		'#f67019',
		'#3ab0c3',
		'#537bc4',
		'#acc236',
		'#166a8f',
		'#003a44',
		'#58595b',
		'#8549ba'
	];
        
      var chartdata = {
        labels: player,
        datasets : [
          {
            label: 'Orders By Status ',
            // backgroundColor: 'rgb(255 101 111)',
            // borderColor: 'rgba(200, 200, 200, 0.75)',
            // hoverBackgroundColor: 'rgb(100 149 237)',
             backgroundColor: [
                COLORS[5],
                COLORS[6],
                COLORS[2],
                COLORS[3],
                COLORS[4],
              ],
            // hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: score
          }
        ]
      };

      var ctx = $("#orderchart");

       var barGraph = new Chart(ctx, {
        type: 'doughnut',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});
