<?php
/*
Template Name: トップページ
*/
?>
<?php get_header(); ?>

        <main id="main">
          <div class="top-contents">
            <div class="top-mv">
              <div class="image"></div>
              <div class="inner">
                <div class="open">
                  <div class="title"><img src="/zoo/assets/images/top/title-open.png" alt="本日の営業時間"></div>
                  <div class="time -loading"><span></span></div>
                  <div class="notice">入園は閉園の30分前までです</div>
                </div>
                <div class="event">
                  <div class="js-calendar"></div>
                  <div class="notice"><i class="closed"></i>は休園日です。</div>
                </div>
              </div>
            </div>
            <section>
              <h2 class="top-heading"><img src="/zoo/assets/images/top/title-visitor.png" alt="総合案内"></h2>
              <p class="top-lead">入園料や本園の活動をご紹介します</p>

<?php
$param = array(
	'post_type' => 'notice',
	'showposts' => 1,
	'posts_per_page' => 1,
	'orderby' => 'date',
	'order' => 'DESC'
);
$myQuery = new WP_Query();
$myQuery->query($param);
if ($myQuery->have_posts()) :
	while ( $myQuery->have_posts() ) : $myQuery->the_post();
?>
              <div class="top-notice">
                <div class="title">動物園より皆様へ</div>
                <div class="text">
                  <p><?php the_field('notice_txt'); ?></p>
                </div>
              </div>
<?php
	endwhile;
endif;
wp_reset_postdata();
?>


              <ul class="top-pagelist">
                <li><a href="/zoo/visitor/fee/">
                    <div class="image"><img src="/zoo/assets/images/top/visitor-fee.jpg" alt=""></div>
                    <div class="title">料金・年間パスポート</div></a></li>
                <li><a href="/zoo/visitor/access/">
                    <div class="image"><img src="/zoo/assets/images/top/visitor-access.jpg" alt=""></div>
                    <div class="title">交通アクセス</div></a></li>
                <li><a href="/zoo/visitor/group/">
                    <div class="image"><img src="/zoo/assets/images/top/visitor-group.jpg" alt=""></div>
                    <div class="title">団体でのご来園</div></a></li>
                <li><a href="/zoo/visitor/support/">
                    <div class="image"><img src="/zoo/assets/images/top/visitor-support.jpg" alt=""></div>
                    <div class="title">京都市動物園サポーター制度</div></a></li>
              </ul>
              <div class="l-nav-button"><a href="/zoo/visitor/">その他のご案内</a></div>
            </section>


<?php
$param = array(
	'post_type' => array('news','event'),
	'showposts' => 8,
	'posts_per_page' => 8,
	'orderby' => 'date',
	'order' => 'DESC',
	'meta_key' => 'pickup',
	'meta_value' => '1'
);

$myQuery = new WP_Query();
$myQuery->query($param);

if ($myQuery->have_posts()) :
?>
            <section class="top-newsevents">
              <h2 class="top-heading"><img src="/zoo/assets/images/top/title-pickup.png" alt="ピックアップ"></h2>
              <p class="top-lead">本園の"今"をお伝えします</p>
              <div class="c-list-carousel">
                <ul>
<?php while ( $myQuery->have_posts() ) : $myQuery->the_post(); ?>
<?php

	$img = get_cf_img($post->ID, 'pickup_img', $size='medium');

	if($post->post_type== 'news'){
		$tag_txt = 'ニュース';
	}elseif($post->post_type== 'event'){
		$tag_txt = 'イベント';
	}

?>
                  <li><a href="<?php the_permalink(); ?>">
                      <div class="image"><img src="<?php echo $img; ?>" alt="">
                        <div class="tag"><?php echo $tag_txt; ?></div>
                      </div>
                      <div class="text"><?php the_title(); ?></div></a></li>

<?php endwhile; ?>
                </ul>
              </div>
            </section>
