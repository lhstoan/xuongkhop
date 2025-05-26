<div class="column-right">
    <dl class="sidebar-item">
        <dt>最新の投稿</dt>
        <dd>
            <ul class="list-info">
                <?php
                global $post;
                // Query post argument
                $args = array(
                    'post_type' =>'blog',
                    'orderby' => 'date',
                    'order' => 'desc',
                    'numberposts' => 3
                );
                $info_posts = get_posts($args);
                if($info_posts):
                        foreach($info_posts as $post):
                            setup_postdata($post);
                            ?>
                            <li><span><?php echo get_the_date('Y-m-d'); ?></span><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
                            <?php
                        endforeach;
                    wp_reset_postdata();
                    wp_reset_query();
                endif;
                ?>
            </ul>
        </dd>
    </dl>
    <!-- end .sidebar-item -->
    <dl class="sidebar-item">
        <dt>アーカイブ</dt>
        <dd>
            <ul class="list-archive-monthly">
                <?php
                global $post;
                // Query post argument
                $args = array(
                    'post_type' =>'blog',
                    'orderby' => 'date',
                    'order' => 'desc',
                    'numberposts' => -1
                );
                $arrMonthly = array();
                $info_posts = get_posts($args);
                if($info_posts):
                        foreach($info_posts as $post):
                            setup_postdata($post);
                            if(!in_array(get_the_date('Y.m'), $arrMonthly)) :
                                array_push($arrMonthly, get_the_date('Y.m'));
                            endif;
                        endforeach;
                    wp_reset_postdata();
                    wp_reset_query();
                endif;
                foreach($arrMonthly as $month) :
                    echo '<li><a href="'. home_url('info/?q_year='. explode('.', $month)[0] .'&q_month='. explode('.', $month)[1] .'') .'">'. explode('.', $month)[0] .'年'. explode('.', $month)[1] .'月</a></li>';
                endforeach;
                ?>
            </ul>
        </dd>
    </dl>
    <!-- end .sidebar-item -->
</div>