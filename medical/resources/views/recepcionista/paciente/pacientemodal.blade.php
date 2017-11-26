<!-- Modal -->
<div class="modal fade" id="pacientemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalle Paciente</h4>
      </div>
      <div class="modal-body">
        <p><strong>Cedula:</strong> <span>{{$p->cedula}}</span></p>
        <p><strong>Nombres:</strong> <span>{{$p->nombres}}</span></p>
        <p><strong>Apellidos:</strong> <span>{{$p->apellidos}}</span></p>
        <p><strong>Edad:</strong> <span>{{$p->edad}}</span></p>
        <p><strong>Sexo:</strong> <span>{{$p->sexo}}</span></p>
      </div>
    </div>
  </div>
</div>