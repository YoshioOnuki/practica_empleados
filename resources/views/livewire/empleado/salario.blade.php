<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Empleados
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row g-3">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Salarios del Empleado</h3>
                        </div>
                        <div class="card-body">
                            <div class="row row-cards">
                                <div class="mb-3 col-sm-4 col-md-3">
                                    <label for="salario_nuevo" class="form-label required">
                                        Salario nuevo
                                    </label>
                                    <input type="number" class="form-control @error('salario_nuevo') is-invalid @enderror"
                                        id="salario_nuevo" wire:model="salario_nuevo" placeholder="Ingrese el salario nuevo">
                                </div>
                                <div class="mb-3 col-sm-4 col-md-3">
                                    <label for="salario_actual" class="form-label">
                                        Salario actual
                                    </label>
                                    <input type="number" class="form-control"
                                        id="salario_actual" wire:model="salario_actual" disabled>
                                </div>
                                <div class="mb-3 col-sm-4 col-md-6 d-flex align-items-end">
                                    <button class="btn btn-primary" wire:click="guardar">Guardar</button>
                                </div>


                            </div>
                            <div class="form-label">Historial de salarios</div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Salario</th>
                                            <th>Salario anterior</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($salarios as $item)
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control"
                                                id="salario_actual"  value="{{ $item->salario_act_histo }}" disabled>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                id="salario_anterior" value="{{ $item->salario_ant_histo ?? 'N/A'}}" disabled>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                id="fecha" value="{{ $item->fecha_cambio_histo }}" disabled>
                                            </td>
                                        </tr>
                                    @empty
                                        @if ($salarios->count() === 0)
                                            <tr>
                                                <td colspan="7">
                                                    <div class="text-center"
                                                        style="padding-bottom: 1rem; padding-top: 1rem;">
                                                        <span class="text-secondary">
                                                            No hay historial de salarios registrados del empleado
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('empleados') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
