@extends('layouts.app')

@section('content')
<style>
    .page-container {
        padding: 30px 30px;
    }

    .main-wrapper {
        display: flex;
        align-items: flex-start;
        gap: 60px;
        margin-left: 80px;
    }

    .left-column {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .report-title {
    color: #223060; /* biru tua */
    margin-bottom: 35px; /* jarak bawah */
    font-size: 25px;
    font-weight: bold;
}

    .company-box,
    .progress-box,
    .status-box {
        width: 350px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

   .company-box {
    width: 350px;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    background-color: white;
}

.company-header {
    background-color: #223060; /* biru tua */
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    position: relative;
}

.company-text h2 {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
}

.company-text p {
    margin: 4px 0 0;
    font-size: 10px;
    color: #FFFFFF;
}

.logo-circle {
    width: 70px;
    height: 70px;
    background-color: #fff;
    border-radius: 50%;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    right: 15px;
    bottom: -35px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.logo-circle img {
    width: 60px;
    height: 60px;
    object-fit: contain;
}

.company-footer-strip {
    height: 40px;
    background-color: white;
}


    .progress-box {
        background-color: white;
        border-radius: 15px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 300px;
    }

    .progress-circle {
        position: relative;
        width: 140px;
        height: 140px;
    }

    .progress-circle svg {
        transform: rotate(-90deg);
    }

    .progress-circle circle {
        fill: none;
        stroke-width: 10;
    }

    .circle-bg {
        stroke: #e5e7eb;
    }

    .circle-progress {
        stroke: #f59e0b;
        stroke-linecap: round;
        stroke-dasharray: 314;
        stroke-dashoffset: 78; /* 75% */
        transition: stroke-dashoffset 0.5s ease;
    }

    .progress-circle span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 24px;
        font-weight: bold;
        color: #1c2d59;
    }

    .progress-label {
        margin-top: 15px;
        text-align: center;
        font-weight: bold;
        color: #1c2d59;
        font-size: 16px;
    }

    .status-box {
        background-color: #1c2d59;
        color: white;
        padding: 25px 20px;
    }

    .status-item {
        display: flex;
        align-items: center;
        margin-bottom: 18px;
    }

    .status-icon {
        width: 20px;
        height: 20px;
        margin-right: 12px;
    }

    .status-text strong {
        display: block;
        font-size: 14px;
        color: white;
    }

    .status-text small {
        font-size: 12px;
        color: #d1d5db;
    }

    .alert-button {
        background-color: #ef4444;
        color: white;
        font-size: 10px;
        border: none;
        padding: 3px 8px;
        border-radius: 5px;
        margin-left: 10px;
    }

    .report-box-container {
        display: flex;
        flex-direction: column;
        gap: 25px;
        min-width: 500px;
    }

    .report-heading {
        font-weight: bold;
        color: #1c2d59;
        font-size: 14px;
    }

    .report-box {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 16px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .arrow-up {
        color: green;
        font-size: 30px;
        margin-right: 5px;
    }

    .label-text {
        font-weight: bold;
        font-size: 16px;
        color: #1c2d59;
        text-align: center;
        margin-left: 10px;
    }

    .report-box select {
        padding: 6px 15px;
        border-radius: 6px;
        border: 1px solid #d1d5db;
        font-size: 14px;
    }

    .mini-boxes {
        display: flex;
        gap: 20px;
        justify-content: space-between;
    }

    .mini-box {
        background-color: white;
        border-radius: 16px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px 24px;
        flex: 1;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .mini-circle {
        width: 60px;
        height: 60px;
        position: relative;
    }

    .mini-circle svg {
        transform: rotate(-90deg);
    }

    .mini-circle circle {
        fill: none;
        stroke-width: 6;
    }

    .mini-circle .bg {
        stroke: #f3f4f6;
    }

    .mini-circle .progress {
        stroke-linecap: round;
    }

    .mini-circle span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 14px;
        font-weight: bold;
        color: #1c2d59;
    }

    .mini-label {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .mini-label strong {
        color: #1c2d59;
        font-size: 16px;
    }

    .mini-label small {
        font-size: 12px;
        color: #6b7280;
    }


   .progress-btn {
    padding: 6px 14px;
    border-radius: 6px;
    border: 1px solid #1c2d59;
    margin-left: 6px;
    font-size: 14px;
    background-color: #1c2d59;
    color: white;
    transition: all 0.2s ease-in-out;
    cursor: pointer;
}

.progress-btn.active {
    background-color: white;
    color: #1c2d59;
}


.project-funds-box {
    margin-top: 30px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
    padding: 20px;
    font-family: 'Segoe UI', sans-serif;
}

.project-funds-box .table-header {
    font-weight: bold;
    font-size: 16px;
    color: #223060;
    margin-bottom: 15px;
}

.project-funds-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}

.project-funds-table thead {
    background-color: #223060;
    color: #ffffff;
}

.project-funds-table th,
.project-funds-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.project-funds-table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.project-funds-table thead th:first-child {
    border-top-left-radius: 10px;
}

.project-funds-table thead th:last-child {
    border-top-right-radius: 10px;
}

.project-funds-table tbody tr:last-child td:first-child {
    border-bottom-left-radius: 10px;
}

.project-funds-table tbody tr:last-child td:last-child {
    border-bottom-right-radius: 10px;
}


.table-pagination {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 15px;
    font-size: 14px;
    color: #444;
    flex-wrap: wrap;
}

.pagination-info span {
    margin-right: 20px;
    font-weight: 500;
}


.pagination-nav {
    display: flex;
    gap: 4px;
    padding: 4px 8px;
    border: 1px solid #ccc;
    border-radius: 6px;
    align-items: center;
    font-size: 12px;
}

.pagination-link {
    padding: 4px 8px;
    border-radius: 50%;
    background-color: transparent;
    color: #223060;
    font-weight: 500;
    cursor: pointer;
    transition: 0.2s;
}

.pagination-link.active {
    background-color: #223060;
    color: white;
}

.pagination-ellipsis {
    color: #888;
    padding: 0 2px;
    font-size: 12px;
}



@media (max-width: 768px) {
    .page-container {
        padding: 20px;
    }

    .main-wrapper {
        flex-direction: column;
        margin-left: 0;
        gap: 30px;
    }

    .left-column {
        width: 100%;
        align-items: center;
    }

    .company-box,
    .progress-box,
    .status-box {
        width: 100%;
        max-width: 100%;
    }

    .report-box-container {
        min-width: unset;
        width: 100%;
    }

    .mini-boxes {
        flex-direction: column;
        gap: 16px;
    }

    .mini-box {
        width: 100%;
    }

    .report-box {
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 10px;
    }

    .report-box select {
        width: 100%;
    }

    .project-funds-box {
        overflow-x: auto;
    }

    .project-funds-table {
        min-width: 800px;
    }

    .table-pagination {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
}



</style>

<div class="page-container-fluid px-4 mt-4">
<h3 class="report-title"><strong>Company Report Overview</strong></h3>


    <div class="main-wrapper">
        <!-- KIRI -->
        <div class="left-column">
           <div class="company-box">
                <div class="company-header">
                    <div class="company-text">
                        <h2>Lion Bird</h2>
                        <p>Smart Robotics for Construction Sites</p>
                    </div>
                    <div class="logo-circle">
                        <img src="{{ asset('images/mask-group.png') }}" alt="Lion Bird Logo">
                    </div>
                </div>
                <div class="company-footer-strip"></div>
            </div>


            <div class="progress-box">
                <div class="progress-circle">
                    <svg width="140" height="140">
                        <circle class="circle-bg" cx="70" cy="70" r="50" />
                        <circle class="circle-progress" cx="70" cy="70" r="50" />
                    </svg>
                    <span>75%</span>
                </div>
                <div class="progress-label">This Month’s<br>Completed Report</div>
            </div>

            <div class="status-box">
                <div class="status-item">
                    <img src="{{ asset('images/logo-acc.png') }}" class="status-icon" alt="check">
                    <div class="status-text">
                        <strong>Business Development</strong>
                        <small>Update on April 10, 2025</small>
                    </div>
                </div>
                <div class="status-item">
                    <img src="{{ asset('images/logo-acc.png') }}" class="status-icon" alt="check">
                    <div class="status-text">
                        <strong>Revenue</strong>
                        <small>Update on April 10, 2025</small>
                    </div>
                </div>
                <div class="status-item">
                    <img src="{{ asset('images/logo-acc.png') }}" class="status-icon" alt="check">
                    <div class="status-text">
                        <strong>Net Profit</strong>
                        <small>Update on April 17, 2025</small>
                    </div>
                </div>
                <div class="status-item">
                    <img src="{{ asset('images/logo-decline.png') }}" class="status-icon" alt="alert">
                    <div class="status-text">
                        <strong>Team Development</strong>
                        <small>Update Needed</small>
                    </div>
                    <button class="alert-button">Report Now!</button>
                </div>
                <div class="status-item">
                    <img src="{{ asset('images/logo-acc.png') }}" class="status-icon" alt="check">
                    <div class="status-text">
                        <strong>Impact</strong>
                        <small>Update on April 22, 2025</small>
                    </div>
                </div>
            </div>
        </div>



        <!-- KANAN -->
        <div class="report-box-container">
            <!-- Pathway Box -->
            <div>
                <div class="report-heading">Your Monthly Report Pathway</div>
                <div class="report-box">
                    <div style="display: flex; align-items: center;">
                        <div class="arrow-up">↑</div>
                        <div class="label-text">Tovend</div>
                    </div>

                    <select>
                        <option>April</option>
                        <option>March</option>
                        <option>February</option>
                    </select>
                </div>
            </div>

            <!-- Mini Progress Boxes -->
            <div class="mini-boxes">
                <div class="mini-box">
                    <div class="mini-circle">
                        <svg width="60" height="60">
                            <circle class="bg" cx="30" cy="30" r="25" />
                            <circle class="progress" cx="30" cy="30" r="25"
                                    stroke="#f59e0b"
                                    stroke-dasharray="157"
                                    stroke-dashoffset="39" />
                        </svg>
                        <span>75%</span>
                    </div>
                    <div class="mini-label">
                        <strong>Revenue</strong>
                        <small>Apr 10, 2025</small>
                    </div>
                </div>

                <div class="mini-box">
                    <div class="mini-circle">
                        <svg width="60" height="60">
                            <circle class="bg" cx="30" cy="30" r="25" />
                            <circle class="progress" cx="30" cy="30" r="25"
                                    stroke="#fbbf24"
                                    stroke-dasharray="157"
                                    stroke-dashoffset="57" />
                        </svg>
                        <span>62%</span>
                    </div>
                    <div class="mini-label">
                        <strong>Net Profit</strong>
                        <small>Apr 17, 2025</small>
                    </div>
                </div>

                <div class="mini-box">
                    <div class="mini-circle">
                        <svg width="60" height="60">
                            <circle class="bg" cx="30" cy="30" r="25" />
                            <circle class="progress" cx="30" cy="30" r="25"
                                    stroke="#ef4444"
                                    stroke-dasharray="157"
                                    stroke-dashoffset="102" />
                        </svg>
                        <span>35%</span>
                    </div>
                    <div class="mini-label">
                        <strong>Impact</strong>
                        <small>Apr 22, 2025</small>
                    </div>
                </div>
            </div>

            <!-- Recent Progress Chart Box -->
        <div style="margin-top: 40px;">
                <div class="report-box" style="width: 600px; padding: 20px 24px; flex-direction: column; align-items: flex-start; position: relative;">
                    <div style="position: absolute; top: 12px; left: 24px; font-weight: bold; color: #1c2d59; font-size: 16px;">
                        Recent Progress
                    </div>
                    <div style="align-self: flex-end; margin-top: 30px; margin-bottom: 10px;">
                        <button id="btn-revenue" class="progress-btn active">Revenue</button>
                        <button id="btn-profit" class="progress-btn">Net Profit</button>
                        <button id="btn-impact" class="progress-btn">Impact</button>
                    </div>
                    <canvas id="progressChart" height="180"></canvas>
                </div>
            </div>

        </div>



    </div>

         <!-- Latest Project Funds -->
<div class="project-funds-box">
    <div class="table-responsive">
        <h5><strong>Latest Project Funds</strong></h5>
        </div>
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th style="background-color: #1F2A69; color: white; border-top-left-radius: 12px;">No.</th>
                    <th style="background-color: #1F2A69; color: white;">Project Name</th>
                    <th style="background-color: #1F2A69; color: white;">Time</th>
                    <th style="background-color: #1F2A69; color: white;">Sent By</th>
                    <th style="background-color: #1F2A69; color: white;">Sender Bank Account</th>
                    <th style="background-color: #1F2A69; color: white;">Amount</th>
                    <th style="background-color: #1F2A69; color: white;">Funding Type</th>
                    <th style="background-color: #1F2A69; color: white; border-top-right-radius: 12px;">Investment Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>Mikarta</td>
                    <td>02/10/2024</td>
                    <td>Mikarto</td>
                    <td>(BCA) 08855489267</td>
                    <td>IDR 15.000.000</td>
                    <td>Series C Funding</td>
                    <td>Crowdfunding</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Micarta</td>
                    <td>02/10/2024</td>
                    <td>Micarta</td>
                    <td>BCA</td>
                    <td>$3 Million</td>
                    <td>Series C Funding</td>
                    <td>Crowdfunding</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Mikarta</td>
                    <td>02/10/2024</td>
                    <td>Mikarta</td>
                    <td>BCA</td>
                    <td>$3 Million</td>
                    <td>Series C Funding</td>
                    <td>Crowdfunding</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Mikarta</td>
                    <td>02/10/2024</td>
                    <td>Mikarta</td>
                    <td>BCA</td>
                    <td>$3 Million</td>
                    <td>Series C Funding</td>
                    <td>Crowdfunding</td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Mikarta</td>
                    <td>02/10/2024</td>
                    <td>Mikarta</td>
                    <td>BCA</td>
                    <td>$3 Million</td>
                    <td>Series C Funding</td>
                    <td>Crowdfunding</td>
                </tr>
            </tbody>
        </table>
    <div class="table-pagination">
        <div class="pagination-info">
            <span>Row per page: 10</span>
            <span>Total = 1 - 10 of 200</span>
        </div>

        <!-- HANYA bagian ini yang dibungkus border -->
        <div class="pagination-nav">
            <span class="pagination-link">Previous</span>
            <span class="pagination-link active">1</span>
            <span class="pagination-link">2</span>
            <span class="pagination-ellipsis">...</span>
            <span class="pagination-link">12</span>
            <span class="pagination-link">13</span>
            <span class="pagination-link">Next</span>
        </div>
    </div>
    </div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('progressChart').getContext('2d');

    const chartData = {
        revenue: {
            label: "Revenue",
            data: [30, 50, 75, 40, 75],
            color: '#f59e0b',
        },
        profit: {
            label: "Net Profit",
            data: [20, 40, 50, 60, 62],
            color: '#1c2d59',
        },
        impact: {
            label: "Impact",
            data: [10, 25, 30, 32, 35],
            color: '#ef4444',
        }
    };

    let chartInstance = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
            datasets: [{
                label: chartData.revenue.label,
                data: chartData.revenue.data,
                backgroundColor: chartData.revenue.color,
                borderRadius: 8,
                barThickness: 24
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 20, color: '#6b7280' },
                    grid: { color: '#e5e7eb' }
                },
                x: {
                    ticks: { color: '#6b7280' },
                    grid: { display: false }
                }
            }
        }
    });

    // Toggle buttons
    const buttons = document.querySelectorAll('.progress-btn');
    buttons.forEach(btn => {
        btn.addEventListener('click', function () {
            buttons.forEach(b => b.classList.remove('active')); // reset all
            this.classList.add('active'); // activate current

            const type = this.id.replace('btn-', '');
            updateChart(chartData[type]);
        });
    });

    function updateChart(dataSet) {
        chartInstance.data.datasets[0].data = dataSet.data;
        chartInstance.data.datasets[0].label = dataSet.label;
        chartInstance.data.datasets[0].backgroundColor = dataSet.color;
        chartInstance.update();
    }
</script>



@endsection
