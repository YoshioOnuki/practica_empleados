<div class="page page-center">
    <div class="container container-normal py-4">
        <div class="row align-items-center g-4">
            <div class="col-lg">
                <div class="container-tight">
                    <div class="text-center mb-4">
                        <a href="." class="navbar-brand navbar-brand-autodark">
                            <span class="text-primary fw-bold fs-2">
                                Sistema de Gestión de Empleados
                            </span>
                        </a>
                    </div>
                    <div class="card card-md">
                        <div class="card-body">
                            <h2 class="h2 text-center mb-4">Iniciar Sesión</h2>
                            <form wire:submit.prevent="iniciar_sesion" class="row g-3" autocomplete="off" novalidate>
                                <div class="col-md-12">
                                    <label class="form-label required">
                                        Usuario
                                    </label>
                                    <input id="usuario" type="email"
                                        class="form-control @error('usuario') is-invalid @enderror"
                                        wire:model.live="usuario" placeholder="example_usuario" autocomplete="off">
                                    @error('usuario')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="contraseña">
                                        Contraseña <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-flat" x-data="{ modo_password: 'password' }">
                                        <input id="contraseña" x-bind:type="modo_password"
                                            class="form-control @error('contraseña') is-invalid @enderror" wire:model.live="contraseña"
                                            placeholder="********" autocomplete="off">
                                        <span class="input-group-text @error('contraseña') border border-danger @enderror">
                                            <a style="cursor: pointer;" class="link-secondary"
                                                x-on:click="modo_password == 'password' ? modo_password = 'text' : modo_password = 'password'">
                                                <svg x-show="modo_password == 'text'" xmlns="http://www.w3.org/2000/svg" class="icon"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                    <path
                                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                </svg>
                                                <svg x-show="modo_password == 'password'" xmlns="http://www.w3.org/2000/svg"
                                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                                                    <path
                                                        d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                                                    <path d="M3 3l18 18" />
                                                </svg>
                                            </a>
                                        </span>
                                    </div>
                                    @error('contraseña')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-blue w-100">
                                        Ingresar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg d-none d-lg-block">
                <img src="/assets/static/illustrations/undraw_quitting_time_dm8t.svg" height="400"
                    class="d-block mx-auto" alt="">
            </div>
        </div>
    </div>
</div>