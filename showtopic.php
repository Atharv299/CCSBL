<?php
 include 'ch21_include.php';
 doDB();

 //check for required info from the query string
 if (!isset($_GET['topic_id'])) {
 header("Location: topiclist.php");
 exit;
 }

 //create safe values for use
 $safe_topic_id = mysqli_real_escape_string($mysqli, $_GET['topic_id']);

 //verify the topic exists
 $verify_topic_sql = "SELECT topic_title FROM forum_topics
 WHERE topic_id = '".$safe_topic_id."'";
 $verify_topic_res = mysqli_query($mysqli, $verify_topic_sql)
 or die(mysqli_error($mysqli));

 if (mysqli_num_rows($verify_topic_res) < 1) {
 //this topic does not exist
 $display_block = "<p><em>You have selected an invalid topic.<br/>
 Please <a href=\"topiclist.php\">try again</a>.</em></p>";
 } else {
 //get the topic title
 while ($topic_info = mysqli_fetch_array($verify_topic_res)) {
 $topic_title = stripslashes($topic_info['topic_title']);
 }

 //gather the posts
 $get_posts_sql = "SELECT post_id, post_text, DATE_FORMAT(post_create_time,
 '%b %e %Y<br/>%r') AS fmt_post_create_time, post_owner
 FROM forum_posts
 WHERE topic_id = '".$safe_topic_id."'
 ORDER BY post_create_time ASC";
 $get_posts_res = mysqli_query($mysqli, $get_posts_sql)
 or die(mysqli_error($mysqli));

//create the display string
 $display_block = <<<END_OF_TEXT
 <p>Showing posts for the <strong>$topic_title</strong> topic:</p>
 <table style="font-family: Arial, Helvetica, sans-serif;
 border-collapse: collapse;
 width: 80%;table-border: 10px">
 <tr style="width=50%">
 <th style="padding-top: 12px;
 padding-bottom: 12px;
 text-align: center;
 background-color: #4CAF50;
 color: white;">AUTHOR</th>
 <th style="padding-top: 12px;
 padding-bottom: 12px;
 text-align: center;
 background-color: #4CAF50;
 color: white;">POST</th>
 </tr>
 END_OF_TEXT;

 while ($posts_info = mysqli_fetch_array($get_posts_res)) {
 $post_id = $posts_info['post_id'];
 $post_text = nl2br(stripslashes($posts_info['post_text']));
 $post_create_time = $posts_info['fmt_post_create_time'];
 $post_owner = stripslashes($posts_info['post_owner']);

 //add to display
 $display_block .= <<<END_OF_TEXT
 <tr style="background-color: #f2f2f2;">
 <td style="border: 1px solid #ddd;
 padding: 8px;">$post_owner<br/><br/>
 created on:<br/>$post_create_time</td>
 <td style="border: 1px solid #ddd;
 padding: 8px;">$post_text<br/><br/>
 <a href="replytopost.php?post_id=$post_id">
 <strong>REPLY TO POST</strong></a></td>
 </tr>
 END_OF_TEXT;
 }

 //free results
 mysqli_free_result($get_posts_res);
 mysqli_free_result($verify_topic_res);

 //close connection to MySQL
 mysqli_close($mysqli);

 //close up the table
 $display_block .= "</table>";
 }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <title>Posts in Topic</title>
 <style type="text/css">
 a.active,a:hover{
            border:2px solid white;
            border-radius: 5px;
        }
 .bg{
    
    background-image: url("images/discus.jpg");


height: 100%;

background-repeat: no-repeat;
background-size: cover;

}
 table {
 border: 1px solid black;
 border-collapse: collapse;
 }
 th {
 border: 1px solid black;
 padding: 6px;
 font-weight: bold;
background: #ccc;
 }
 td {
 border: 1px solid black;
 padding: 6px;
 vertical-align: top;
 }
 .num_posts_col { text-align: center; }
</style>
</head>
 <body style="margin-left:0px" class="bg">
 <div style="background-color: #333; width:100%;margin-left: 0px;width:100%;margin-right: 0px;margin-top: 0px;height:50px;
        display:flex;
        padding-top: 0px;
        flex-direction:row;
        flex-wrap:wrap;
        position: fixed;
        top: 0%;
        justify-content: space-between;
        align-items:center;
        margin-bottom: 1px;">
            <div style="font-size: 45px;
            font-weight:600;
            padding-left: 1px;
            padding-top: 0px;
            margin-top: 10px;
        ">
          
            </div>
            <div >
                <ul style="list-style:none;
                display:flex;
                height:100%;
                margin-top: 10px;
                padding-top:6px;

                background-color: #333;">
                    <li><a style="text-decoration:none;
                        color: rgba(255,255,255,1);
                        padding: 0.9em 1.5em;
                        line-height: 1px;
                        font-size:15px;
                        text-transform: uppercase;
                        "href="home.php">Homepage</a></li>
                    <li><a style="text-decoration:none;
                        color: rgba(255,255,255,1);
                        padding: 0.9em 1.5em;
                        line-height: 1px;
                        font-size:15px;
                        text-transform: uppercase;" href="quize/index.html">QUIZ</a></li>
                    <li><a style="text-decoration:none;
                        color: rgba(255,255,255,1);
                        padding: 0.9em 1.5em;
                        line-height: 1px;
                        font-size:15px;
                        text-transform: uppercase;" href="#">About us</a></li>
                    <li><a style="text-decoration:none;
                        color: rgba(255,255,255,1);
                        padding: 0.9em 1.5em;
                        line-height: 1px;
                        font-size:15px;
                        text-transform: uppercase; "href="#" class="active">Discussion</a></li>
                    <li><a style="text-decoration:none;
                        color: rgba(255,255,255,1);
                        padding: 0.9em 1.5em;
                        line-height: 1px;
                        font-size:15px;
                        text-transform: uppercase; "href="#">Contact us</a></li>
                    <li><a style="text-decoration:none;
                        color: rgba(255,255,255,1);
                        padding: 0.9em 1.5em;
                        line-height: 1px;
                        font-size:15px;
                        text-transform: uppercase; " href="login.php?logout='1'" >Logout</a></li>
                </ul>
            </div>
</div>
<div style="margin-top:80px;margin-left:20%">
<h1 style="margin-left:300px;padding-bottom:20px;color:white">Posts in Topic</h1>
<?php echo $display_block; ?>
</div>
</body>
</html>