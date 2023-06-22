<?php
// ------------------------ FONCTIONS ------------------------ //
function sa(Array &$la) {
    $temp = $la[0];
    $la[0] = $la[1];
    $la[1] = $temp;
}

function sb(Array &$lb) {
    $temp = $lb[0];
    $lb[0] = $lb[1];
    $lb[1] = $temp;
}

function sc(Array &$la, Array &$lb) {
    sa($la);
    sb($lb);
}

function pa(Array &$la, Array &$lb) {
    $temp = $lb[0]; // prend la première valeur de lb
    array_unshift($la, $temp); // ajoute la valeur au début de la liste la
    array_shift($lb); // supprime la première valeur de lb
}


function pb(Array &$la, Array &$lb) {
    $temp = $la[0];
    array_unshift($lb, $temp);
    array_shift($la);
}

function ra(Array &$la) {
    $temp = $la[0];
    array_shift($la);
    array_push($la, $temp);
}

function rb(Array &$lb) {
    $temp = $lb[0];
    array_shift($lb);
    array_push($lb, $temp);
}

function rr(Array &$la, Array &$lb) {
    ra($la);
    rb($lb);
}

function rra(Array &$la) {
    $temp = $la[sizeof($la) - 1];
    array_pop($la);
    array_unshift($la, $temp);
}

function rrb(Array &$lb) {
    $temp = $lb[sizeof($lb) - 1];
    array_pop($lb); 
    array_unshift($lb, $temp);
}

function rrr(Array &$la, Array &$lb) {
    rra($la);
    rrb($lb);
}

// ------------------------ ALGO ------------------------ //

function tri(Array &$la, Array &$lb) {
    $result = "";
    $size_la = sizeof($la); 
    // ------------------------ BOUCLE SORT ------------------------ //
    $status = false;
    while ($status == false) {
        $status = true;
        for ($i = 0; $i < $size_la - 1; $i++) {
            if ($la[$i] > $la[$i + 1]) {
                $status = false;
            }
        }
        if ($status == false) {
            // ------------------------ BOUCLE LA A LB ------------------------ //
            $count = 0;
            while ($count < $size_la) {
                if(isset($la[1])) {
                    if($la[0] > $la[1]) {
                        sa($la);
                        pb($la, $lb);
                        $result .= "sa ";
                        $result .= "pb ";
                    } else {
                        pb($la, $lb);
                        $result .= "pb ";
                        
                    }
                    $count++;
                } else {
                    pb($la, $lb);
                    $result .= "pb ";
                    $count++;
                }
            }

            // ------------------------ BOUCLE LB A LA ------------------------ //
            $size_lb = sizeof($lb);
            $count = 0;
            while ($count < $size_lb) {
                if(isset($lb[1])) {
                    if($lb[0] < $lb[1]) {
                        sb($lb);
                        pa($la, $lb);
                        $result .= "sb ";
                        $result .= "pa ";

                    } else {
                        pa($la, $lb);
                        $result .= "pa ";   
                    }
                    $count++;
                } else {
                    pa($la, $lb);
                    $result .= "pa ";
                    $count++;
                }
            }
        } 
    }
    // ------------------------ VERIFICATIONS ------------------------ //
    // var_dump("la :\n");
    // print_r($la);
    // var_dump("lb :\n");
    // print_r($lb);
    $result = trim("$result");
    echo "$result\n";
}


// ------------------------ MAIN ------------------------ //
$la = array_slice($argv, 1);
// $la = array_map(function () {
//     return rand(-50, 50);
// }, array_fill(0, 100, null));

$lb = [];
tri($la, $lb);


// $time_start = microtime(true);
// $time_end = microtime(true);
// $time = $time_end - $time_start;
// echo "La fonction a mis $time secondes à s'exécuter.\n";
?>