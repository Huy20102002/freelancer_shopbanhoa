<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?php echo public_url('admin/'); ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo public_url('admin/'); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo public_url('admin/'); ?>js/chart.min.js"></script>
	<script src="<?php echo public_url('admin/'); ?>js/chart-data.js"></script>
	<script src="<?php echo public_url('admin/'); ?>js/easypiechart.js"></script>
	<script src="<?php echo public_url('admin/'); ?>js/easypiechart-data.js"></script>
	<script src="<?php echo public_url('admin/'); ?>js/bootstrap-datepicker.js"></script>
	<script>
		$(document).ready(function($) {
			$("#logout").click(function(e){
				e.preventDefault();
				window.location.href = "admin/logout"
			});
			$('#calendar').datepicker({
			});

			!function ($) {
			    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
			        $(this).find('em:first').toggleClass("glyphicon-minus");      
			    }); 
			    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
			}(window.jQuery);

			$(window).on('resize', function () {
			  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
			})
			$(window).on('resize', function () {
			  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
			})
		});
	
	</script>
	
<script>
	console.log(document.getElementById("bar-chart"));
	new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
</script>