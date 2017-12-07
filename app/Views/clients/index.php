<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

</html>


<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Visualizar Pacientes
            <small>
                <a href="/add/clients" </a>
                <span class="glyphicon glyphicon-user"></span> Adicionar Paciente
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Visualizar</a></li>
            <li class="active">Pacientes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Sexo</th>
                                <th>Data de Nascimento</th>
                                <th>Idade</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($clients as $client): ?>






                                <tr>

                                    <td><?php echo $client['name']; ?></td>


                                    <td><?php echo $client['email']; ?></td>


                                    <td><?php echo $client['gender'] == 'm' ? 'Masculino' : 'Feminino'; ?></td>


                                    <td><?php echo dateConvert($client['birthdate']); ?></td>


                                    <td><?php echo calculateAge($client['birthdate']); ?> anos</td>


                                    <td>

                                        <a href="/edit/<?php echo $client['id']; ?>" class="btn btn-info btn-l">
                                            <span class="glyphicon glyphicon-pencil"></span> Ed
                                        </a></a>

                                        <a href="/remove/client/<?php echo $client['id']; ?>"
                                           onclick="return confirm('Tem certeza de que deseja remover?');"
                                           class="btn btn-danger btn-ld"</a>
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </td>

                                </tr>

                            <?php endforeach; ?>


                            </tbody>

                        </table>


                    </div>

                </div>


            </div>

        </div>

    </section>

</div>












