<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title ?? 'Sistema de Gestión de Empleados' }}</title>

    <link rel="shortcut icon" href="{{ asset('media/icon.webp') }}" type="image/x-icon">

    <link href="{{ asset('assets/dist/css/tabler.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/demo.min.css?1684106062') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <style>
        :root {
            --tblr-font-sans-serif: 'Inter', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    <!-- Tabler Core -->
    <script src="{{ asset('assets/dist/js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('assets/dist/js/demo.min.js?1684106062') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="{{ asset('assets/dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062') }}" defer></script>
</head>


<body>
    <script src="{{ asset('assets/dist/js/demo-theme.min.js?1684106062') }}"></script>

    <script>
        document.addEventListener('livewire:navigated', () => {
            var notyf = new Notyf();
            window.addEventListener('toast-basico', event => {
                if (event.detail.type == 'success') {
                    notyf.success({
                        message: event.detail.mensaje,
                        duration: 5000,
                        position: {
                            x: 'center',
                            y: 'top',
                        },
                        dismissible: true
                    });
                } else {
                    notyf.error({
                        message: event.detail.mensaje,
                        duration: 5000,
                        position: {
                            x: 'center',
                            y: 'top',
                        },
                        dismissible: true
                    });
                }
            })

            window.addEventListener('modal', event => {
                $(event.detail.modal).modal(event.detail.action)
            })
        })
    </script>

    <div class="page">

        <livewire:components.header />

        <div class="page-wrapper">
            
            {{ $slot }}

            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">

                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2024
                                    <a href="." class="link-primary fw-bold">Bianca A.</a>.
                                    Todos los derechos reservados.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Your report name">
                    </div>
                    <label class="form-label">Report type</label>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1"
                                    class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Simple</span>
                                        <span class="d-block text-muted">Provide only basic data needed for the
                                            report</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1"
                                    class="form-selectgroup-input">
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Advanced</span>
                                        <span class="d-block text-muted">Insert charts and additional advanced
                                            analyses to be inserted in the report</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Report url</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        https://tabler.io/reports/
                                    </span>
                                    <input type="text" class="form-control ps-0" value="report-01"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Visibility</label>
                                <select class="form-select">
                                    <option value="1" selected>Private</option>
                                    <option value="2">Public</option>
                                    <option value="3">Hidden</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Client name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Reporting period</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Additional information</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Create new report
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
