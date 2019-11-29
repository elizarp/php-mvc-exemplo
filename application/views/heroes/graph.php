<script type="text/javascript" src="<?php echo URL; ?>public/js/Chart.min.js"></script>

<style>
    #chart-container {
        width: 100%;
        height: auto;
    }
</style>

<div class="container">
    <h2>You are in the View: application/views/heroes/graph.php (everything in this box comes from that file)</h2>
    <!-- main content output -->
    <div>
        <h3>Graph of heroes (data from API)</h3>
        <div id="chart-container">
            <canvas id="graphCanvas"></canvas>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        showGraph();
    });


    function showGraph() {
        {
            
            $.get("/api/heroes",
                function(data) {
                    console.log(data);
                    var name = [];
                    var heigths = [];

                    for (var i in data) {
                        name.push(data[i].name);
                        heigths.push(data[i].height);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [{
                            label: 'Heroes Height',
                            backgroundColor: '#49e2ff',
                            borderColor: '#46d5f1',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: heigths
                        }]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'horizontalBar',
                        data: chartdata
                    });
                });
        }
    }
</script>