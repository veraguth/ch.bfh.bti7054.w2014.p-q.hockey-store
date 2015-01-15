
<script src="/admin/javascript/admin.js"></script>

<script src="/javascript/jquery-1.11.2.min.js"></script>
<script src="/javascript/jquery.mathHeight.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.article-lead').matchHeight();

		var showLogin = false;
		var showRegister = false;
		$(".login-button").click(function(event) {
			if(showLogin) showLogin = false;
			else showLogin = true;
			$(".login").slideToggle();
			if(showRegister) {
				$(".register").slideToggle();
				showRegister = false;
			}
		}); 

		$(".register-button").click(function(event) {
			if(showRegister) showRegister = false;
			else showRegister = true;
			$(".register").slideToggle();
			if(showLogin) {
				$(".login").slideToggle();
				showLogin = false;
			}
		}); 
	});

    function searchFor(searchTerm) {
        var xmlHttp = null;
        if (typeof XMLHttpRequest != 'undefined') {
            xmlHttp = new XMLHttpRequest();
        }

        if (!xmlHttp) {
            try {
                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e) {
                try {
                    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    xmlHttp = null;
                }
            }
        }

        if (xmlHttp) {
            var url = "search.php"
            var params = "searchTerm=" + searchTerm;
            xmlHttp.open("POST", url, true);

            xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlHttp.setRequestHeader("Content-length", params.length);
            xmlHttp.setRequestHeader("Connection", "close");

            xmlHttp.onreadystatechange = function () {
                if (xmlHttp.readyState == 4) {
                    document.getElementById("summary").innerHTML = xmlHttp.responseText;
                }
            };
            xmlHttp.send(params);
        }
    }

</script>

</body>
</html>
