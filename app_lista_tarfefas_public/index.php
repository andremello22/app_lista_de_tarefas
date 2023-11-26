<?php
$acao = 'recuperarTarefasPendentes';
require 'tarefa_controller.php';
//print_r($tarefas);
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		
		<script>
			function editar(id, txt_tarefa){
				let form = document.createElement('form');
				form.action = 'index.php?pag=index&acao=atualizar';
				form.method = 'post';
				form.className = 'row';

				let input_tarefa = document.createElement('input');
				input_tarefa.type = 'text';
				input_tarefa.name = 'tarefa';
				input_tarefa.className = 'col-9 form-control';
				input_tarefa.value = txt_tarefa;

				let input_id = document.createElement('input');
				input_id.type = 'hidden';
				input_id.name ='id';
				input_id.value = id;

				let button_tarefa = document.createElement('button');
				button_tarefa.type = 'submit';
				button_tarefa.className = 'col-3 btn btn-info';
				button_tarefa.innerHTML = 'atualizar';
				
				form.appendChild(input_tarefa);
				form.appendChild(input_id);
				form.appendChild(button_tarefa);
			
				
				//console.log(form);
				let tarefa = document.getElementById('tarefa_'+id);

				tarefa.innerHTML = '';

				tarefa.insertBefore(form, tarefa[0]);
				//alert(txt_tarefa);

			}

			function remover(id){
				location.href = 'index.php?pag=index&acao=remover&id='+id;
			}

			function marcarRealizada(id){
				location.href = 'index.php?pag=index&acao=marcarRealizada&id='+id;	
			}
		</script>

	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Tarefas pendentes</h4>
								<?php
									foreach($tarefas as $indice=>$tarefa){ ?>
											<div class="row mb-3 d-flex align-items-center tarefa">
											<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>"><?= $tarefa->tarefa .' ('.$tarefa->status.')'?></div>
											<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>	
											<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa?>')"></i>
											<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>
											 </div>
											</div>
								<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>