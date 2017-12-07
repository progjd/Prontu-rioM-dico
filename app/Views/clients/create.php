    <form action="/add/clients" method="post">

        <div class="box-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12 ">
                        <label for="name">Nome Completo</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gener_m">Masculino</label>
                <input type="radio" name="gender" id="gener_m" value="m">
                <label for="gener_f">Feminino</label>
                <input type="radio" name="gender" id="gener_f" value="f">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <label for="endereco">Endereço</label>
                        <input type="text"  class="form-control" name="endereco" id="endereco" placeholder="endereco">
                    </div>
                    <div class="col-xs-6">
                        <label for="bairro">Bairro</label>
                        <input type="text"  class="form-control" name="bairro" id="bairro" placeholder="bairro">
                    </div>
                </div>
            </div>



            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <label for="cep">Cep</label>
                        <input type="text" class="form-control" name="cep" id="cep" placeholder="cep">
                    </div>
                    <div class="col-xs-6">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" name="complemento" id="complemento" placeholder="complemento">
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" placeholder="cpf">
                    </div>
                    <div class="col-xs-6">
                        <label for="rg">RG</label>
                        <input type="text" class="form-control" name="rg" id="rg" placeholder="">
                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <label for="birthdate">Data de nascimento</label>
                        <input type="text" class="form-control" name="birthdate" id="birthdate" placeholder="">
                    </div>
                    <div class="col-xs-6">
                        <label for="naturalidade">Naturalidade</label>
                        <input type="text" class="form-control" name="naturalidade" id="naturalidade" placeholder="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <label for="nacionalidade">Nacionalidade</label>
                        <input type="text" class="form-control" name="nacionalidade" id="nacionalidade" placeholder="">
                    </div>
                    <div class="col-xs-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Entre email">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" name="celular" id="celular" placeholder="">
                    </div>
                    <div class="col-xs-6">
                        <label for="telefone">Telefone</label>
                        <input type="text"  class="form-control" id="telefone" name="telefone"placeholder="">
                    </div>
                </div>
            </div>



        <div class="form-group">
            <div class="row">
                <div class="col-xs-6">
                    <label for="nomeMae">Nome da Mãe</label>
                    <input type="text" name="nomeMae" class="form-control" id="nomeMae" placeholder="Nome da Mãe">
                </div>
                <div class="col-xs-6">
                    <label for="nomePai">Nome do Pai</label>
                    <input type="text" name="nomePai" class="form-control" id="nomePai" placeholder="Nome do Pai">
                </div>
            </div>
        </div>
      </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-12 ">
                    <label for="tipoSanguineo">Tipo Sanguíneo</label>
                    <input type="text" class="form-control" name="tipoSanguineo" id="tipoSanguineo" placeholder="CRM">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-6">
                    <label for="estado">Estado: </label>
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
                    <select class="form-control" name="idcidade" disabled id="idcidade">

                        <option>Escolha a cidade</option>

                    </select>



                </div>
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>