<?php
endif;
wp_reset_postdata();
?>

            <section class="top-newsevents">
              <h2 class="top-heading"><img src="/zoo/assets/images/top/title-event.png" alt="イベント"></h2>
              <p class="top-lead">動物たちの魅力を間近で感じられるイベントを日々企画しています</p>

<?php
global $wpdb;

$today = date("Ymd");
/*
$sql = "
select a.ID, b.meta_value
from ". $wpdb->prefix . "posts as a

inner join ". $wpdb->prefix . "postmeta as b
on a.ID = b.post_id and a.post_type = 'event' and a.post_status = 'publish' and b.meta_key = 'start_end_0_start'
inner join ". $wpdb->prefix . "postmeta as c
on a.ID = c.post_id and a.post_type = 'event' and a.post_status = 'publish' and c.meta_key = 'start_end_0_end'

left join ". $wpdb->prefix . "postmeta as d
on a.ID = d.post_id and a.post_type = 'event' and a.post_status = 'publish' and d.meta_key = 'start_end_1_start'
left join ". $wpdb->prefix . "postmeta as e
on a.ID = e.post_id and a.post_type = 'event' and a.post_status = 'publish' and e.meta_key = 'start_end_1_end'

left join ". $wpdb->prefix . "postmeta as f
on a.ID = f.post_id and a.post_type = 'event' and a.post_status = 'publish' and f.meta_key = 'start_end_2_start'
left join ". $wpdb->prefix . "postmeta as g
on a.ID = g.post_id and a.post_type = 'event' and a.post_status = 'publish' and g.meta_key = 'start_end_2_end'

left join ". $wpdb->prefix . "postmeta as h
on a.ID = h.post_id and a.post_type = 'event' and a.post_status = 'publish' and h.meta_key = 'start_end_3_start'
left join ". $wpdb->prefix . "postmeta as i
on a.ID = i.post_id and a.post_type = 'event' and a.post_status = 'publish' and i.meta_key = 'start_end_3_end'

left join ". $wpdb->prefix . "postmeta as j
on a.ID = j.post_id and a.post_type = 'event' and a.post_status = 'publish' and j.meta_key = 'start_end_4_start'
left join ". $wpdb->prefix . "postmeta as k
on a.ID = k.post_id and a.post_type = 'event' and a.post_status = 'publish' and k.meta_key = 'start_end_4_end'

left join ". $wpdb->prefix . "postmeta as l
on a.ID = l.post_id and a.post_type = 'event' and a.post_status = 'publish' and l.meta_key = 'start_end_5_start'
left join ". $wpdb->prefix . "postmeta as m
on a.ID = m.post_id and a.post_type = 'event' and a.post_status = 'publish' and m.meta_key = 'start_end_5_end'

left join ". $wpdb->prefix . "postmeta as n
on a.ID = n.post_id and a.post_type = 'event' and a.post_status = 'publish' and n.meta_key = 'start_end_6_start'
left join ". $wpdb->prefix . "postmeta as o
on a.ID = o.post_id and a.post_type = 'event' and a.post_status = 'publish' and o.meta_key = 'start_end_6_end'

left join ". $wpdb->prefix . "postmeta as p
on a.ID = p.post_id and a.post_type = 'event' and a.post_status = 'publish' and p.meta_key = 'start_end_7_start'
left join ". $wpdb->prefix . "postmeta as q
on a.ID = q.post_id and a.post_type = 'event' and a.post_status = 'publish' and q.meta_key = 'start_end_7_end'

left join ". $wpdb->prefix . "postmeta as r
on a.ID = r.post_id and a.post_type = 'event' and a.post_status = 'publish' and r.meta_key = 'start_end_8_start'
left join ". $wpdb->prefix . "postmeta as s
on a.ID = s.post_id and a.post_type = 'event' and a.post_status = 'publish' and s.meta_key = 'start_end_8_end'

left join ". $wpdb->prefix . "postmeta as t
on a.ID = t.post_id and a.post_type = 'event' and a.post_status = 'publish' and t.meta_key = 'start_end_9_start'
left join ". $wpdb->prefix . "postmeta as u
on a.ID = u.post_id and a.post_type = 'event' and a.post_status = 'publish' and u.meta_key = 'start_end_9_end'

where

(b.meta_value <= '".$today."' and c.meta_value >= '".$today."') or
(d.meta_value <= '".$today."' and e.meta_value >= '".$today."') or
(f.meta_value <= '".$today."' and g.meta_value >= '".$today."') or
(h.meta_value <= '".$today."' and i.meta_value >= '".$today."') or
(j.meta_value <= '".$today."' and k.meta_value >= '".$today."') or
(l.meta_value <= '".$today."' and m.meta_value >= '".$today."') or
(n.meta_value <= '".$today."' and o.meta_value >= '".$today."') or
(p.meta_value <= '".$today."' and q.meta_value >= '".$today."') or
(r.meta_value <= '".$today."' and s.meta_value >= '".$today."') or
(t.meta_value <= '".$today."' and u.meta_value >= '".$today."')

order by b.meta_value
";
*/
/*
$sql = "
	(select a.post_id , b.meta_value
	from ". $wpdb->prefix . "postmeta as a
	inner join ". $wpdb->prefix . "postmeta as b on a.post_id = b.post_id and a.meta_key = 'start_end_0_start' and b.meta_key = 'start_end_0_end'
	where  (a.meta_value <= '".$today."' and b.meta_value >= '".$today."'))
	UNION
	(select a.post_id , b.meta_value
	from ". $wpdb->prefix . "postmeta as a
	inner join ". $wpdb->prefix . "postmeta as b on a.post_id = b.post_id and a.meta_key = 'start_end_1_start' and b.meta_key = 'start_end_1_end'
	where  (a.meta_value <= '".$today."' and b.meta_value >= '".$today."'))
	UNION
	(select a.post_id , b.meta_value
	from ". $wpdb->prefix . "postmeta as a
	inner join ". $wpdb->prefix . "postmeta as b on a.post_id = b.post_id and a.meta_key = 'start_end_2_start' and b.meta_key = 'start_end_2_end'
	where  (a.meta_value <= '".$today."' and b.meta_value >= '".$today."'))
	UNION
	(select a.post_id , b.meta_value
	from ". $wpdb->prefix . "postmeta as a
	inner join ". $wpdb->prefix . "postmeta as b on a.post_id = b.post_id and a.meta_key = 'start_end_3_start' and b.meta_key = 'start_end_3_end'
	where  (a.meta_value <= '".$today."' and b.meta_value >= '".$today."'))
	UNION
	(select a.post_id , b.meta_value
	from ". $wpdb->prefix . "postmeta as a
	inner join ". $wpdb->prefix . "postmeta as b on a.post_id = b.post_id and a.meta_key = 'start_end_4_start' and b.meta_key = 'start_end_4_end'
	where  (a.meta_value <= '".$today."' and b.meta_value >= '".$today."'))
	UNION
	(select a.post_id , b.meta_value
	from ". $wpdb->prefix . "postmeta as a
	inner join ". $wpdb->prefix . "postmeta as b on a.post_id = b.post_id and a.meta_key = 'start_end_5_start' and b.meta_key = 'start_end_5_end'
	where  (a.meta_value <= '".$today."' and b.meta_value >= '".$today."'))
	UNION
	(select a.post_id , b.meta_value
	from ". $wpdb->prefix . "postmeta as a
	inner join ". $wpdb->prefix . "postmeta as b on a.post_id = b.post_id and a.meta_key = 'start_end_6_start' and b.meta_key = 'start_end_6_end'
	where  (a.meta_value <= '".$today."' and b.meta_value >= '".$today."'))
	UNION
	(select a.post_id , b.meta_value
	from ". $wpdb->prefix . "postmeta as a
	inner join ". $wpdb->prefix . "postmeta as b on a.post_id = b.post_id and a.meta_key = 'start_end_7_start' and b.meta_key = 'start_end_7_end'
	where  (a.meta_value <= '".$today."' and b.meta_value >= '".$today."'))
	UNION
	(select a.post_id , b.meta_value
	from ". $wpdb->prefix . "postmeta as a
	inner join ". $wpdb->prefix . "postmeta as b on a.post_id = b.post_id and a.meta_key = 'start_end_8_start' and b.meta_key = 'start_end_8_end'
	where  (a.meta_value <= '".$today."' and b.meta_value >= '".$today."'))
	UNION
	(select a.post_id , b.meta_value
	from ". $wpdb->prefix . "postmeta as a
	inner join ". $wpdb->prefix . "postmeta as b on a.post_id = b.post_id and a.meta_key = 'start_end_9_start' and b.meta_key = 'start_end_9_end'
	where  (a.meta_value <= '".$today."' and b.meta_value >= '".$today."'))
	order by post_id
";
*/

