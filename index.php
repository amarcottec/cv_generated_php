<?php 

	include('config/db_connect.php');
	// write query for all cv

	$sql = 'SELECT id,name,email, title, jobDescription FROM cv ORDER BY created_at';
	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$cvList = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>
	
	<h4 class="center grey-text">Curriculum Vitea</h4>
	
	<div class="container">
		<div class="row">

			<?php foreach($cvList as $cv){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($cv['name']); ?></h6>
							<h6><?php echo htmlspecialchars($cv['title']); ?></h6>
							<h6><?php echo htmlspecialchars($cv['email']); ?></h6>
							<ul class="grey-text">
								<?php foreach(explode(',', $cv['jobDescription']) as $job){ ?>
									<li><?php echo htmlspecialchars($job); ?></li>
								<?php } ?>
							</ul>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?id=<?php echo $cv['id']?>">more info</a>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>