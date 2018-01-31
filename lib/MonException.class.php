<?php

class MonException extends ErrorException

{

  public function __toString()

  {

    switch ($this->severity)

    {

      case E_USER_ERROR : // Si l'utilisateur émet une erreur fatale.

        $type = 'Erreur fatale';

        break;

      

      case E_WARNING : // Si PHP émet une alerte.

      case E_USER_WARNING : // Si l'utilisateur émet une alerte.

        $type = 'Attention';

        break;

      

      case E_NOTICE : // Si PHP émet une notice.

      case E_USER_NOTICE : // Si l'utilisateur émet une notice.

        $type = 'Note';

        break;

      

      default : // Erreur inconnue.

        $type = 'Erreur inconnue';

        break;

    }

    

    return '<strong>' . $type . '</strong> : [' . $this->code . '] ' . $this->message . '<br /><strong>' . $this->file . '</strong> à la ligne <strong>' . $this->line . '</strong>';

  }

}


function error2exception($code, $message, $fichier, $ligne)

{

  // Le code fait office de sévérité.

  // Reportez-vous aux constantes prédéfinies pour en savoir plus.

  // http://fr2.php.net/manual/fr/errorfunc.constants.php

  throw new MonException($message, 0, $code, $fichier, $ligne);

}


function customException($e)

{

  echo 'Ligne ', $e->getLine(), ' dans ', $e->getFile(), '<br /><strong>Exception lancée</strong> : ', $e->getMessage();

}