$sql = "
select a.post_id
from $wpdb->postmeta as a
inner join $wpdb->postmeta as b on a.post_id = b.post_id

where
(a.meta_key = 'start_end_0_start' and b.meta_key = 'start_end_0_end' and ( (a.meta_value <= '$today' and b.meta_value >= '$today'))) or
(a.meta_key = 'start_end_1_start' and b.meta_key = 'start_end_1_end' and ( (a.meta_value <= '$today' and b.meta_value >= '$today'))) or
(a.meta_key = 'start_end_2_start' and b.meta_key = 'start_end_2_end' and ( (a.meta_value <= '$today' and b.meta_value >= '$today'))) or
(a.meta_key = 'start_end_3_start' and b.meta_key = 'start_end_3_end' and ( (a.meta_value <= '$today' and b.meta_value >= '$today'))) or
(a.meta_key = 'start_end_4_start' and b.meta_key = 'start_end_4_end' and ( (a.meta_value <= '$today' and b.meta_value >= '$today'))) or
(a.meta_key = 'start_end_5_start' and b.meta_key = 'start_end_5_end' and ( (a.meta_value <= '$today' and b.meta_value >= '$today'))) or
(a.meta_key = 'start_end_6_start' and b.meta_key = 'start_end_6_end' and ( (a.meta_value <= '$today' and b.meta_value >= '$today'))) or
(a.meta_key = 'start_end_7_start' and b.meta_key = 'start_end_7_end' and ( (a.meta_value <= '$today' and b.meta_value >= '$today'))) or
(a.meta_key = 'start_end_8_start' and b.meta_key = 'start_end_8_end' and ( (a.meta_value <= '$today' and b.meta_value >= '$today'))) or
(a.meta_key = 'start_end_9_start' and b.meta_key = 'start_end_9_end' and ( (a.meta_value <= '$today' and b.meta_value >= '$today')))
";

