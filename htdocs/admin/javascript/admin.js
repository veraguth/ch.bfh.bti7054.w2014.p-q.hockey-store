function showPages() {
	//show pages
	document.getElementById("admin-pages").className =
	document.getElementById("admin-pages").className.replace
  	( /(?:^|\s)hide(?!\S)/g , ' show' );
  	//make articles invisible
	document.getElementById("admin-articles").className =
	document.getElementById("admin-pages").className.replace
	( /(?:^|\s)show(?!\S)/g , ' hide' );
	//make editor invisible
	document.getElementById("admin-editor").className =
	document.getElementById("admin-editor").className.replace
	( /(?:^|\s)show(?!\S)/g , ' hide' );
}

function showArticles() {
	//show articles
	document.getElementById("admin-articles").className =
   		document.getElementById("admin-articles").className.replace
      ( /(?:^|\s)hide(?!\S)/g , ' show' );
      //make pages invisible
  	document.getElementById("admin-pages").className =
	document.getElementById("admin-articles").className.replace
  	( /(?:^|\s)show(?!\S)/g , ' hide' );
      //make editor invisible
	document.getElementById("admin-editor").className =
	document.getElementById("admin-editor").className.replace
	( /(?:^|\s)show(?!\S)/g , ' hide' );
}

function showPage() {
	document.getElementById("admin-editor").className =
	document.getElementById("admin-editor").className.replace
	( /(?:^|\s)hide(?!\S)/g , ' show' );
}