<div class="row mb-4">
    <div class="col-sm-12">
        <b>
            Computer Skills
        </b>
    </div>

    <div class="col-sm-6">
        <div class="chart-area" id="barGraphCSCanvas">
            <canvas id="chart-CS" style="height: 100px"></canvas>
        </div>
    </div>

    <div class="col-sm-12">
        <div id="barGraphCSImageDiv">
            <img id="barGraphCSImage">
        </div>
    </div>
</div>
<script type="text/javascript">
    function renderChart() {
        const students = @json(
            $data->students()->get()->map(function ($student) {
                    return $student->user->first_name . ' ' . $student->user->last_name;
                }));
        const grades = @json(
            $data->students()->get()->map(function ($student) use ($category) {
                    return $student->analytic['Computer Skills'];
                }));

        const ctx = document.getElementById('chart-CS');

        barGraphCS = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: students,
                datasets: [{
                    label: 'Grades',
                    data: grades,
                    borderWidth: 1
                }]
            },
            options: {
                animation: {
                    onComplete: function() {
                        var url = barGraphCS.toBase64Image();
                        document.getElementById("barGraphCSImage").src = url;
                    }
                },

                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    renderChart();
</script>
