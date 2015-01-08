<div class="box create_comment" id="createcomment" style="display:none;">
<h3><?php just_variable("commentHead"); ?></h3>
<form action="<?php echo get_option("siteurl"); ?>/wp-comments-post.php" method="post" id="commentform">
	<p>
	<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22">
	<label for="author"><?php just_variable("commentAuthor"); ?></label>
	</p>
	<p>
	<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2">
	<label for="email"><?php just_variable("commentEmail"); ?></label>
	</p>
	<p>
	<input type="text" name="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3">
	<label for="url"><?php just_variable("commentUrl"); ?></label>
	</p>
	<p><?php just_variable("commentComment"); ?>
	<textarea name="comment" id="comment" style="width:100%;" rows="10" tabindex="4"></textarea>
	</p>
	<p>
	<input name="submit" type="submit" id="submit" tabindex="5" value="<?php just_variable("commentSubmit"); ?>">
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>">
	</p>
	<?php do_action("comment_form",$post->ID); ?>
</form>
</div>

<div class="box list_comments">
<?php foreach($comments as $comment) : ?>
<div class="comment" id="comment-<?php comment_ID() ?>">
<small class="commentmetadata"><?php comment_author_link() ?> <strong>|</strong> am <?php comment_date("l, j. F Y") ?> um <?php comment_time("H:i") ?> Uhr</small>
<?php comment_text() ?>
<?php if ($comment->comment_approved == "0") : ?>
<strong><?php just_variable("commentApproveWarning"); ?></strong><br><?php endif; ?>
</div>
<?php endforeach; ?>
<a href="javascript:void(0)" onclick="toggle_comments();"><?php just_variable("commentToggleBox"); ?></a>
</div>
