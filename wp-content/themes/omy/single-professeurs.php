<?php
get_header();

$urlGoogleAgenda = get_field('posttype_prof_calendar_url');
$agendaTeacher = getCalendarFromGoogle($urlGoogleAgenda);
$emailTeacher = get_field('posttype_prof_calendar_email');
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center marge-top-sup">
            <h1 class="title big"><?php echo get_the_title(); ?></h1>
        </div>

        <div class="col-sm-12 text-center">
            <h1 class="title">Calendrier</h1>
        </div>

        <table class="calendar-dates">
            <tr>
                <th>
                    Évènement
                </th>
                <th>
                    Début du cours
                </th>
                <th>
                    Fin du cours
                </th>
                <th>
                    Niveau
                </th>
                <th>
                </th>
            </tr>
        <?php
        $array = $agendaTeacher;

        function date_compare($element1, $element2) {
            $datetime1 = strtotime($element1['startCompare']);
            $datetime2 = strtotime($element2['startCompare']);
            return $datetime1 - $datetime2;
        }
        usort($array, 'date_compare');

        foreach ($array as $agendaTeacherItem):
            $dateEvent = new DateTime($agendaTeacherItem['startCompare']);
            $dateNow = new DateTime();
            $levelClasse = '';
            $linkRedirect = '';

            if($dateEvent > $dateNow):
            $eventDescription = $agendaTeacherItem['eventDescription'];
            $posts = get_posts(array(
                'numberposts'   => 1,
                'post_type'     => 'combinaison',
                'meta_key'      => 'post_combinaison_id',
                'meta_value'    => $eventDescription
            ));

            if($posts):
                $postSingle = reset($posts);
                $postID = $postSingle->ID;
                // ACF Fields
                $levelClasse = get_field('post_combinaison_level', $postID);
                $linkRedirect = get_field('post_combinaison_redirection', $postID);
            endif;



        ?>
                <tr>
                    <td>
                       <?php echo $agendaTeacherItem['eventName']; ?>
                    </td>
                    <td>
                        <?php echo $agendaTeacherItem['startDate']; ?>
                    </td>
                    <td>
                        <?php echo $agendaTeacherItem['endDate']; ?>
                    </td>
                    <td>
                        <?php if($levelClasse): ?>
                            <?php echo $levelClasse; ?>
                        <?php else: ?>
                            Non défini
                        <?php endif; ?>
                    </td>
                    <td width="20%" class="text-right">
                        <?php if($linkRedirect): ?>
                            <a class="button primary" target="_blank" href="<?php echo $linkRedirect; ?>">S'inscrire</a>
                        <?php elseif($emailTeacher): ?>
                            <a class="button primary" href="mailto:<?php echo $emailTeacher; ?>">Contacter</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endif;
        endforeach; ?>
        </table>

    </div>
</div>
<?php
get_footer();
