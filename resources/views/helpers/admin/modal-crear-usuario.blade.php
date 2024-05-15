 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#ModalCreateUser">
     Crear Usuario
 </button>

 <!-- Modal -->
 <div class="modal fade" id="ModalCreateUser" tabindex="-1" aria-labelledby="ModalCreateUserLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="ModalCreateUserLabel">Crear
                     Nuevo Usuario</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="{{ route('admin.users.store') }}" method="POST">
                     @csrf
                     <div class="form-group mb-2">
                         <label for="" class="mb-1">Nombre del Usuario</label>
                         <input type="text" name="name" class="form-control">
                         @error('name')
                             <span class="text-danger error-text">{{ $message }}</span>
                         @enderror
                     </div>

                     <div class="form-group mb-2">
                         <label for="" class="mb-1">Correo del Usuario</label>
                         <input type="email" name="email" class="form-control">
                         @error('email')
                             <span class="text-danger error-text">{{ $message }}</span>
                         @enderror
                     </div>

                     <div class="form-group mb-2">
                         <label for="" class="mb-1">Contraseña del Usuario</label>
                         <input type="password" name="password" class="form-control">
                         @error('password')
                             <span class="text-danger error-text">{{ $message }}</span>
                         @enderror
                     </div>

                     <div>
                         <input type="submit" class="btn btn-success" value="Guardar Datos">
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
             </div>
         </div>
     </div>
 </div>
