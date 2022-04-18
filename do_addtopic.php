 <?php
 include 'ch21_include.php';
 doDB();

 //check for required fields from the form
 if ((!$_POST['topic_owner']) || (!$_POST['topic_title']) ||
 (!$_POST['post_text'])) {
 header("Location: addtopic.html");
 exit;
 }

 //create safe values for input into the database
 $clean_topic_owner = mysqli_real_escape_string($mysqli,
 $_POST['topic_owner']);
 $clean_topic_title = mysqli_real_escape_string($mysqli,
 $_POST['topic_title']);
 $clean_post_text = mysqli_real_escape_string($mysqli,
 $_POST['post_text']);

 //create and issue the first query
 $add_topic_sql = "INSERT INTO forum_topics
 (topic_title, topic_create_time, topic_owner)
 VALUES ('$clean_topic_title', now(),'$clean_topic_owner')";

 $add_topic_res = mysqli_query($mysqli, $add_topic_sql)
 or die(mysqli_error($mysqli));

 //get the id of the last query
 $topic_id = mysqli_insert_id($mysqli);

 //create and issue the second query
 $add_post_sql = "INSERT INTO forum_posts
 (topic_id, post_text, post_create_time, post_owner)
 VALUES ('".$topic_id."', '".$clean_post_text."', now(), '".$clean_topic_owner."')";

 $add_post_res = mysqli_query($mysqli, $add_post_sql)
 or die(mysqli_error($mysqli));
 //close connection to MySQL
 mysqli_close($mysqli);

 //create nice message for user
 $display_block = "<p>The <strong>".$_POST["topic_title"]."</strong>
 topic has been created.</p>";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <style>
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
     </style>
 <title>New Topic Added</title>
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
 <h1  style="margin-left:270px;padding-bottom:10px;color:white">New Topic Added</h1>
 
 <div style="margin-left:235px;padding-bottom:20px;color:white"><?php echo $display_block; ?></div>
 <h3><a style="margin-left:280px;padding-bottom:20px;color:white"href="topiclist.php">click here to see topic lists</a></h3>
</div>
 </body>
 </html>