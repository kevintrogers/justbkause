<?php

add_action('admin_menu', 'dcp_submenu_page');

function dcp_submenu_page() {
    add_submenu_page( 'options-general.php', 'DCP Lite', 'DCP Lite', 'manage_options', 'dcp-lite', 'dcp_submenu_page_callback' );
}

function dcp_submenu_page_callback() {
    ?>
    <style type="text/css">
        p.b {
            font-weight: bold;
            font-size: 20px;
        }

        p.ex {
            font-weight: bold;
            font-size: 17px;
            margin-top: 0;
        }

        i {
            font-style: normal;
            color: red;
            font-weight: bold;
        }

        .gopro {
  background: none repeat scroll 0 0 white;
  border: 3px solid red;
  color: black;
  font-size: 14px;
  margin-top: 20px;
  padding: 20px;
  text-align: center;
  width: 430px;
}

.gopro a {
  display: block;
  font-size: 18px;
  margin-top: 5px;
  outline: none !important;
}

.dcplist {
  background: none repeat scroll 0 0 white;
  font-size: 15px;
  padding: 10px;
}
    </style>

    <div class="wrap dcp">
        <h2>Display Category Posts Via Shortcode Lite</h2>
        <div class="gopro">
            go pro to unlock all the extra shortcode options for just $16.50!<br>
            <a href="http://jultranet.com/wp/" target="_blank">go pro now!</a>
            <br>
            <a href="http://jultranet.com/wp/dcp-pro/" target="_blank">view demo</a>
        </div>
        <br>
        <div class="dcplist">

        <ul>
          <li>To have images appear inside the posts, you need to attach featured images to your posts.</li>
          <li>To have the "read more" link appear, you need to add a "read more" break inside your posts.</li>
        </ul>        

        <p class="b">Shortcode options:</p>

        <ol>
            <li><b>category</b> <br> the category from which to fetch posts</li>
            <li><b>readmoretext</b> <br> the read more link text, default is "Read more".</li>
            <li><b>postsperpage</b> <br> how many posts to show at once. If there are more posts than this number, pagination will be activated. For pagination to be available, please install the <a href="https://wordpress.org/plugins/wp-pagenavi/" target="_blank">wp-pagenavi plugin</a>. <i>PRO VERSION ONLY</i></li>
            <li><b>readmore</b> <br> whether to show the "read more" link or not. Can be either <b>yes</b> or <b>no</b>. Defaults to <b>yes</b>. <i>PRO VERSION ONLY</i></li>
            <li><b>order</b> <br> whether to show posts in asceding or descending order. Can be either <b>desc</b> or <b>asc</b>. Defaults to <b>asc</b>. <i>PRO VERSION ONLY</i></li>
            <li><b>charlimit</b> <br> limit post content to a specified number of characters. It takes the hassle out of adding "read more" tag to each post. If used, it will overwrite the "read more" tag if one is used. <i>PRO VERSION ONLY</i></li>
            <li><b>in_row</b> <br> how many posts to show in a row. Can be either 2,3 or 4. Defaults to 3 in pro version and to 4 in the lite version. <i>PRO VERSION ONLY</i></li>
            <li><b>linktitles</b> <br> whether to make titles link to posts. Can be either <b>yes</b> or <b>no</b>. Defaults to <b>yes</b>. <i>PRO VERSION ONLY</i></li>
            <li><b>linkfi</b> <br> whether to make featured images link to posts. Can be either <b>yes</b> or <b>no</b>. Defaults to <b>yes</b>. <i>PRO VERSION ONLY</i></li>
            <li><b>dots</b> <br> whether to show 3 dots or not at the end of the post content. Can be either <b>yes</b> or <b>no</b>. Defaults to <b>yes</b>. <i>PRO VERSION ONLY</i></li>
            <li><b>date</b> <br> whether to show date of the post. Can be either <b>yes</b> or <b>no</b>. Defaults to <b>yes</b>. <i>PRO VERSION ONLY</i></li>
            <li><b>loadall</b> <br> whether to show "load all" link. Can be either <b>yes</b> or <b>no</b>. Defaults to <b>no</b>. <i>PRO VERSION ONLY</i></li>
            <li><b>loadalltext</b> <br> The text for the loadall link. Defaults to <b>Load All</b>. <i>PRO VERSION ONLY</i></li>
            <li><b>class</b> <br> you can add a custom class to the container div with this option if you need it. <i>PRO VERSION ONLY</i> </li>
            <li><b>multicats</b> <br> whether to display posts from multiple categories via ids of the categories, example: <b>multicats="2,3"</b>. If this option is used it will overwrite the "category" option. <i>PRO VERSION ONLY</i></li>
            <li><b>posts</b> <br> display specific posts via their ids regardless of their categories, example: <b>posts="2,3,11"</b>. <i>PRO VERSION ONLY</i></li>


        </ol>
            <p class="b">Example:</p>
              <p class="ex">[dcplite category=latest readmoretext=More...]</p>
              <p class="ex">[dcppro category=latest readmoretext=More... charlimit=200 in_row=3 postsperpage=9 loadall=yes]</p>
        </div>
    </div>

<?php
}

?>