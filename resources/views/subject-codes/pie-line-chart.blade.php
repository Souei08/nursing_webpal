{{-- <div class="row mb-4">
    <div class="col-md-12 d-flex align-items-stretch justify-content-center">
        <div class="card border-10 shadow-sm mb-3">
            <div class="card-body">

                <div class="chart-area" id="PieChartColumn">
                    <canvas id="chart-{{ $graph }}" style="height: 400px; width: 400px;"></canvas>
                </div>

                <div class="col-sm-12" id="PieChartImage">
                    <img id="pieChartImage">
                </div>

            </div>
        </div>
    </div>
</div>

@php
    function getAnalyticsByCategory($category, $data)
    {
        $infoSkills = $data->tasks()->where(['category' => $category]);
        $infoSkillsTotal = 0;
    
        foreach ($infoSkills->get() as $infoSkill) {
            $infoSkillsTotal += $infoSkill->taskSubmissions()->sum('rating');
        }
    
        if ($infoSkillsTotal === 0) {
            return number_format(0);
        }
    
        $percent = $infoSkillsTotal / ($infoSkills->count() * 10);
    
        return number_format($percent * 100, 2);
    }
    
    $categoryData = [getAnalyticsByCategory('Informatics Skill', $data), getAnalyticsByCategory('Informatics Knowledge', $data), getAnalyticsByCategory('Computer Skills', $data)];
@endphp

<script type="text/javascript">
    function renderChart() {
        const ctx = document.getElementById('chart-{{ $graph }}');

        const labels = ['Informatics Skill', 'Informatics Knowledge', 'Computer Skills'];

        const data = @json($categoryData);

        lineGraph = new Chart(ctx, {
            type: '{{ $graph }}',
            data: {
                labels,
                datasets: [{
                    label: 'My First Dataset',
                    data,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            },

            options: {
                animation: {
                    onComplete: function() {
                        var url = lineGraph.toBase64Image();
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
            }
        });
    }

    renderChart();
</script> --}}
