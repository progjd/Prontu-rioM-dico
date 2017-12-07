<h2>Agendamento</h2>



<form action="/add/agendamentos" method="post" >



    <div class="form-group">
        <div class="row">
            <div class="col-xs-4">
                <label for="data">Data do Atendimento</label>
                <input type="text" class="form-control" name="data" id="data" placeholder="data">
            </div>
            <div class="col-xs-4">
                <label for="hora">Hora</label>
                <input type="hora" class="form-control" name="hora" id="hora" placeholder="hora">
            </div>

        </div>
    </div>




  <div class="row">


      <div class="input-field col-xs-6">
          <label for="estado">Selecione seu Médico: </label>
          <select class="form-control" id="idmedico" name="idmedico" >
              <option value="" disabled selected>Escolha o Médico</option>
              <?php foreach ($medicos as $medico): ?>
                  <option value="<?php echo $medico['idmedico']; ?>">
                      <?php echo $medico['name']; ?>
                  </option>
              <?php endforeach; ?>
          </select>
        </div>
      </div>





      <div class="row">
        <div class="input-field col-xs-6">
            <label for="estado">Selecione seu Paciente: </label>
            <select class="form-control" id="idclient" name="idclient" onChange="showHint(this.value)">
                <option value="" disabled selected>Escolha o Paciente</option>
                <?php foreach ($pacientes as $paciente): ?>
                    <option value="<?php echo $paciente['idclient']; ?>">
                        <?php echo $paciente['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

      </div>





      <input type="submit" value="Agendar">
    </form>
