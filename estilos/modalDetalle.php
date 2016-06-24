a.open{
	background-color: #414141;
	border-radius: 5px;
	color: #fff;
	font-size: 1.5em;
	margin: 20px;
	padding: 10px 20px;
	position: absolute;
	text-decoration: none;
	text-shadow: 2px 2px 0px #000;
	-moz-transition:background-color 1s;
	-webkit-transition:background-color 1s;
	-o-transition:background-color 1s;
	-ms-transition:background-color 1s;

}

a.open:hover{
	background-color: #111;
}

section.modalDialog{
	background-color: rgba(0,0,0,.5);
	bottom: 0;
	top:0;
	left: 0;
	right: 0;
	opacity: 0;
	position: fixed;
	z-index: -2;
	-moz-transition: opacity 1s;
	-webkit-transition: opacity 1s;
	-o-transition: opacity 1s;
	-ms-transition: opacity 1s;
}

section.modalDialog:target{
	opacity: 1;
}

a.close{
	background-color: #414141;
	border-radius: 5px;
	color: #fff;
	font-size: 14px;
	font-weight: bold;
	line-height: 22px;
	position: absolute;
	right: 5px;
	top:5px;
	text-align: center;
	text-decoration: none;
	width: 28px;
}

a.close{
	background-color: #000;
}

section.modal{
	background-color: #111;
	box-shadow: 0px 0px 10px #000;
	border-radius: 5px;
	color: #fff;
	margin: 10% auto;
	padding: 20px;
	position: relative;
	width: 400px;
}