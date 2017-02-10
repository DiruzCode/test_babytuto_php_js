<?php
class Solve {

  protected $q;

  public function __construct($q) {
    $this->q = $q;
  }

  public function solve_bribery() {

      $List_Base = [];
      $Data = $this->q;

      //Seteamos la columna que nos servira para comparar
      $Base = array_fill_keys($Data[0], 0);
      $Total = 0;

      for ($i=0; $i < count($Data); $i++) {

          for ($j=0; $j < count($Data[$i]); $j++) {
              $c = 0;
              if($i !== 0){
                  $c = $i - 1;
              }
              if($Data[$c][$j] !== $Data[$i][$j]){
                  if(((int) $Base[$Data[$i][$j]] + 1) === 3){
                      return json_encode(array($total,"Too chaotic"));
                  }
                  $Total++;

                  $List_Base[$Data[$i][$j]] = (int) $Base[$Data[$i][$j]] + 1;
                  break;
              }
          }

      }

      return json_encode(array($Total));

  }
}
