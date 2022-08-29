<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<title>VirtuaShelf</title>
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="style.css">
		
		
		<script src="script.js" defer></script>

	</head>
	
	<body>
		<header>
			<aside>
				<form action="">
					<div>
						<label for="inputEmail">E-Mail</label>
						<input type="email" name="inputEmail" id="inputEmail" class="form-control">
					</div>
					<div>
						<label for="inputPass">Senha</label>
						<input type="password" name="inputPass" id="inputPass" class="form-control">
					</div>
					<a href="#">Esqueci a senha</a>
					<div>
						<input type="submit" value="Login" class="btn btn-primary">
						<a href="#" class="btn btn-primary">Cadastre-se</a>
					</div>
				</form>
			</aside>
			
			<h1>
				<?= "Olá mundo"; ?>
			</h1>
			<h2>
				<?php
					for($i = 0; $i < 10; $i++){
						echo "Runaldo!<br>";
					}
				?>
			</h2>
		</header>
		
		<main>
			<form action="php/Save.php" class="form-inline justify-content-center">
				<div class="form-group">
					<input type="text" name="inputBook" id="inputBook" class="form-control">
					<input type="button" value="Salvar" class="btn btn-primary" onclick="createBook()">
				</div>
			</form>
			<section id="section">
				<?php
					require_once "php/Connection.php";
					
					$sql = "SELECT * FROM book;";
					if(!Connection::execWithReturn($sql)){ echo Connection::getError(); exit(1); }
					
					foreach(Connection::getData() as $book){
				?>
				
					<article>
						<div>
							<img src="img/Livro001.jpg" alt="Foto do livro">
						</div>
						<div class="info">
							<h3>Livro: <span><?=$book["nome"];?></span></h3>
							<h3>Páginas: <span><?=$book["paginas"];?></span></h3>
							<h3>Autor/a/as/es: <span><?=$book["autor"];?></span></h3>
						</div>
						<div>
							<div class="marker">
								<span class="material-icons">book</span>
								<span class="counter">12</span>
							</div>
							<div class="marker">
								<span class="material-icons">favorite</span>
								<span class="counter">12</span>
							</div>
						</div>
					</article>
				
				<?php }?>
			</section>
		</main>
	</body>
</html>