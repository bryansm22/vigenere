<?php
class Vigenere {
  var $alfabeto; var $texto; var $clave;
  public function __construct($cadena, $clave) {
    $this->alfabeto = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $this->texto    = strtoupper($cadena);
    $this->clave   = strtoupper($clave);
  }

  function cifrar(){
    $resultado = "";
    $x = 0;
    $p = 0;
    for($i=0; $i<strlen($this->texto); $i++){
      if(strstr($this->alfabeto, $this->texto{$i})){
        $x = strpos($this->alfabeto, $this->clave{($p % strlen($this->clave))});
        $resultado .= $this->rotacion($this->texto{$i}, $x);
        $p++;
      }else{
        $resultado .= $this->texto{$i};
        continue;
      }
    }
    return $resultado;
  }

  function descifrar(){
    $resultado = "";
    $x = 0;
    $p = 0;
    for($i=0; $i<strlen($this->texto); $i++){
      if(strstr($this->alfabeto, $this->texto{$i})){
        $x = strpos($this->alfabeto, $this->clave{($p % strlen($this->clave))});
        $resultado .= $this->rotacion($this->texto{$i}, -$x);
        $p++;
      }else{
        $resultado .= $this->texto{$i};
        continue;
      }
    }
    return $resultado;
  }

  function rotacion($c, $n){
    $resultado = "";
    $tamC = strlen($this->alfabeto);
    $k = 0;
    $n %= $tamC;
    $c = strtoupper($c);

    if(strstr($this->alfabeto, $c)){
      $k = (strpos($this->alfabeto, $c) + $n);
      if($k < 0){ $k += $tamC; }else $k %= $tamC; $resultado .= $this->alfabeto{$k};
    }else{
      $resultado .= $c;
    }
    return $resultado;
  }
}
?>
