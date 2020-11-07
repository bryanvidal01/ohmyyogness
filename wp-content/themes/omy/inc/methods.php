<?php

class ics {
    /* Function is to get all the contents from ics and explode all the datas according to the events and its sections */
    function getIcsEventsAsArray($file) {
        $icalString = file_get_contents ( $file );
        $icsDates = array ();
        /* Explode the ICs Data to get datas as array according to string ‘BEGIN:’ */
        $icsData = explode ( "BEGIN:", $icalString );

        $description = explode ( "DESCRIPTION:", $icalString );



        /* Iterating the icsData value to make all the start end dates as sub array */
        foreach ( $icsData as $key => $value ) {
            $icsDatesMeta [$key] = explode ( "\n", $value );

        }



        //var_dump($icsDatesMeta);

        /* Itearting the Ics Meta Value */
        foreach ( $icsDatesMeta as $key => $value ) {
            foreach ( $value as $subKey => $subValue ) {
                /* to get ics events in proper order */
                $icsDates = $this->getICSDates ( $key, $subKey, $subValue, $icsDates );
            }
        }
        return $icsDates;
    }


    /* funcion is to avaid the elements wich is not having the proper start, end  and summary informations */
    function getICSDates($key, $subKey, $subValue, $icsDates) {
        if ($key != 0 && $subKey == 0) {
            $icsDates [$key] ["BEGIN"] = $subValue;
        } else {
            $subValueArr = explode ( ":", $subValue, 2 );
            if (isset ( $subValueArr [1] )) {
                $icsDates [$key] [$subValueArr [0]] = $subValueArr [1];
            }
        }
        return $icsDates;
    }
}

function getCalendarFromGoogle($calendrier){
    /* Replace the URL / file path with the .ics url */
    $file = $calendrier;
    /* Getting events from isc file */
    $obj = new ics();
    $icsEvents = $obj->getIcsEventsAsArray( $file );

    $timeZone = trim ( $icsEvents [1] ['X-WR-TIMEZONE'] );
    unset( $icsEvents [1] );
    $arrayCalendar = [];

    $i= 0; foreach( $icsEvents as $icsEvent){
        /* Getting start date and time */
        $start = isset( $icsEvent ['DTSTART;VALUE=DATE'] ) ? $icsEvent ['DTSTART;VALUE=DATE'] : $icsEvent ['DTSTART'];
        /* Converting to datetime and apply the timezone to get proper date time */
        $startDt = new DateTime ( $start );
        $startDt->setTimeZone ( new DateTimezone ( $timeZone ) );
        $startCompare = $startDt->format ( 'm/d/Y H:i' );
        $startDateDay = $startDt->format ( 'd/m/Y' );
        $startDate = $startDt->format ( 'H:i' );
        /* Getting end date with time */
        $end = isset( $icsEvent ['DTEND;VALUE=DATE'] ) ? $icsEvent ['DTEND;VALUE=DATE'] : $icsEvent ['DTEND'];
        $endDt = new DateTime ( $end );
        $endDt->setTimeZone ( new DateTimezone ( $timeZone ) );
        $endDate = $endDt->format ( 'H:i' );
        /* Getting the name of event */
        $eventName = $icsEvent['SUMMARY'];
        $eventDescription = $icsEvent['DESCRIPTION'];

        $arrayCalendar[$i] = [
            'eventName' => $eventName,
            'startCompare' => $startCompare,
            'startDateDay' => $startDateDay,
            'startDate' => $startDate,
            'endDate'   => $endDate,
            'eventDescription' => $eventDescription
        ];

        $i++;
    }


    return $arrayCalendar;
}

//getWhoWeAreGraphData();



function checkNonce($nonceContext)
{

    $nonce = isset($_POST['nonce']) ? sanitize_text_field($_POST['nonce']) : 0;
    if (!wp_verify_nonce($nonce, $nonceContext)) {
        exit(__('not authorized', 'biep'));
    }
}

