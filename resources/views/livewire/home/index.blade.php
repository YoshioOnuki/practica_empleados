<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Home
                    </div>
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">

                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Gastos en salarios</div>
                            </div>
                            <div class="h1 mb-3">
                                S/. 63,982
                            </div>
                            <div class="d-flex mb-2">
                                <div>Crecimiento</div>
                                <div class="ms-auto">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        7%
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1"
                                            width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 17l6 -6l4 4l8 -8" />
                                            <path d="M14 7l7 0l0 7" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    aria-label="75% Complete">
                                    <span class="visually-hidden">75% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Empleados</div>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <div class="h1 mb-0 me-2">{{ $cant_empleados }}</div>
                                <div class="me-auto">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        +1
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1"
                                            width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 17l6 -6l4 4l8 -8" />
                                            <path d="M14 7l7 0l0 7" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="chart-revenue-bg" class="chart-sm"></div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Áreas</div>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <div class="h1 mb-3 me-2">6</div>
                                <div class="me-auto">
                                    <span class="text-yellow d-inline-flex align-items-center lh-1">
                                        +0
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1"
                                            width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l14 0" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div id="chart-new-clients" class="chart-sm"></div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Modalidades</div>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <div class="h1 mb-3 me-2">2</div>
                            </div>
                            <div id="chart-active-users" class="chart-sm"></div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card py-5">
                        <div class=" d-flex align-items-center justify-content-center py-5">
                            <h3 class="card-title fs-1 fw-bold">
                                Bienvenidos al Sistema de Gestión de Empleados
                            </h3>
                        </div>
                        <div class="">
                            <img src="/assets/static/illustrations/undraw_quitting_time_dm8t.svg" height="230"
                                class="d-block mx-auto" alt="">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
