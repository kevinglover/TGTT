<article <?php post_class(); ?>>
  <div class="entry-content">
      <?php
        //displays all users ($users will also contain all usermeta fields for each user
        $blogusers = get_users_of_blog();
        $html .= '<dl>'; 

        if ($blogusers) {
          foreach ($blogusers as $bloguser) {
            $user = get_userdata($bloguser->user_id);
            $userID=$user->ID;
            $post_count = get_usernumposts($userID);
            if ($post_count) {
              
              $html .= '<dt>'; 
              $html .= "<div class='row'>";

              
              $html .= "<div class='col-xs-3 col-md-2'>";
              $alt = get_the_author_meta('firstname',$userID) . ' '.get_the_author_meta('lastname',$userID);
              $html .= '<a href="'.get_author_posts_url($userID).'" class="avatar-link">';
              $html .= get_avatar( $userID, $size, $default, $alt );
              $html .= "</a></div>";
              $html .= "<div class='col-xs-8 col-sm-9'>";
              $html .= '<h2><a href="'.get_author_posts_url($userID).'">' . $user->user_firstname . ' ' . $user->user_lastname . '</a></h2>';
              $html .= "</div>";
              $html .= "</div>";

              $html .= '</dt>';
              $html .= '<dd>';
              $size ='';
              $default ='';

              $html .= "<div class='row'>";
              $html .= "<div class='col-xs-2 col-sm-2'>";
              $html .= "</div>";
              $html .= "<div class='col-xs-8 col-sm-10'>";
              $html .= get_the_author_meta('description',$userID);
              $html .= "</div>";
              $html .= "</div>";

              $html .= '</dd>';
            }
          }
        }

        $html .= '</dl>';
        echo $html;
      ?>

  </div>
  
</article>




