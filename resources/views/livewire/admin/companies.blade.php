<div>
    <!-- FORMULARIO PARA CREAR UN PRODUCTO -->
    @if (!$company_id)
        <form wire:submit.prevent="create">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">Nombre:</label>
                        <input wire:model="razon_social_empresa" type="text" class="form-control"
                            placeholder="Ingrese el nombre">
                        @error('razon_social_empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">RUC:</label>
                        <input wire:model="numero_ruc_empresa" type="text" class="form-control" placeholder="# RUC">
                        @error('numero_ruc_empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">Dirección:</label>
                        <input wire:model="direccion_empresa" type="text" class="form-control"
                            placeholder="dirección">
                        @error('direccion_empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group my-2">
                        <label for="">Mapa de la empresa:</label>
                        <textarea wire:model='mapa_empresa' class="form-control" cols="30" rows="5"></textarea>
                        @error('mapa_empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">Número uno whatsapp:</label>
                        <input wire:model="numero_uno_empresa" type="text" class="form-control" placeholder="número">
                        @error('numero_uno_empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">Número dos whatsapp:</label>
                        <input wire:model="numero_dos_empresa" type="text" class="form-control" placeholder="número">
                        @error('numero_dos_empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">Correo:</label>
                        <input wire:model="correo_empresa" type="email" class="form-control" placeholder="correo">
                        @error('correo_empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary w-100 mt-2">Crear</button>
        </form>
    @endif
    <!-- FORMULARIO PARA CREAR UN PRODUCTO -->


    <!-- FORMULARIO PARA ACTUALIZAR UN PRODUCTO -->
    @if ($company_id)
        <form wire:submit.prevent="update">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">Nombre:</label>
                        <input wire:model="razon_social_empresa" type="text" class="form-control"
                            placeholder="Ingrese el nombre">
                        @error('razon_social_empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">RUC:</label>
                        <input wire:model="numero_ruc_empresa" type="text" class="form-control" placeholder="# RUC">
                        @error('numero_ruc_empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">Dirección:</label>
                        <input wire:model="direccion_empresa" type="text" class="form-control"
                            placeholder="dirección">
                        @error('direccion_empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group my-2">
                        <label for="">Mapa de la empresa:</label>
                        <textarea wire:model='mapa_empresa' class="form-control" cols="30" rows="5"></textarea>
                        @error('mapa_empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">Número uno whatsapp:</label>
                        <input wire:model="numero_uno_empresa" type="text" class="form-control"
                            placeholder="número">
                        @error('numero_uno_empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">Número dos whatsapp:</label>
                        <input wire:model="numero_dos_empresa" type="text" class="form-control"
                            placeholder="número">
                        @error('numero_dos_empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">Correo:</label>
                        <input wire:model="correo_empresa" type="email" class="form-control" placeholder="correo">
                        @error('correo_empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary w-100 mt-2">Actualizar</button>
        </form>
    @endif
    <!-- FORMULARIO PARA ACTUALIZAR UN PRODUCTO -->


    {{-- TABLA DE DATOS --}}
    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered align-middle m-0">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>celular 1</th>
                    <th>dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->razon_social_empresa }}</td>
                        <td>{{ $company->numero_uno_empresa }}</td>
                        <td>{{ $company->direccion_empresa }}</td>
                        <td>
                            <button class="btn btn-primary" wire:click="edit({{ $company->id }})">Editar</button>
                            <button class="btn btn-danger" wire:click="delete({{ $company->id }})">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</div>
