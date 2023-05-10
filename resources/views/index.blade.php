<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema WEB</title>
        @vite([
                'resources/js/app.js', 
                'resources/css/app.css',
                'node_modules/bootstrap/dist/css/bootstrap.min.css',
                'node_modules/bootstrap/dist/js/bootstrap.bundle.js'
            ])
    </head>

    <body> 

    <!--container-->
	<div class="container">
		<div>
			&nbsp
		</div>
		<div class="row">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12 px-3">
				<a class="navbar-brand" href="{{url('/')}}">SISTEMA WEB</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="{{url('/')}}">Cadastrar</a> <!--href="{{url('/')}}" = voltar para a pag inicial-->
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('consultar')}}">Consultar</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="row">
			<div class="card mb-3 col-12">
				<div class="card-body">
					<h5 class="card-title">Cadastrar - Agendamento de Potenciais Clientes</h5>
					<p class="card-text">Sistema utilizado para agendamento de serviços.</p>
					<p>
                        <!--Tratamento de erro. Ex.: se caso os campos forem preenchidos de forma correta a aplicação retornarar uma mensagem de 'sucesso' e vice e versa-->
						@if(Session::has('sucesso'))
						<div class="alert alert-success" role="alert">
							{{Session::get('sucesso')}}
						</div>
						@endif
						<form method="POST" action="{{url('salvar-servicos')}}">
						@csrf

                            <!--campo nome-->
							<div class="form-group">
								@error('nome')
								<div class="alert alert-danger" role="alert">
									Campo obrigatório! <!--Emite um alerta mostrando para o usuário que este campo é obrigatório-->
								</div>
								@enderror
								<label for="lblNome">Nome:</label>
								<input class="form-control" type="text" name="nome" value="{{old('nome')}}">
								<br>
							</div>

                            <!--campo telefone-->
							<div class="form-group">
								@error('telefone')
								<div class="alert alert-danger" role="alert">
									O campo telefone é obrigatório.
								</div>
								@enderror
								<label for="lblTelefone">Telefone:</label>
								<input class="form-control"  type="tel" name="telefone" placeholder="(xx)xxxxx-xxxx"
								value="{{old('telefone')}}">
								<br>
							</div>

                            <!--campos de seleçaõ-->
							<div class="form-group">
								@error('origem')
								<div class="alert alert-danger" role="alert">
									Campo obrigatório! <!--Emite um alerta mostrando para o usuário que este campo é obrigatório-->
								</div>
								@enderror
								<label for="lblOrigem">Origem:</label>
								<select class="form-control" name="origem">
									<option selected disabled>{{ old('origem') }}</option>
									<option>Celular</option>
									<option>Fixo</option>
									<option>Whatsapp</option>
								</select>
								<br>
							</div>
                            
                            <!--campo data-->
							<div class="form-group">
								@error('datacont')
								<div class="alert alert-danger" role="alert">
									Campo obrigatório! <!--Emite um alerta mostrando para o usuário que este campo é obrigatório-->
								</div>
								@enderror
								<label for="lblData">Data do Contato:</label>
								<input class="form-control" type="date" name="datacont" value="{{old('datacont')}}">
								<br>
							</div>

                            <!--campo observações-->
							<div class="form-group">
								@error('obs')
								<div class="alert alert-danger" role="alert">
									Campo obrigatório! <!--Emite um alerta mostrando para o usuário que este campo é obrigatório-->
								</div>
								@enderror
								<label for="lblObs">Observação</label>
								<textarea class="form-control" name="obs" rows="3">{{old('obs')}}</textarea>
								<br>
							</div>
							<div>
								&nbsp
							</div>

                            <!--botão-->
							<button class="btn btn-primary">Cadastrar</button>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>