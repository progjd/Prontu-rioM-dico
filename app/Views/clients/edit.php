<h2>Edição de Paciente</h2>


<form action="/edit" method="post">

    <div class="box-body">
        <div class="form-group">
            <div class="row">
                <div class="col-xs-7 ">
                    <label for="name">Nome Completo</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome"
                           value="<?php echo $client['name']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="gener_m">Masculino</label>
            <input type="radio" name="gender" id="gener_m"
                   value="m" <?php if ($client['gender'] == 'm'): ?> checked="checked" <?php endif; ?>>
            <label for="gener_f">Feminino</label>
            <input type="radio" name="gender" id="gener_f"
                   value="f" <?php if ($client['gender'] == 'f'): ?> checked="checked" <?php endif; ?>>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-4">
                    <label for="endereco">Endereço</label>
                    <input type="text"  class="form-control" placeholder="endereco"
                           value="<?php echo $client['endereco']; ?>" id="endereco" name="endereco">
                </div>
                <div class="col-xs-4">
                    <label for="bairro">Bairro</label>
                    <input type="text"  class="form-control" id="bairro" name="bairro" placeholder="bairro"
                           value="<?php echo $client['bairro']; ?>" >

                </div>
            </div>
        </div>




        <div class="form-group">
            <div class="row">
                <div class="col-xs-3">
                    <label for="cep">Cep</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="cep"
                           value="<?php echo $client['cep']; ?>">
                </div>
                <div class="col-xs-5">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="complemento"
                           value="<?php echo $client['complemento']; ?>">
                </div>

            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-4">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="cpf"
                           value="<?php echo $client['cpf']; ?>">
                </div>
                <div class="col-xs-4">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg" placeholder="rg"
                           value="<?php echo $client['rg']; ?>">
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-4">
                    <label for="birthdate">Data de nascimento</label>
                    <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="data nascimento"
                           value="<?php echo dateConvert($client['birthdate']) ?>">
                </div>
                <div class="col-xs-4">
                    <label for="naturalidade">Naturalidade</label>
                    <input type="text" class="form-control" id="naturalidade" name="naturalidade" placeholder="naturalidade"
                           value="<?php echo $client['naturalidade']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-4">
                    <label for="nacionalidade">Nacionalidade</label>
                    <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" placeholder="nacionalidade"
                           value="<?php echo $client['nacionalidade']; ?>">
                </div>
                <div class="col-xs-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email"
                           value="<?php echo $client['email']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-4">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" placeholder="celular"
                           value="<?php echo $client['celular']; ?>">
                </div>
                <div class="col-xs-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="telefone"
                           value="<?php echo $client['telefone']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-3">
                    <label for="nomePai">Pai</label>
                    <input type="text" class="form-control" id="nomePai" name="nomePai" placeholder="pai"
                           value="<?php echo $client['nomePai']; ?>">
                </div>
                <div class="col-xs-5">
                    <label for="nomeMae">Mãe</label>
                    <input type="text" class="form-control" id="nomeMae" name="nomeMae" placeholder="mae"
                           value="<?php echo $client['nomeMae']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-3">
                    <label for="tipoSanguineo">Tipo Sangue</label>
                    <input type="text" class="form-control" id="tipoSanguineo" name="tipoSanguineo" placeholder="tipoSanguineo"
                           value="<?php echo $client['tipoSanguineo']; ?>">
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
    <input type="hidden" name="id" value="<?php echo $client['id'] ?>">

    <div class="box-footer">

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
</form>
