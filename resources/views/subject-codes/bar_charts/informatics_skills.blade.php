<div class="row mb-4">
    <div class="col-sm-12">
        <b>
            Informatics Skill
        </b>
    </div>

    <div class="col-sm-6">
        <div class="chart-area" id="barGraphISCanvas">
            <canvas id="chart-IS" style="height: 100px"></canvas>
        </div>
    </div>

    <div class="col-sm-12">
        <div id="barGraphISImageDiv">
            <img id="barGraphISImage">
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
                    return $student->analytic['Informatics Skill'];
                }));

        const ctx = document.getElementById('chart-IS');

        barGraphIS = new Chart(ctx, {
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
                        var url = barGraphIS.toBase64Image();
                        document.getElementById("barGraphISImage").src = url;
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
