<?php 



require 'db.php';

$id = $_GET['id'];

$sql = 'SELECT * FROM people WHERE id =:id';

$statement = $connection->prepare($sql);
$statement->execute(array(':id'=> $id));

$person = $statement->fetch(PDO::FETCH_OBJ);

$message = '';

if(isset($_POST['name']) && isset($_POST['email'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];

	$sql = "UPDATE  people  SET name = :name,  email =:email WHERE id = :id";

	$statement = $connection->prepare($sql);

	if(
	$statement->execute(array(':name' => $name, ':email'=>$email, ':id' => $id)) ) {
		header('Location: index.php');
	}

	
}

 ?>

<?php 
require 'header.php';
?>

<div class="container">
	<div class="card mt-5">
		<div class="card-header">
			<h2>Update a person</h2>
		</div>
		<div class="card-body">

			<?php if(!empty($message)): ?>

				<div class="alert alert-success">
					<?php echo $message?>
				</div>

			<?php endif; ?>
			<form action="" method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input value="<?php echo $person->name; ?>" type="text" name="name" id="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="name">Email</label>
					<input  value="<?php echo $person->email; ?>" type="email" name="email" id="email" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
require 'footer.php';
?>