//echo $sql;

$results = $wpdb->get_col($sql);

if($results) {
$param = array(
	'post_type' => 'event',
	'showposts' => -1,
	'posts_per_page' => -1,
	'post__in' => $results,
	'orderby' => 'ID',
	'order' => 'DESC',
);
$myQuery = new WP_Query();
$myQuery->query($param);

if ($myQuery->have_posts()) :
?>
              <div class="c-list-carousel">
                <ul>
<?php while ( $myQuery->have_posts() ) : $myQuery->the_post(); ?>
<?php
	$start_end_loop = get_field('start_end');
	$date_txt = get_event_date($start_end_loop);
	$img = get_cf_img($post->ID, 'pickup_img', $size='medium');
?>
                  <li><a href="<?php the_permalink(); ?>">
                      <div class="image"><img src="<?php echo $img; ?>" alt=""></div>
                      <div class="date">開催日：<?php echo $date_txt; ?></div>
                      <div class="text"><?php the_title(); ?></div></a></li>
<?php endwhile; ?>

                </ul>
              </div>
<?php
endif;
wp_reset_postdata();
}
?>

              <div class="top-column has-separater">
                <div>
                  <h3 class="top-heading-event">募集中のイベント</h3>

<?php
$param = array(
	'post_type' => 'event',
	'showposts' => -1,
	'posts_per_page' => -1,
	'orderby' => 'date',
	'order' => 'DESC',
	'meta_query' => array(
		array(
			'key'=>'now_recruiting',
			'value'=> '1',
			'compare'=>'='
		)
	)
);
$myQuery = new WP_Query();
$myQuery->query($param);

