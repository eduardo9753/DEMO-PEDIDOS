<div>
    <!-- FORMULARIO PARA CREAR UN PRODUCTO -->
    @if (!$account_id)
        <form wire:submit.prevent="create">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">facebook:</label>
                        <input wire:model="facebook" type="text" class="form-control" placeholder="Ingrese el nombre">
                        @error('facebook')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">instagram:</label>
                        <input wire:model="instagram" type="text" class="form-control" placeholder="instagram">
                        @error('instagram')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">twitter:</label>
                        <input wire:model="twitter" type="text" class="form-control" placeholder="twitter">
                        @error('twitter')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">tiktok:</label>
                        <input wire:model="tiktok" type="text" class="form-control" placeholder="tiktok">
                        @error('tiktok')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">youtube:</label>
                        <input wire:model="youtube" type="text" class="form-control" placeholder="youtube">
                        @error('youtube')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">linkedin:</label>
                        <input wire:model="linkedin" type="text" class="form-control" placeholder="linkedin">
                        @error('linkedin')
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
    @if ($account_id)
        <form wire:submit.prevent="update">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">facebook:</label>
                        <input wire:model="facebook" type="text" class="form-control"
                            placeholder="Ingrese el nombre">
                        @error('facebook')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">instagram:</label>
                        <input wire:model="instagram" type="text" class="form-control" placeholder="instagram">
                        @error('instagram')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">twitter:</label>
                        <input wire:model="twitter" type="text" class="form-control" placeholder="twitter">
                        @error('twitter')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">tiktok:</label>
                        <input wire:model="tiktok" type="text" class="form-control" placeholder="tiktok">
                        @error('tiktok')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">youtube:</label>
                        <input wire:model="youtube" type="text" class="form-control" placeholder="youtube">
                        @error('youtube')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group my-2">
                        <label for="">linkedin:</label>
                        <input wire:model="linkedin" type="text" class="form-control" placeholder="linkedin">
                        @error('linkedin')
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
                    <th>facebook</th>
                    <th>instagram</th>
                    <th>tiktok</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $account->id }}</td>
                        <td>{{ $account->facebook }}</td>
                        <td>{{ $account->instagram }}</td>
                        <td>{{ $account->tiktok }}</td>
                        <td>
                            <button class="btn btn-primary" wire:click="edit({{ $account->id }})">Editar</button>
                            <button class="btn btn-danger" wire:click="delete({{ $account->id }})">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</div>
