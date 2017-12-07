<h2>Editar Agendamento</h2>



<form action="/edit/agendamento" method="post">






  <label for="data">Data: </label>

  <input type="text" name="data" id="birthdate" placeholder="dd/mm/YYYY" value="<?php echo dateConvert($agendar['data']) ?>">




  <div class="row">
    <div class="input-field col s6">
      <label for="hora">Hora: </label>

      <input type="text" name="hora" value="<?php echo $agendar['hora']; ?>" id="hora">
    </div>
    <div class="input-field col s6">
      <label for="paciente">Paciente: </label>

      <input type="text" name="paciente" id="paciente" value="<?php echo $agendar['paciente']; ?>" >
    </div>
  </div>



  <div class="row">
    <div class="input-field col s6">
      <label for="medico">Medico: </label>
      <input type="text" name="medico" value="<?php echo $agendar['medico']; ?>" id="medico">
    </div>

  </div>




  <input type="hidden" name="id" value="<?php echo $medic['id'] ?>">

  <input type="submit" value="Atualizar">
</form>