if ($myQuery->have_posts()) :
?>
                  <div class="top-newslist">
                    <ul>
<?php while ( $myQuery->have_posts() ) : $myQuery->the_post(); ?>
<?php
	$start_end_loop = get_field('start_end');
	$date_txt = get_event_date($start_end_loop);
?>
                      <li><a href="<?php the_permalink(); ?>"><span class="eventdate"><i>開催日</i><?php echo $date_txt; ?></span><span class="text"><?php the_title(); ?></span></a></li>
<?php endwhile; ?>

                    </ul>
                  </div>
<?php else: ?>
                  <p class="c-text-none">募集中のイベントがありません。</p>
<?php
endif;
wp_reset_postdata();
?>

                </div>
                <div>
                  <h3 class="top-heading-event">今後のイベント</h3>

<?php
$param = array(
	'post_type' => 'event',
	'showposts' => 5,
	'posts_per_page' => 5,
	'orderby' => 'meta_value',
	'order' => 'ASC',
	'meta_key' => 'start_end_0_start',
	'meta_query' => array(
		array('key'=>'start_end_0_end','value'=> $today,'compare'=>'>','type'=>'DATE'),
		array('key'=>'start_end_1_end','value'=> $today,'compare'=>'>','type'=>'DATE'),
		array('key'=>'start_end_2_end','value'=> $today,'compare'=>'>','type'=>'DATE'),
		array('key'=>'start_end_3_end','value'=> $today,'compare'=>'>','type'=>'DATE'),
		array('key'=>'start_end_4_end','value'=> $today,'compare'=>'>','type'=>'DATE'),
		array('key'=>'start_end_5_end','value'=> $today,'compare'=>'>','type'=>'DATE'),
		array('key'=>'start_end_6_end','value'=> $today,'compare'=>'>','type'=>'DATE'),
		array('key'=>'start_end_7_end','value'=> $today,'compare'=>'>','type'=>'DATE'),
		array('key'=>'start_end_8_end','value'=> $today,'compare'=>'>','type'=>'DATE'),
		array('key'=>'start_end_9_end','value'=> $today,'compare'=>'>','type'=>'DATE'),
		'relation'=>'OR'
	)
);
$myQuery = new WP_Query();
$myQuery->query($param);

if ($myQuery->have_posts()) :
?>
                  <div class="top-newslist">
                    <ul>
<?php while ( $myQuery->have_posts() ) : $myQuery->the_post(); ?>
<?php
	$start_end_loop = get_field('start_end');
	$date_txt = get_event_date($start_end_loop);
?>
                      <li><a href="<?php the_permalink(); ?>"><span class="eventdate"><i>開催日</i><?php echo $date_txt; ?></span><span class="text"><?php the_title(); ?></span></a></li>
<?php endwhile; ?>

                    </ul>
                  </div>
<?php else: ?>
                  <p class="c-text-none">イベントがありません。</p>
<?php
endif;
wp_reset_postdata();
?>

                </div>
              </div>
              <div class="l-nav-button"><a href="/zoo/event/">イベント一覧</a></div>
            </section>
            <section class="top-othernews">
              <div class="top-column">
                <div>
                  <h3 class="top-heading-news"><img src="/zoo/assets/images/top/title-news.png" alt="ニュース"></h3>
                  <div class="top-newslist">
                    <ul>
