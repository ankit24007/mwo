<div class="col-sm-6">
	<form method="post" action="index.php?movieForm" enctype="multipart/form-data">
		<h3>Add Movie Details</h3>
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" name="title" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Genre</label>
			<select name="genre" class="form-control">
				<option value="Action">None</option>
				<option value="Action">Action</option>
				<option value="Adventure">Adventure</option>
				<option value="Drama">Drama</option>
				<option value="Romance">Romance</option>
				<option value="Comedy">Comedy</option>
				<option value="Horror">Horror</option>
				<option value="Fantasy">Fantasy</option>
				<option value="Science Fiction">Science Fiction</option>
				<option value="Mystery/Crime">Mystery/Crime</option>
			</select>
		</div>
		
		<div class="form-group">
			<label>Actors</label>
			<input type="text" name="actor" class="form-control">
		</div>	
		<div class="form-group">
			<label>upload Banner</label>
			<input type="file" name="banner">
		</div>
		<div class="form-group">
			<label>upload images</label>
			<input type="file" name="image">
		</div>
		
		<div class="form-group">
			<label>Description</label>
			<textarea name="description" rows="5" cols="68" placeholder="say something about movie"></textarea>
		</div>
		
		<input type="submit" class="btn btn-primary btn-block" value="Submit" name="submit">

		</form>
	</div>
</div>
</div>