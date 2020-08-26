<div class="recent-posts-footer">
    <?php if(!empty($posts)){
                $page = ! empty( $_GET['pg'] ) ? (int) $_GET['pg'] : 1;
                $total = count( $posts  ); //total items in array    
                $limit = $settings['posts_per_page']; //per page    
                $total_pages = ceil( $total/ $limit ); //calculate total pages
                $page = max($page, 1); //get 1 page when $_GET['pg'] <= 0
                $page = min($page, $total_pages); //get last page when $_GET['pg'] > $total_pages
                $offset = ($page - 1) * $limit;
                if( $offset < 0 ) $offset = 0;
                $posts = array_slice( $posts , $offset, $limit );
                $rankpostcount=$offset;
                $link = get_the_permalink().'?pg=%d';
                $pager = '<div class="uap-pagination">'; 

                if( $total_pages != 0 ) 
                {
                  $page = 1;
                 while($page < $total_pages){
                    if($page === 1){
                        $pager .= sprintf( '<a href="' . $link . '" class="' . $class .'">'. $page .'</a>', $page ); 
            
                    }
                    $numb = $page + 1;
                    $pager .= sprintf( '<a href="' . $link . '" class="' . $class .'">'. $numb .'</a>', $page + 1 ); 
                    $page ++;
                }
                }                   
                $pager .= '</div>';   
                if(!is_front_page() && !is_home()){
                    echo $pager;
                }
        foreach ($posts as $post){ 
            $rankpostcount++;
            ?>
            <div class="recent-post-entry">
                <div class="row">
                    <div class="recent-post-image-wrapper col-md-6" style="background-image: url(<?php echo wp_get_attachment_url(get_post_meta($post->ID, '_thumbnail_id')[0]); ?>)">
                        <!--img class="recent-post-featured-image" src="<?php echo wp_get_attachment_url(get_post_meta($post->ID, '_thumbnail_id')[0]); ?>"-->
                    </div>
                    <div class="recent-post-details-wrapper col-md-6">
                        <h6 class="uap-post-title">
                            <?php echo $post->post_title ?>
                        </h6>
                        <div class="meta">
                            <span class="date"><?php echo date_format(date_create($post->post_date),"M d, Y"); ?></span>
                            <span class="dot">.</span>
                            <span class="post-comments">
                                <?php echo $post->comment_count; ?>
                                <?php if (1 == $post->comment_count){ ?>
                                    COMMENT
                                <?php }else{ ?>
                                    COMMENTS
                                <?php } ?>
                            </span>
                        </div>
                        <div class="uap-post-content">
                            <?php 
                            $words = 20;
                            $more = ' […]';
                            echo wp_trim_words( $post->post_content, $words, $more ); ?>
                                </div>
                        <a href="<?php echo $post->guid ?>" class="uap-post-link">Read more</a>
                        
                    </div>
                </div>
            </div>
        <?php }
        if(!is_front_page() && !is_home()){
            echo $pager;
        }
        
               
    } ?>
</div>