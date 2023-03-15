
<h2><span>Admin</span> Add/Edit a Recommendation</h2>
<div class="ymp_content">
<div class="auto-emails edit-recommendations" style="background:0 none">
<div class="row-fluid">

<form enctype="multipart/form-data" action="" method="post" class="form-horizontal">
<div class="span6">
<div class="control-group">
<label class="control-label">Title:</label>
<div class="controls">
<input name="title" type="text" class="input_field" value="<?php echo $recommendation->title ?>">
</div>
</div>

<div class="control-group">
<label class="control-label">Description:</label>
<div class="controls">
<textarea name="description" cols="10" rows="10" class="input_field" style="height:72px;"><?php echo $recommendation->description ?></textarea>
</div>
</div>

<div class="control-group">
<label class="control-label">Image:</label>
<div class="controls">
<input type="text" name="image" class="input_field" value="<?php echo $recommendation->image ?>" style="vertical-align:middle;width:67%">
<button type="submit" class="btn ymp_btn_lrge" style="margin-bottom:0">Browse</button>
</div>
</div>

<div class="control-group">
<label class="control-label">Video:</label>
<div class="controls">
<input name="video" type="text" class="input_field" value="<?php echo $recommendation->video ?>">
</div>
</div>

<div class="control-group">
<label class="control-label">Affiliate link:</label>
<div class="controls">
<input name="affiliate_link" type="text" class="input_field" value="<?php echo $recommendation->affiliate_link ?>">
</div>
</div>
</div>

<div class="span6 rec-col">
<div class="control-group">
<label class="control-label">Stage:</label>
<div class="controls">
<select name="stage" class="input_field">
<option value="">Select</option>
<?php if($lcs): ?>
<?php foreach($lcs as $lc): ?>
<option <?php if($recommendation->stage==$lc->id){ echo "selected='selected'"; } ?> value="<?php echo $lc->id ?>"><?php echo $lc->stage ?></option>
<?php endforeach; ?>
<?php endif; ?>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label">Overall:</label>
<div class="controls">
<select name="overall" class="input_field">
<option value="">Select</option>
<?php if($lcs): ?>
<?php foreach($lcs as $lc): ?>
<option <?php if($recommendation->overall==$lc->id){ echo "selected='selected'"; } ?> value="<?php echo $lc->id ?>"><?php echo $lc->overall ?></option>
<?php endforeach; ?>
<?php endif; ?>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label">Sub-1:</label>
<div class="controls">
<select name="sub1" class="input_field">
<option value="">Select</option>
<?php if($lcs): ?>
<?php foreach($lcs as $lc): ?>
<option <?php if($recommendation->sub1==$lc->id){ echo "selected='selected'"; } ?> value="<?php echo $lc->id ?>"><?php echo $lc->sub1 ?></option>
<?php endforeach; ?>
<?php endif; ?>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label">Sub-2:</label>
<div class="controls">
<select name="sub2" class="input_field">
<option value="">Select</option>
<?php if($lcs): ?>
<?php foreach($lcs as $lc): ?>
<option <?php if($recommendation->sub2==$lc->id){ echo "selected='selected'"; } ?> value="<?php echo $lc->id ?>"><?php echo $lc->sub2 ?></option>
<?php endforeach; ?>
<?php endif; ?>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label">Lession:</label>
<div class="controls">
<select name="lessons" class="input_field">
<option>Select</option>
<?php if($lessons): ?>
<?php foreach($lessons as $lesson): ?>
<option <?php if($recommendation->lesson_id==$lesson->id){ echo "selected='selected'"; } ?> value="<?php echo $lesson->id ?>"><?php echo $lesson->title ?></option>
<?php endforeach; ?>
<?php endif; ?>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label">Survey:</label>
<div class="controls">
<select name="survey" class="input_field">
<option>Select</option>
<?php if($surveys): ?>
<?php foreach($surveys as $survey): ?>
<option <?php if($recommendation->survey_id==$survey->id){ echo "selected='selected'"; } ?> value="<?php echo $survey->id ?>"><?php echo $survey->title ?></option>
<?php endforeach; ?>
<?php endif; ?>
</select>
</div>
</div>

</div>
<div class="clear"></div>
<div class="sbmt_dv" style="padding-top:20px">
<button type="submit" class="btn">Save</button>&nbsp;
<button onclick="window.location='<?php echo site_url('admin/recommendation') ?>';" class="btn">Cancel</button>
</div>
</form>
</div>
</div>
</div>	<!-- end inner container -->