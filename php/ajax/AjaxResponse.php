<?php  
	class AjaxResponse {
		public $responseCode; // 0 all ok - 1 some errors - -1 some warning
		public $message;
		public $data;
		
		function AjaxResponse($responseCode = 1, 
								$message = "Somenthing went wrong! Please try later.",
								$data = null){
			$this->responseCode = $responseCode;
			$this->message = $message;
			$this->data = null;
		}
	
	}

	class Utente {
		public $username;
		public $follow;

		function Utente($username = null, $follow = null) {
			$this->username = $username;
			$this->follow = $follow;
		}
	}

	class Canzone {
		public $artista;
		public $nome;
		public $testo;
		public $album;
		public $difficolta;

		function Canzone($artista = null, $nome = null, $testo = null, $album = null, $difficolta = null) {
			$this->artista = $artista;
			$this->nome = $nome;
			$this->testo = $testo;
			$this->album = $album;
			$this->difficolta = $difficolta;
		}
	}
?>