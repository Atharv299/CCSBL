<?php
include 'ch21_include.php';
doDB();

//gather the topics
 $get_topics_sql = "SELECT topic_id, topic_title,
 DATE_FORMAT(topic_create_time, '%b %e %Y at %r') AS
 fmt_topic_create_time, topic_owner FROM forum_topics
 ORDER BY topic_create_time DESC";
 $get_topics_res = mysqli_query($mysqli, $get_topics_sql)
 or die(mysqli_error($mysqli));

 if (mysqli_num_rows($get_topics_res) < 1) {
 //there are no topics, so say so
 $display_block = "<p><em>No topics exist.</em></p>";
 } else {
 //create the display string
 $display_block = <<<END_OF_TEXT
 <table style="font-family: Arial, Helvetica, sans-serif;
 border-collapse: collapse;
 width: 80%;table-border: 10px">
 <tr style="width=50%">
 <th style="padding-top: 12px;
 padding-bottom: 12px;
 text-align: center;
 background-color: #4CAF50;
 color: white;">TOPIC TITLE</th>
 <th style="padding-top: 12px;
 padding-bottom: 12px;
 text-align: center;
 background-color: #4CAF50;
 color: white;">No. of POSTS</th>
 </tr>
 END_OF_TEXT;

 while ($topic_info = mysqli_fetch_array($get_topics_res)) {
 $topic_id = $topic_info['topic_id'];
 $topic_title = stripslashes($topic_info['topic_title']);
 $topic_create_time = $topic_info['fmt_topic_create_time'];
 $topic_owner = stripslashes($topic_info['topic_owner']);

 //get number of posts
 $get_num_posts_sql = "SELECT COUNT(post_id) AS post_count FROM
 forum_posts WHERE topic_id = '".$topic_id."'";
 $get_num_posts_res = mysqli_query($mysqli, $get_num_posts_sql)
 or die(mysqli_error($mysqli));

 while ($posts_info = mysqli_fetch_array($get_num_posts_res)) {
 $num_posts = $posts_info['post_count'];
 }

 //add to display
 $display_block .= <<<END_OF_TEXT
 <tr style="background-color: #f2f2f2;">
 <td style="border: 1px solid #ddd;
 padding: 8px;"><a href="showtopic.php?topic_id=$topic_id">
 <strong>$topic_title</strong></a><br/>
 Created on $topic_create_time by $topic_owner</td>
 <td style="border: 1px solid #ddd;
 padding: 8px;" class="num_posts_col">$num_posts</td>
 </tr>
 END_OF_TEXT;
 }
 //free results
 mysqli_free_result($get_topics_res);
 mysqli_free_result($get_num_posts_res);

 //close connection to MySQL
 mysqli_close($mysqli);

 //close up the table
 $display_block .= "</table>";
 }
 ?>
 <!DOCTYPE html>
 <html>
<head>
<title>Topics in My Forum</title>
<style type="text/css">
a.active,a:hover{
            border:2px solid white;
            border-radius: 5px;
        }
table {
border: 1px solid black;
border-collapse: collapse;
 }
 .bg{
    
            background-image: url("images/discus.jpg");

  
  height: 100%;
  
  background-repeat: no-repeat;
  background-size: cover;
    
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
<h1 style="margin-left:240px;padding-bottom:20px;color:white"> Topics in My Forum</h1>
 <?php echo $display_block; ?>
 <p style="margin-top:20px"><strong><h3>Would you like to <a href="addtopic.html">add a topic</a>?</h3></strong></p>


</div>
 </body>
 </html>