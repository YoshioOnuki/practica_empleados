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
                    <form class="card" wire:submit="guardar">
                        <div class="card-body">
                            <h3 class="card-title">Registrar empleados</h3>
                            <div class="row row-cards">
                                    <div class="col-lg-3">
                                        <label for="documento" class="form-label required">
                                            Documento 
                                        </label>
                                        <input type="number"
                                            class="form-control @error('documento') is-invalid @enderror"
                                            id="documento" wire:model.live="documento"
                                            placeholder="99999999"/>
                                        @error('documento')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="fecha_nacimiento" class="form-label required">
                                            Fecha de Nacimiento
                                        </label>
                                        <input type="date"
                                            class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                            id="fecha_nacimiento" wire:model.live="fecha_nacimiento"
                                            max="{{ date('Y-m-d') }}"/>
                                        @error('fecha_nacimiento')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="apellido_paterno" class="form-label required">
                                            Apellido Paterno
                                        </label>
                                        <input type="text"
                                            class="form-control @error('apellido_paterno') is-invalid @enderror"
                                            id="apellido_paterno" wire:model.live="apellido_paterno"
                                            placeholder="Ingrese su apellido paterno"/>
                                        @error('apellido_paterno')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="apellido_materno" class="form-label required">
                                            Apellido Materno
                                        </label>
                                        <input type="text"
                                            class="form-control @error('apellido_materno') is-invalid @enderror"
                                            id="apellido_materno" wire:model.live="apellido_materno"
                                            placeholder="Ingrese su apellido materno" />
                                        @error('apellido_materno')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="nombre" class="form-label required">
                                            Nombres
                                        </label>
                                        <input type="text"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            id="nombre" wire:model.live="nombre"
                                            placeholder="Ingrese su nombre"/>
                                        @error('nombre')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="genero" class="form-label required">
                                            Genero
                                        </label>
                                        <select class="form-select @error('genero') is-invalid @enderror"
                                            id="genero" wire:model.live="genero">
                                            <option value="">
                                                Seleccione un género
                                            </option>
                                            <option value="M" {{ $genero === 'M' ? 'selected' : '' }}>Masculino</option>
                                            <option value="F" {{ $genero === 'F' ? 'selected' : '' }}>Femenino</option>
                                        </select>
                                        @error('genero')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="area" class="form-label required">
                                            Área
                                        </label>
                                        <select class="form-select @error('area') is-invalid @enderror"
                                            id="area" wire:model.live="area">
                                            <option value="">
                                                Seleccione un área
                                            </option>
                                            @foreach ($area_model as $item)
                                                <option value="{{ $item->id_area }}">
                                                    {{ $item->nombre_area }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('area')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="modalidad" class="form-label required">
                                            Modalidad
                                        </label>
                                        <select class="form-select @error('modalidad') is-invalid @enderror"
                                            id="modalidad" wire:model.live="modalidad">
                                            <option value="">
                                                Seleccione una modalidad
                                            </option>
                                            @foreach ($modalidad_model as $item)
                                                <option value="{{ $item->id_moda }}">
                                                    {{ $item->nombre_moda }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('modalidad')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="salario" class="form-label">
                                            Salario
                                        </label>
                                        <input type="number"
                                            class="form-control @error('salario') is-invalid @enderror"
                                            id="salario" wire:model.live="salario"/>
                                        @error('salario')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="fecha_ingreso" class="form-label">
                                            Fecha de Ingreso
                                        </label>
                                        <input type="date"
                                            class="form-control @error('fecha_ingreso') is-invalid @enderror"
                                            id="fecha_ingreso" wire:model.live="fecha_ingreso"
                                            min="{{ date('Y-m-d') }}"/>
                                        @error('fecha_ingreso')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end d-flex justify-content-between">
                                <a href="{{ route('empleados') }}" class="btn btn-secondary">Regresar</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
