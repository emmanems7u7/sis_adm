@extends('layouts.app')

@section('content')

    <style>
        body {
            background-color: #9d9d9d !important;
        }

        .card-custom {
            margin-bottom: 20px;
        }

        .card-header-custom {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .icon-box {
            font-size: 2rem;
            color: #fff;
            border-radius: 50%;
            padding: 20px;
            background-color: #007bff;
        }

        .stat-box {
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .chart-container {
            position: relative;
            height: 250px;
            width: 100%;
        }
    </style>

    <div class="container-fluid p-4">
        <div class="row">
            <!-- Panel de estadísticas -->
            <div class="col-md-3">
                <div class="card stat-box">
                    <div class="card-header custom-card-header">
                        <div class="d-flex justify-content-between">
                            <h5>Total de Usuarios</h5>
                            <div class="icon-box"><i class="fas fa-users"></i></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="text-center">120</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-box">
                    <div class="card-header custom-card-header">
                        <div class="d-flex justify-content-between">
                            <h5>Total de Eventos</h5>
                            <div class="icon-box"><i class="fas fa-calendar-alt"></i></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="text-center">15</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-box">
                    <div class="card-header custom-card-header">
                        <div class="d-flex justify-content-between">
                            <h5>Inventario Usado</h5>
                            <div class="icon-box"><i class="fas fa-box-open"></i></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="text-center">80%</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-box">
                    <div class="card-header custom-card-header">
                        <div class="d-flex justify-content-between">
                            <h5>Recursos</h5>
                            <div class="icon-box"><i class="fas fa-cogs"></i></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="text-center">50</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráfico de Tortas (Estadísticas visuales) -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header custom-card-header">
                        <h5>Distribución de Eventos</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Listado de usuarios -->
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header custom-card-header">
                        <h5>Listado de Usuarios</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Correo Electrónico</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Juan Pérez</td>
                                    <td>juan@example.com</td>
                                    <td>Administrador</td>
                                    <td>
                                        <button class="btn btn-info btn-sm">Ver</button>
                                        <button class="btn btn-warning btn-sm">Editar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Ana González</td>
                                    <td>ana@example.com</td>
                                    <td>Usuario</td>
                                    <td>
                                        <button class="btn btn-info btn-sm">Ver</button>
                                        <button class="btn btn-warning btn-sm">Editar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Pedro Martínez</td>
                                    <td>pedro@example.com</td>
                                    <td>Usuario</td>
                                    <td>
                                        <button class="btn btn-info btn-sm">Ver</button>
                                        <button class="btn btn-warning btn-sm">Editar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Listado de eventos -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header custom-card-header">
                        <h5>Listado de Eventos</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre del Evento</th>
                                    <th>Fecha</th>
                                    <th>Inventario Usado</th>
                                    <th>Recursos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Evento Corporativo</td>
                                    <td>2025-03-01</td>
                                    <td>50%</td>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Concierto de Verano</td>
                                    <td>2025-06-15</td>
                                    <td>80%</td>
                                    <td>25</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Conferencia de Tecnología</td>
                                    <td>2025-09-10</td>
                                    <td>60%</td>
                                    <td>35</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Listado de Solicitudes por Aprobar -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header custom-card-header">
                        <h5>Solicitudes por Aprobar</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Solicitud #001</h6>
                                    <p><strong>Solicitante:</strong> Juan Pérez</p>
                                    <p><strong>Evento:</strong> Conferencia de Tecnología</p>
                                </div>
                                <div>
                                    <button class="btn btn-success btn-sm">Aprobar</button>
                                    <button class="btn btn-danger btn-sm">Rechazar</button>
                                </div>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Solicitud #002</h6>
                                    <p><strong>Solicitante:</strong> Ana González</p>
                                    <p><strong>Evento:</strong> Evento Corporativo</p>
                                </div>
                                <div>
                                    <button class="btn btn-success btn-sm">Aprobar</button>
                                    <button class="btn btn-danger btn-sm">Rechazar</button>
                                </div>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Solicitud #003</h6>
                                    <p><strong>Solicitante:</strong> Pedro Martínez</p>
                                    <p><strong>Evento:</strong> Concierto de Verano</p>
                                </div>
                                <div>
                                    <button class="btn btn-success btn-sm">Aprobar</button>
                                    <button class="btn btn-danger btn-sm">Rechazar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Listado de Solicitudes Aprobadas -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header custom-card-header">
                        <h5>Solicitudes Aprobadas automaticamente</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap">
                            <div class="card m-2" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Solicitud #001</h5>
                                    <p class="card-text"><strong>Evento:</strong> Conferencia de Tecnología</p>
                                    <p><strong>Solicitante:</strong> Juan Pérez</p>
                                    <p><strong>Fecha Aprobación:</strong> 2025-03-01</p>
                                </div>
                            </div>
                            <div class="card m-2" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Solicitud #002</h5>
                                    <p class="card-text"><strong>Evento:</strong> Evento Corporativo</p>
                                    <p><strong>Solicitante:</strong> Ana González</p>
                                    <p><strong>Fecha Aprobación:</strong> 2025-03-05</p>
                                </div>
                            </div>
                            <div class="card m-2" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Solicitud #003</h5>
                                    <p class="card-text"><strong>Evento:</strong> Concierto de Verano</p>
                                    <p><strong>Solicitante:</strong> Pedro Martínez</p>
                                    <p><strong>Fecha Aprobación:</strong> 2025-03-10</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Agregar Scripts de Bootstrap y Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Eventos Corporativos', 'Conciertos', 'Conferencias', 'Talleres'],
                datasets: [{
                    label: 'Distribución de Eventos',
                    data: [10, 3, 1, 1],
                    backgroundColor: ['#ff5733', '#33ff57', '#3357ff', '#f3f33b'],
                    hoverOffset: 4
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
                            label: function (tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' eventos';
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection