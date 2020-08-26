<div class="uap-team-carousal-wrapper">
    <div class="slides">
        <?php 
        	$page = ! empty( $_GET['pg'] ) ? (int) $_GET['pg'] : 1;
            $total = count( $settings['member']  ); //total items in array    
            $limit = $settings['member_per_page']; //per page    
            $total_pages = ceil( $total/ $limit ); //calculate total pages
            $page = max($page, 1); //get 1 page when $_GET['pg'] <= 0
            $page = min($page, $total_pages); //get last page when $_GET['pg'] > $total_pages
            $offset = ($page - 1) * $limit;
            if( $offset < 0 ) $offset = 0;
            $members = array_slice( $settings['member'] , $offset, $limit );
            $rankpostcount=$offset;
        ?>
            <div class="uap-team-carousal">
            <div class="row">
                <?php foreach ($members as $member ){ ?>
                    <div class="col-md-4">
                        <div class="uap-team-member">
                            <div class="image">
                                <img src="<?php echo $member['display_picture']['url'];?>"/>
                            </div>
                            <div class="details">
                                <p class="names"><?php echo $member['names'];?></p>
                                <p class="title"><?php echo $member['title'];?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            </div>
            <?php
	    $link = get_the_permalink().'?pg=%d';
		$pager = '<div style="width: 300px;">';   
		if( $total_pages != 0 ) 
		{
		  $page = 1;

		 while($page < $total_pages){
			if($page === 1){
				$pager .= sprintf( '<a href="' . $link . '" style="color: #fff; background: #000; padding: 5px 10px;border: 1px solid #fff;">'. $page .'</a>', $page ); 
	
			}
			$numb = $page + 1;
			$pager .= sprintf( '<a href="' . $link . '" style="color: #fff; background: #000; padding: 5px 10px; border: 1px solid #fff;">'. $numb .'</a>', $page + 1 ); 
			$page ++;
		}
		}                   
		$pager .= '</div>';
	
		echo $pager;
	?>
    </div>
</div>