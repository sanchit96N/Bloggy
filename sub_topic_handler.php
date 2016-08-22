<?php
function sub_topic_handler($sub_topic)
{
	global $tags;
	if($sub_topic=="recent")
	select($res);
	else
	{
	$sub_topic=$tags[$sub_topic];
	select($res,"post_tag",$sub_topic);
	}
	while($post=mysqli_fetch_array($res))
	{
		?>
        <div class="post">
            <div class="title">
            <p class="highlight">title :</p><?php echo $post['post_title'];?>
            </div>
            <div class="post_info"><p class="highlight">Post on :</p><?php echo $post['post_on'];?> <p class="highlight">by :</p><?php echo $post['post_by'];?>
            </div>
            <div class="tag">
            <p class="highlight">tag :</p><?php echo $post['post_tag'];?>
            </div>
            <div class="message">
				<?php echo str_replace("<br>"," ",str_replace("<br />"," ",$post['post_message']));?>
            </div>
            <div class="view">
            <a href="view.php?post_id=<?php echo $post['post_id'];?>">View Complete Article</a>
            </div>
        </div>
        <?php
	}
}
?>