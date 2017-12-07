<h2>Edição de Médicos</h2>

<form action="/edit/medicos" method="post">

    <div class="box-body">
        <div class="form-group">
            <div class="row">
                <div class="col-xs-7 ">
                    <label for="name">Nome Completo</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome"
                           value="<?php echo $medic['name']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="gener_m">Masculino</label>
            <input type="radio" name="gender" id="gener_m"
                   value="m" <?php if ($medic['gender'] == 'm'): ?> checked="checked" <?php endif; ?>>
            <label for="gener_f">Feminino</label>
            <input type="radio" name="gender" id="gener_f"
                   value="f" <?php if ($medic['gender'] == 'f'): ?> checked="checked" <?php endif; ?>>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-4">
                    <label for="endereco">Endereço</label>
                    <input type="text"  class="form-control" placeholder="endereco"id="endereco" name="endereco"
                           value="<?php echo $medic['endereco']; ?>" >
                </div>
                <div class="col-xs-4">
                    <label for="bairro">Bairro</label>
                    <input type="text"  class="form-control" id="bairro" name="bairro" placeholder="bairro"
                           value="<?php echo $medic['bairro']; ?>" >

                </div>
            </div>
        </div>




        <div class="form-group">
            <div class="row">
                <div class="col-xs-3">
                    <label for="cep">Cep</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="cep"
                           value="<?php echo $medic['cep']; ?>">
                </div>
                <div class="col-xs-5">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="complemento"
                           value="<?php echo $medic['complemento']; ?>">
                </div>

            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-4">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="cpf"
                           value="<?php echo $medic['cpf']; ?>">
                </div>
                <div class="col-xs-4">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg" placeholder="rg"
                           value="<?php echo $medic['rg']; ?>">
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-4">
                    <label for="birthdate">Data de nascimento</label>
                    <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="data nascimento"
                           value="<?php echo dateConvert($medic['birthdate']) ?>">
                </div>
                <div class="col-xs-4">
                    <label for="naturalidade">Naturalidade</label>
                    <input type="text" class="form-control" id="naturalidade" name="naturalidade" placeholder="naturalidade"
                           value="<?php echo $medic['naturalidade']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-4">
                    <label for="nacionalidade">Nacionalidade</label>
                    <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" placeholder="nacionalidade"
                           value="<?php echo $medic['nacionalidade']; ?>">
                </div>
                <div class="col-xs-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email"
                           value="<?php echo $medic['email']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-4">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" placeholder="celular"
                           value="<?php echo $medic['celular']; ?>">
                </div>
                <div class="col-xs-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="telefone"
                           value="<?php echo $medic['telefone']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-3">
                    <label for="trabalho">Trabalho</label>
                    <input type="text" class="form-control" id="trabalho" name="trabalho" placeholder="trabalho"
                           value="<?php echo $medic['trabalho']; ?>">
                </div>
                <div class="col-xs-5">
                    <label for="especialidade">Especialidade</label>
                    <input type="text" class="form-control" id="especialidade" name="especialidade" placeholder="especialidade"
                           value="<?php echo $medic['especialidade']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-3">
                    <label for="crm">CRM</label>
                    <input type="text" class="form-control" id="crm" name="crm" placeholder="crm"
                           value="<?php echo $medic['crm']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-6">
                    <label for="idestado">Estado: </label>
                    <select class="form-control" id="idestado" name="idestado" onChange="showHint(this.value)">
                        <option value="" disabled selected>Escolha o Estado</option>
                        <?php foreach ($estados as $estado): ?>
                            <option value="<?php echo $estado['id']; ?>">
                                <?php echo $estado['nome']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>


                </div>
                <div class="col-xs-6">
                    <label for="idcidade">Cidades: </label>
                    <select class="form-control" name="idcidade"  disabled id="idcidade">

                        <option>Escolha a cidade</option>

                    </select>



                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $medic['id'] ?>">

    <div class="box-footer">

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
</form>








