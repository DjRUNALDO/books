function createMarker(icon, number){
	let div = document.createElement("div");
	div.setAttribute("class", "marker");
	
	let spanIcon   = document.createElement("span");
	spanIcon.setAttribute("class", "material-icons");
	spanIcon.innerHTML = icon;
	
	let spanNumber = document.createElement("span");
	spanNumber.setAttribute("class", "counter");
	spanNumber.innerHTML = number;
	
	div.appendChild(spanIcon);
	div.appendChild(spanNumber);
	
	return div;
}

function createBook(){
	//Variables
	let bookImage   = document.createElement("div");
	let bookInfo    = document.createElement("div");
	let bookMarkers = document.createElement("div");
	
	//Book image
	let img = document.createElement("img");
	img.setAttribute("alt", "Imagem do Livro");
	img.setAttribute("src", "img/Livro001.jpg");
	bookImage.appendChild(img);
	
	//Book info
	bookInfo.setAttribute("class", "info");
	let hTitle  = document.createElement("h3");   /*--------*/  hTitle.innerHTML = "Livro: ";
	let hPages  = document.createElement("h3");   /*--------*/  hPages.innerHTML = "Páginas: ";
	let hAuthor = document.createElement("h3");   /*--------*/ hAuthor.innerHTML = "Autor/a/as/es: ";
	let sTitle  = document.createElement("span"); /*--------*/  sTitle.innerHTML = document.querySelector("#inputBook").value;
	let sPages  = document.createElement("span"); /*--------*/  sPages.innerHTML = "???";
	let sAuthor = document.createElement("span"); /*--------*/ sAuthor.innerHTML = "???";
	
	hTitle.appendChild(sTitle);   /*--------*/ bookInfo.appendChild(hTitle);
	hPages.appendChild(sPages);   /*--------*/ bookInfo.appendChild(hPages);
	hAuthor.appendChild(sAuthor); /*--------*/ bookInfo.appendChild(hAuthor);
	
	//Book markers
	bookMarkers.appendChild(createMarker("book", "0"));
	bookMarkers.appendChild(createMarker("favorite", "0"));
	
	//Create book
	
	let article = document.createElement("article");
	article.appendChild(bookImage);
	article.appendChild(bookInfo);
	article.appendChild(bookMarkers);
	
	document.querySelector("#section").appendChild(article);
}