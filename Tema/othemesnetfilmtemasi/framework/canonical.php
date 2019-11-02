<?php // othemes Seo Ayarlarý Bölümü

// Aþaðýdaki Fonksiyonlar All in seo pack ve Yoast 'a aittir.
// Cannonical
function othemes_aiosp_get_url($query) {
	if ($query->is_404 || $query->is_search) {
		return false;
		}
			$haspost = count($query->posts) > 0;
			$has_ut = function_exists('user_trailingslashit');

			if (get_query_var('m')) {
				$m = preg_replace('/[^0-9]/', '', get_query_var('m'));
				switch (strlen($m)) {
					case 4: 
					$link = get_year_link($m);
					break;
            		case 6: 
                	$link = get_month_link(substr($m, 0, 4), substr($m, 4, 2));
                	break;
            		case 8: 
                	$link = get_day_link(substr($m, 0, 4), substr($m, 4, 2), substr($m, 6, 2));
	                break;
           			default:
           			return false;
				}
			} elseif (($query->is_single || $query->is_page) && $haspost) {
				$post = $query->posts[0];
				$link = get_permalink($post->ID);
     			$link = othemes_yoast_get_paged($link); 
			} elseif (($query->is_single || $query->is_page) && $haspost) {
				$post = $query->posts[0];
				$link = get_permalink($post->ID);
     			$link = othemes_yoast_get_paged($link);
		} elseif ($query->is_author && $haspost) {
   			global $wp_version;
      		if ($wp_version >= '2') {
        		$author = get_userdata(get_query_var('author'));
     			if ($author === false)
        			return false;
       			$link = get_author_link(false, $author->ID, $author->user_nicename);
   			} else {
        		global $cache_userdata;
	            $userid = get_query_var('author');
	            $link = get_author_link(false, $userid, $cache_userdata[$userid]->user_nicename);
      		}
  		} elseif ($query->is_category && $haspost) {
    		$link = get_category_link(get_query_var('cat'));
			$link = othemes_yoast_get_paged($link);
		} else if ($query->is_tag  && $haspost) {
			$tag = get_term_by('slug',get_query_var('tag'),'post_tag');
       		if (!empty($tag->term_id)) {
				$link = get_tag_link($tag->term_id);
			} 
			$link = othemes_yoast_get_paged($link);			
  		} elseif ($query->is_day && $haspost) {
  			$link = get_day_link(get_query_var('year'),
	                             get_query_var('monthnum'),
	                             get_query_var('day'));
	    } elseif ($query->is_month && $haspost) {
	        $link = get_month_link(get_query_var('year'),
	                               get_query_var('monthnum'));
	    } elseif ($query->is_year && $haspost) {
	        $link = get_year_link(get_query_var('year'));
		} elseif ($query->is_home) {
				$link = get_option( 'home' );
				$link = othemes_yoast_get_paged($link);
				$link = trailingslashit($link);
		} elseif ($query->is_tax && $haspost ) {
				$taxonomy = get_query_var( 'taxonomy' );
				$term = get_query_var( 'term' );
				$link = get_term_link( $term, $taxonomy );
				$link = othemes_yoast_get_paged( $link );
	    } else {
	        return false;
	    }

		return $link;

	}  

function othemes_yoast_get_paged($link) {
	$page = get_query_var('paged');
		if ($page && $page > 1) {
			$link = trailingslashit($link) ."page/". "$page";
			if ($has_ut) {
				$link = user_trailingslashit($link, 'paged');
			} else {
				$link .= '/';
			}
		}
	return $link;
}
?>