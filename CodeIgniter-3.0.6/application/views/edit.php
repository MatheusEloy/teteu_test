<html>
	<head>
		<title>Teteu_Batanga</title>
	</head>
	<body>
		<fieldset>
			<legend>Cadastro de Pessoas</legend>
			<form method="post">
				<label id="nome">Nome:</label>
				<input type='text' name="nome" id="nome" value="<?= $nome; ?>" required>
				<label id="idade">Idade:</label>
				<input type='text' name="idade" id="idade" value="<?= $idade; ?>" required>
				<button type='submit'>Atualizar</button>
			</form>
		</fieldset>
		<center><a href="index">Voltar</a></center>
	</body>
</html>