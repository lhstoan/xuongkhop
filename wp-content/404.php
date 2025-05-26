<?php

/* ============================================ */
/* =================== META =================== */
$GLOBALS['h1'] = "404 Not Found";
/* ================= end META ================= */
/* ============================================ */

// ID of <body> 
$GLOBALS['bodyID'] = "";

// Class of <body>
$GLOBALS['bodyClass'] = "under";

get_header();
?>
		<main id="main">
            <div class="breadcrumb">
                <div class="inner">
                	<ul class="breadcrumb-list">
	                    <li><a href="<?php echo home_url(); ?>">HOME</a></li>
	                    <li>404 Not Found</li>
	                </ul>
                </div>
            </div>
	    	<div id="content">
	    		<div class="inner">
	    			<h3 class="center">404 Not Found</h3>
		    		<p class="center">お探しのページが見つかりませんでした。<br>URLが正しく入力されていない可能性がありますので、再度ご確認ください。</p>
		    		<p class="center"><a href="<?php echo home_url(); ?>">TOPページに戻る</a></p>
	    		</div>
	    	</div>
	    </main>
<?php 
get_footer();
?>