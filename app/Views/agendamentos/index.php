<h1>Listagem de Agendamentos</h1>




<a href="/add/agendamentos">Adicionar Agendamento</a>



<?php if (count($agendamentos) > 0): ?>


<table width="50%" border="1" cellpadding="2" cellspacing="0">



<tbody>
        <?php foreach ($agendamentos as $agendar): ?>






<tr>


<td><?php echo dateConvert($agendamentos['data']); ?></td>


<td><?php echo $agendamentos['hora']; ?></td>


<td><?php echo $agendamentos['paciente']; ?></td>


<td><?php echo $agendamentos['medico']; ?></td>


<td>
                <a href="/edit/agendamentos/<?php echo $agendamentos['id']; ?>">Editar</a>
                <a href="/remove/agendamentos/<?php echo $agendamentos['id']; ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
            </td>

        </tr>

        <?php endforeach; ?>
    </tbody>

</table>


<?php else: ?>



Nenhum Agendamento


<?php endif; ?>
