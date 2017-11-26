<!-- Modal -->
<div class="modal fade" id="usermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalle Paciente</h4>
      </div>
      <div class="modal-body">
        <p><strong>Cédula:</strong> <span>{{$usuario->cedula}}</span></p>
        <p><strong>Nombres:</strong> <span>{{$usuario->nombres}}</span></p>
        <p><strong>Apellidos:</strong> <span>{{$usuario->apellidos}}</span></p>
        <p><strong>Fecha registro:</strong> <span>{{date('M d, Y', strtotime($usuario->fecha_registro))}}</span></p>
        <p><strong>Tipo de usuario:</strong> <span>

        	{{$usuario->tipo}}

        </span></p>
      </div>
    </div>
  </div>
</div>