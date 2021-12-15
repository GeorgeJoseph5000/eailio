
<div class="modal fade" id="mypost" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Enter what's in your mind!
				</h4>
			</div>
			<div class="modal-body">
				<div id="postForm">
					<textarea id="post" name="post"
						style="width: 600px; height: 200px;"
						class="form-control img-responsive"></textarea>
					<br />
					<h5>When you want to post an album or a photo, leave the select
						options opened.</h5>
					<div class="row">
						<div class="col-md-6">
							<button style="margin-top: 10px;" id="BtnAlbums"
								class="btn btn-primary">Post Album</button>
							<br />
							<div id="album" style="display: none;">
								<h4>Post an album of your albums:</h4>
								<select id="SelAlbums">
									<option value="none">Don't Add Albums</option>
										<?php
										$queryalbums = mysql_query ( "SELECT * FROM albums WHERE user='$un'" );
										while ( $row = mysql_fetch_array ( $queryalbums ) ) {
											$name = $row ['name'];
											echo '<option value="' . $name . '">' . $name . '</option>';
										}
										?>
									</select><br />
								<br />
							</div>
						</div>
						<div class="col-md-6">
							<button style="margin-top: 10px;" id="BtnPhotoes"
								class="btn btn-primary">Post Photo</button>
							<br />
							<div id="photo" style="display: none;">
								<h4>Post a photo of your photoes:</h4>
								<select id="SelPhotoes">
									<option value="none">Don't Add Photoes</option>
										<?php
										$queryalbums = mysql_query ( "SELECT * FROM photoes WHERE user='$un'" );
										while ( $row = mysql_fetch_array ( $queryalbums ) ) {
											$name = $row ['name'];
											echo '<option value="' . $name . '">' . $name . '</option>';
										}
										?>
									</select><br />
								<br />
							</div>
						</div>
					</div>
					<br /> <input type="submit" data-dismiss="modal"
						onclick="javascript: send_Post()" name="send" value="Post"
						class="btn btn-primary" /><br />
					<br />
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$("#BtnAlbums").click(function () {
	    if ($("#album").is(":hidden") && $("#photo").is(":hidden")) {
	        $("#album").slideDown("fast");
	    } else {
	        $("#album").slideUp("fast");
	    }
	});
	$("#BtnPhotoes").click(function () {
	    if ($("#album").is(":hidden") && $("#photo").is(":hidden")) {
	        $("#photo").slideDown("fast");
	    } else {
	        $("#photo").slideUp("fast");
	    }
	});
</script>