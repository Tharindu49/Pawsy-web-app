<?php
require '../backend/report.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Pet Shop Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="d-flex">
        <?php include 'dashboard.php'; ?>
        <div class="container mt-5">
            <h2 class="text-center">Inventory Report</h2>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Total Items</th>
                        <th>Total Quantity</th>
                        <th>Total Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $report_data['total_items'] ?></td>
                        <td><?= $report_data['total_quantity'] ?></td>
                        <td><?= $report_data['total_value'] ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="export_report.php" class="btn btn-primary">Export CSV</a>

            <!-- Pie chart container -->
            <div class="mt-5" style="max-width: 500px; max-height: 500px; margin: 0 auto; ">
                <h3 class="text-center">Inventory Distribution by Category</h3>
                <canvas id="inventoryPieChart" ></canvas>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Data for the pie chart
        const ctx = document.getElementById('inventoryPieChart').getContext('2d');
        const inventoryPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?= json_encode($report_data['category_names']) ?>,
                datasets: [{
                    label: 'Inventory Data',
                    data: <?= json_encode($report_data['item_counts']) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                let label = tooltipItem.label || '';
                                if (label) {
                                    label += ': ' + tooltipItem.raw;
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>


                       
