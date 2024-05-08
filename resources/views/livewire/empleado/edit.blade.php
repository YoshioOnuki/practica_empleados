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
            {{-- <div wire:init="mostrar_toast"></div> --}}
            <div class="row g-3">
                <div class="col-12">
                    <form class="card" wire:submit="guardar">
                        <div class="card-body">
                            <h3 class="card-title">Editar empleado</h3>
                            <div class="row row-cards">
                                    <div class="col-lg-3">
                                        <label for="documento" class="form-label {{ $modo === 'ver' ? '' : 'required' }}">
                                            Documento
                                        </label>
                                        <input type="number"
                                            class="form-control @error('documento') is-invalid @enderror"
                                            id="documento" wire:model.live="documento"
                                            placeholder="Example: 00000000" {{ $modo == 'ver' ? 'disabled' : '' }} />
                                        @error('documento')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    @if($modo == 'ver')
                                        <div class="col-lg-3">
                                            <label for="edad" class="form-label">
                                                Edad
                                            </label>
                                            <input type="text"
                                                class="form-control @error('edad') is-invalid @enderror"
                                                id="edad" wire:model.live="edad" disabled />
                                            @error('edad')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    @endif
                                    <div class="col-lg-3">
                                        <label for="fecha_nacimiento" class="form-label {{ $modo === 'ver' ? '' : 'required' }}">
                                            Fecha de Nacimiento
                                        </label>
                                        @if($modo == 'ver')
                                            <input class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                                id="fecha_nacimiento" wire:model.live="fecha_nacimiento" disabled/>
                                        @else
                                            <input type="date"
                                                class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                                id="fecha_nacimiento" wire:model.live="fecha_nacimiento"
                                                max="{{ date('Y-m-d') }}"/>
                                            @error('fecha_nacimiento')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endif
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="apellido_paterno" class="form-label {{ $modo === 'ver' ? '' : 'required' }}">
                                            Apellido Paterno
                                        </label>
                                        <input type="text"
                                            class="form-control @error('apellido_paterno') is-invalid @enderror"
                                            id="apellido_paterno" wire:model.live="apellido_paterno"
                                            placeholder="Ingrese su apellido paterno" {{ $modo == 'ver' ? 'disabled' : '' }} />
                                        @error('apellido_paterno')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="apellido_materno" class="form-label {{ $modo === 'ver' ? '' : 'required' }}">
                                            Apellido Materno
                                        </label>
                                        <input type="text"
                                            class="form-control @error('apellido_materno') is-invalid @enderror"
                                            id="apellido_materno" wire:model.live="apellido_materno"
                                            placeholder="Ingrese su apellido materno" {{ $modo == 'ver' ? 'disabled' : '' }} />
                                        @error('apellido_materno')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="nombre" class="form-label {{ $modo === 'ver' ? '' : 'required' }}">
                                            Nombres
                                        </label>
                                        <input type="text"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            id="nombre" wire:model.live="nombre"
                                            placeholder="Ingrese su nombre" {{ $modo == 'ver' ? 'disabled' : '' }} />
                                        @error('nombre')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="genero" class="form-label {{ $modo === 'ver' ? '' : 'required' }}">
                                            Genero
                                        </label>
                                        @if($modo == 'ver')
                                            <input type="text"
                                                class="form-control @error('genero') is-invalid @enderror"
                                                id="genero" wire:model.live="genero" disabled />
                                        @else
                                            <select class="form-select @error('genero') is-invalid @enderror"
                                                id="genero" wire:model.live="genero">
                                                <option value="">
                                                    Seleccione un género
                                                </option>
                                                <option value="M" {{ $genero === 'M' ? 'selected' : '' }}>Masculino</option>
                                                <option value="F" {{ $genero === 'F' ? 'selected' : '' }}>Femenino</option>
                                            </select>
                                        @endif
                                        @error('genero')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="area" class="form-label {{ $modo === 'ver' ? '' : 'required' }}">
                                            Área
                                        </label>
                                        @if($modo == 'ver')
                                        <input class="form-control @error('area') is-invalid @enderror"
                                            id="area" wire:model.live="area" disabled/>
                                        @else
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
                                        @endif
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="modalidad" class="form-label {{ $modo === 'ver' ? '' : 'required' }}">
                                            Modalidad
                                        </label>
                                        @if($modo == 'ver')
                                            <input class="form-control @error('modalidad') is-invalid @enderror"
                                                id="modalidad" wire:model.live="modalidad" disabled/>
                                        @else
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
                                        @endif
                                    </div>
                                    @if($modo == 'ver')
                                        <div class="col-lg-3">
                                            <label for="salario" class="form-label">
                                                Salario
                                            </label>
                                            <input type="number"
                                                class="form-control @error('salario') is-invalid @enderror"
                                                id="salario" wire:model.live="salario" disabled/>
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
                                            <input class="form-control @error('fecha_ingreso') is-invalid @enderror"
                                                id="fecha_ingreso" wire:model.live="fecha_ingreso" disabled/>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="ant_empresa" class="form-label">
                                                Antigüedad en la Empresa
                                            </label>
                                            <input class="form-control @error('ant_empresa') is-invalid @enderror"
                                                id="ant_empresa" wire:model.live="ant_empresa" disabled/>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if($modo != 'ver')
                                <div class="card-footer text-end d-flex justify-content-between">
                                    <a href="{{ route('empleados') }}" class="btn btn-secondary">Regresar</a>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            @else
                                <div class="card-footer text-end">
                                    <a href="{{ route('empleados') }}" class="btn btn-secondary">Regresar</a>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
