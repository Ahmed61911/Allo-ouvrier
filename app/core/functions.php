<?php
//showprofil(view) functions:
function avis($score, $votes){
    if($score == 0 || $score == 0){
        return '<i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>';
    }
    else{
        $avis = $score / $votes;
        if($avis <1){
            return '<i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>';
        }
        elseif($avis >= 1 && $avis < 2){
            return '<i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>';
        }
        elseif($avis >= 2 && $avis < 3){
            return '<i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>';
        }
        elseif($avis >= 3 && $avis < 4){
            return '<i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>';
        }
        elseif($avis >= 4){
            return '<i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>';
        }
    }
}
function disponibilite($start, $end){
    $tempAcutel = strtotime(date('H:i'));
    $tempDebut = date('H:i', $start);
    $tempArret = date('H:i', $end);
        
    if($tempAcutel >= $tempDebut && $tempAcutel <= $tempArret){
        $disponibile = '<h4 class="disponibilite" style="color:green;">● Disponible</h4>';
    }
    else{
        $disponibile = '<h4 class="disponibilite" style="color:red;">● Indisponible</h4>';
    }
    return $disponibile;
}
/*function disponibilite($start, $end) {
    // Convert string times to timestamps for comparison
    $tempActuel = strtotime(date('H:i'));
    $tempDebut = strtotime($start);
    $tempArret = strtotime($end);
    
    // Compare current time with start and end times
    if ($tempActuel >= $tempDebut && $tempActuel <= $tempArret) {
        $disponible = '<h4 class="disponibilite" style="color:red;">● Indisponible</h4>';
    } else {
        $disponible = '<h4 class="disponibilite" style="color:green;">● Disponible</h4>';
    }

    return $disponible;
}*/

function profileImage($image){
    if($image == ''){
        return (ROOT . '/assets/images/profile_default.jpg');
    }
    else{
        return (ROOT . $image);
    }
}