<?php
include('config.php');
		if(isset($_GET['sub_topic']))
		$sub_topic=$_GET['sub_topic'];
		else
		$sub_topic="recent";
?>
<div class="category">
	<ul>
    	<li><a href="?sub_topic=recent"<?php if($sub_topic=="recent") echo "class='hilite'";?>>Recent Posts</a></li>
        <?php
		foreach($tags as $id => $tag)
		{
			?>
		<li><a href="?sub_topic=<?php echo $id;?>"<?php if($sub_topic==$id) echo "class='hilite'";?>><?php echo $tag;?></a></li>
        	<?php
		}
        ?>
    </ul>
</div>
<div class="content" style="width:80%;">
        <?php
		include('sub_topic_handler.php');
		sub_topic_handler($sub_topic);
		?>
</div>