function dateMonthInFr( $date ) {
    $english_months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
    $french_months = array('Janv', 'Févr', 'Mars', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc');
    return str_replace($english_months, $french_months,  $date );
}


function get_teach_after_filter(){

    $args = array(
        'post_type' => 'professeurs',
        'meta_key'			=> 'posttype_prof_recommandation',
        'orderby'			=> 'meta_value',
        'order'				=> 'DESC',
    );

    if($_POST['location']){
        $args['tax_query'][0][] = [
            'taxonomy' => 'location',
            'field'    => 'id',
            'terms'    => $_POST['location']
        ];
    }
    if($_POST['typeClasses']){
        $args['tax_query'][0][] = [
            'taxonomy' => 'type_classes',
            'field'    => 'id',
            'terms'    => $_POST['typeClasses']
        ];
    }
    if($_POST['yogaStyle']){
        $args['tax_query'][0][] = [
            'taxonomy' => 'yoga_style',
            'field'    => 'id',
            'terms'    => $_POST['yogaStyle']
        ];
    }
    if($_POST['yogaType']){
        $args['tax_query'][0][] = [
            'taxonomy' => 'yoga_type',
            'field'    => 'id',
            'terms'    => $_POST['yogaType']
        ];
    }
    if($_POST['goal']){
        $args['tax_query'][0][] = [
            'taxonomy' => 'goal',
            'field'    => 'id',
            'terms'    => $_POST['goal']
        ];
    }
    if($_POST['teachStyle']){
        $args['tax_query'][0][] = [
            'taxonomy' => 'teach_style',
            'field'    => 'id',
            'terms'    => $_POST['teachStyle']
        ];
    }
    if($_POST['level']){
        $args['tax_query'][0][] = [
            'taxonomy' => 'level',
            'field'    => 'id',
            'terms'    => $_POST['level']
        ];
    }

  /*  $args['meta_query'][0][] = [
        'key'      => 'posttype_prof_recommandation',
        'orderby'    => 'meta_value',
        'order'    => 'DESC'
    ];*/

    $the_query = new WP_Query( $args );


    return $the_query;
}




function get_domaines_recommendations($recommendations) {
    $recommendationsArray = [];
    $i = 0;

    if($recommendations){
        foreach ($recommendations as $recommendationItem) {

            $recommendationID = $recommendationItem->ID;
            $recommendationDomaines = get_field('recommendation_domaines', $recommendationID);

            if($recommendationDomaines){
                foreach ($recommendationDomaines as $recommendationDomaineItem) {
                    if(!array_key_exists($recommendationDomaineItem['recommendation_domaines_label'], $recommendationsArray)){
                        $i++;
                        $recommendationsArray[$recommendationDomaineItem['recommendation_domaines_label']] = 1;
                    }else{
                        $recommendationsArray[$recommendationDomaineItem['recommendation_domaines_label']] =  $recommendationsArray[$recommendationDomaineItem['recommendation_domaines_label']] + 1;
                    }
                }
            }
        }
    }

    arsort($recommendationsArray);

    return $recommendationsArray;
}

function get_recommendation_status($recommendation_id = '') {
    $status = '';
    switch ($recommendation_id){
        case 1:
            $status = 'Je recommande vivement';
        break;

        case 2:
            $status = 'Je recommande';
        break;

        case 3:
            $status = 'Aucun avis';

        case 4:
            $status = 'Je ne recommande pas';

        break;
    }

    return $status;
}

function sendRecommendation($profID) {

    if(is_user_logged_in()){
        $error = 0;

        $domainesProfesseur = get_field('recommandation_domaines', $profID);

        if(!$domainesProfesseur){
            $domainesProfesseur = 0;
        }

        $recommandationStatus = (int) $_POST['recommandationStatus'];
        $domaines = $_POST['domaine'];
        $commentaire = $_POST['commentaire'];
        $date = time() + 7200;
        $currentUserID = get_current_user_id();

        $recommandationNumberProf = get_field('posttype_prof_recommandation');

        if(!is_int($recommandationStatus) || $recommandationStatus > 4 || $recommandationStatus < 1){
            $error ++;
        }else{
            if($recommandationStatus < 3 ){
                if($recommandationNumberProf){
                    $recommandationNumberProf = $recommandationNumberProf + 1;
                }else{
                    $recommandationNumberProf = 1;
                }

            }
        }

        if($domaines){
            $domaineImport = array();

            $i=0; foreach ($domaines as $domaine){
                $domaineFormated = stripslashes($domaine);

                $correspondance = 0; foreach ($domainesProfesseur as $domaineProfesseur){
                    $domaineProfesseurLabel = $domaineProfesseur['recommandation_domaine_name'];

                    if($domaineProfesseurLabel == $domaineFormated){
                        $correspondance ++;
                    }
                }

                if($correspondance == 0){
                    $error ++;
                }else{
                    $domaineImport[$i]['recommendation_domaines_label'] = $domaineFormated;
                    $i++;
                }
            }
        }

        if(!$commentaire){
            //$error ++;
            $commentaire = trim($commentaire);
            $commentaire = stripslashes($commentaire);
            $commentaire = htmlspecialchars($commentaire);
        }

        if($error == 0){
            $newPost = array(
                'post_title'    => 'Recommandation du ' . date('d/m/Y'),
                'post_status'   => 'publish',
                'post_type'     => 'recommendations'
            );

            $newPostInsert = wp_insert_post( $newPost );

            if($newPostInsert){
                update_field('recommendation_user_id', $currentUserID, $newPostInsert);
                update_field('recommendation_prof_id', $profID, $newPostInsert);
                update_field('recommendation_status', $recommandationStatus, $newPostInsert);
                update_field('recommendation_date', $date, $newPostInsert);
                update_field('recommendation_commentaire', $commentaire, $newPostInsert);

                if($recommandationStatus < 3):
                    update_field('recommendation_domaines', $domaineImport, $newPostInsert);
                endif;

                // Update Prof
                update_field('posttype_prof_recommandation', $recommandationNumberProf, $profID);

                $string = '<script type="text/javascript">';
                $string .= 'window.location = "' . get_the_permalink() . '"';
                $string .= '</script>';
                echo $string;
            }
        }else{
            return array('status_code' => 400);
        }

    }
}
