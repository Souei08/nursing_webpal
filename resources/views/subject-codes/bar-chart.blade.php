<div class="row mb-4">
    <div class="col-md-12 d-flex align-items-stretch">
        <div class="card w-50 border-0 shadow-sm mb-3 text-center">
            <div class="card-header bg-white border-0">
                {{ $category }}
            </div>
            <div class="card-body">

                <div class="chart-area" id="chart{{ $category }}">
                    <canvas id="chart-{{ $category }}" style="height: 100px"></canvas>
                </div>

                <div class="col-sm-6" id="pie{{ $category }}">
                    <img id="pie{{ $category }}">
                </div>

            </div>
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
                    return $student->analytic[$category];
                }));

        const ctx = document.getElementById('chart-{{ $category }}');

        barChart = new Chart(ctx, {
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
                        var url = barChart.toBase64Image();
                        document.getElementById("pieChartImage").src = url;
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                legend: false,

                plugins: {
                    labels: {
                        fontColor: '#FF0000',
                        render: 'percentage',
                    },
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
