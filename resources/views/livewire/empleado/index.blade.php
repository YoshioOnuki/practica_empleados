<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Empleados
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('empleados.crear') }}" class="btn btn-primary d-none d-sm-inline-block">
                            Registrar
                        </a>
                        <a href="{{ route('empleados.crear') }}" class="btn btn-primary d-sm-none btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="page-body">
        <div class="container-xl">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card animate__animated animate__fadeIn animate__faster">
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-secondary">
                                    Mostrar
                                    <div class="mx-2 d-inline-block">
                                        <select wire:model.live="mostrar_paginate" class="form-select form-select-sm">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                        </select>
                                    </div>
                                    entradas
                                </div>
                                <div class="ms-auto text-secondary">
                                    Buscar:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm"
                                            wire:model.live.debounce.500ms="search" aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap table-striped  datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1">No.</th>
                                        <th>Empleado</th>
                                        <th>Salario</th>
                                        <th>Fecha Ingreso</th>
                                        <th>Area</th>
                                        <th>Modalidad</th>
                                        <th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($empleados as $item)
                                        <tr>
                                            <td>
                                                <span class="text-secondary">{{ $i++ }}</span>
                                            </td>
                                            <td>
                                                {{ $item->nombre_completo }}
                                            </td>
                                            <td>
                                                {{ $item->salario_emp }}
                                            </td>
                                            <td>
                                                {{ formatFecha($item->fecha_ingreso_emp) }}
                                            </td>
                                            <td>
                                                {{ $item->area->nombre_area }}
                                            </td>
                                            <td>
                                                {{ $item->modalidad->nombre_moda }}
                                            </td>
                                            <td>
                                                @if ($item->estado_emp == 1)
                                                    Contratado
                                                @else
                                                    Inactivo
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a wire:click="datos({{ $item->id_emp }}, 'ver')"
                                                        class="btn btn-outline-cyan btn-sm">
                                                        Ver
                                                    </a>
                                                    <a wire:click="datos({{ $item->id_emp }}, 'editar')"
                                                        class="btn btn-outline-primary btn-sm">
                                                        Editar
                                                    </a>
                                                    <a href="{{ route('empleados.salario', $item->id_emp) }}"
                                                        class="btn btn-outline-green btn-sm">
                                                        Salario
                                                    </a>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        @if ($empleados->count() == 0 && $search != '')
                                            <tr>
                                                <td colspan="7">
                                                    <div class="text-center"
                                                        style="padding-bottom: 5rem; padding-top: 5rem;">
                                                        <span class="text-secondary">
                                                            No se encontraron resultados para
                                                            "<strong>{{ $search }}</strong>"
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="7">
                                                    <div class="text-center"
                                                        style="padding-bottom: 5rem; padding-top: 5rem;">
                                                        <span class="text-secondary">
                                                            No hay empleados registrados
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer {{ $empleados->hasPages() ? 'py-0' : '' }}">
                            @if ($empleados->hasPages())
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center text-secondary">
                                        Mostrando {{ $empleados->firstItem() }} - {{ $empleados->lastItem() }} de
                                        {{ $empleados->total() }} registros
                                    </div>
                                    <div class="mt-3">
                                        {{ $empleados->links() }}
                                    </div>
                                </div>
                            @else
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center text-secondary">
                                        Mostrando {{ $empleados->firstItem() }} - {{ $empleados->lastItem() }} de
                                        {{ $empleados->total() }} registros
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