<?php
$param = array(
	'post_type' => 'news',
	'showposts' => 3,
	'posts_per_page' => 3,
	'orderby' => 'date',
	'order' => 'DESC',
);
$myQuery = new WP_Query();
$myQuery->query($param);

if ($myQuery->have_posts()) :
?>
<?php while ( $myQuery->have_posts() ) : $myQuery->the_post(); ?>
                      <li><a href="<?php the_permalink(); ?>"><span class="date"><?php the_time('Y年n月j日'); ?></span><span class="text"><?php the_title(); ?></span></a></li>
<?php endwhile; ?>
<?php
endif;
wp_reset_postdata();
?>
                    </ul>
                  </div>
                  <div class="l-nav-button"><a href="/zoo/news/">ニュース一覧</a></div>
                </div>
                <div>
                  <h3 class="top-heading-news"><img src="/zoo/assets/images/top/title-blog.png" alt="ブログ"></h3>
                  <div class="top-newslist">
                    <ul>
<?php
$param = array(
	'post_type' => 'blog',
	'showposts' => 3,
	'posts_per_page' => 3,
	'orderby' => 'date',
	'order' => 'DESC',
);
$myQuery = new WP_Query();
$myQuery->query($param);

if ($myQuery->have_posts()) :
?>
<?php while ( $myQuery->have_posts() ) : $myQuery->the_post(); ?>
<?php
	$category = get_the_terms($post->ID,'blogcat');
	$tag_name = $category[0]->name;

?>
                      <li><a href="<?php the_permalink(); ?>"><span class="date"><?php the_time('Y年n月j日'); ?><span class="tag"><?php echo $tag_name; ?></span></span><span class="text"><?php the_title(); ?></span></a></li>

<?php endwhile; ?>
<?php
endif;
wp_reset_postdata();
?>

                    </ul>
                  </div>
                  <div class="l-nav-button"><a href="/zoo/enjoy/blog/">ブログ一覧</a></div>
                </div>
              </div>
            </section>
            <aside class="top-banners">
              <div class="c-list-carousel-nocarousel">
                <ul>

<?php
$param = array(
	'post_type' => 'links',
	'showposts' => -1,
	'posts_per_page' => -1,
	'meta_key' => 'link_category',
	'meta_value' => '企業広告／スポンサー',
	'orderby' => 'menu_order',
	'order' => 'ASC'
);
$myQuery = new WP_Query();
$myQuery->query($param);
if ($myQuery->have_posts()) :
	while ( $myQuery->have_posts() ) : $myQuery->the_post();
		$val = get_fields();
?>
                  <li><a href="<?php echo $val['link_url']; ?>" target="<?php echo $val['link_target']; ?>">
                      <div class="image"><img src="<?php echo $val['link_img']['url']; ?>" alt=""></div>
                      <div class="text small"><?php echo $val['link_txt']; ?></div></a></li>
<?php
	endwhile;
endif;
wp_reset_postdata();
?>

                </ul>
              </div>
              <div class="c-list-carousel is-banner">
                <ul>
<?php
$param = array(
	'post_type' => 'links',
	'showposts' => -1,
	'posts_per_page' => -1,
	'meta_key' => 'link_category',
	'meta_value' => 'バナー',
	'orderby' => 'menu_order',
	'order' => 'ASC'
);
$myQuery = new WP_Query();
$myQuery->query($param);
if ($myQuery->have_posts()) :
	while ( $myQuery->have_posts() ) : $myQuery->the_post();
		$val = get_fields();
?>

                  <li><a href="<?php echo $val['link_url']; ?>" target="<?php echo $val['link_target']; ?>">
                      <div class="image"><img src="<?php echo $val['link_img']['url']; ?>" alt=""></div></a></li>
<?php
	endwhile;
endif;
wp_reset_postdata();
?>

                </ul>
              </div>
            </aside>
          </div>
          <div class="l-bg -bg1"></div>
          <div class="l-bg -bg2"></div>
        </main>




<?php get_footer(); ?>
