function ajax()
{
	try {
		return new ActiveXObject("Microsoft.XMLHTTP");
	} catch(e) {
		try {
			return new ActiveXObject("Msxml2.XMLHTTP");
		} catch(ex) {
			try {
				return new XMLHttpRequest();
			} catch(exc) {
				alert("Esse browser não tem recursos para uso do AJAX");
				return false;
			}
		}
	}
}