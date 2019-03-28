<?php  require 'db.php';

$sql = 'SELECT * FROM  people';

$statement = $connection->prepare($sql);

$statement->execute();


$people = $statement->fetchAll(PDO:: FETCH_OBJ);

?>

<?php require 'header.php'; ?>
    <div class="container">
    	<div class="card mt-5">
    		<div class="card-header">
    			<h2>All people</h2>
    		</div>
    		<div class="card-body">
    			<table class="table table-bordered">
    			<tr>
    				<th>ID</th>
    				<th>Name</th>
    				<th>Email</th>
    				<th>Action</th>
    			</tr>

    			<?php foreach($people as $person):?>
    			<tr>
    				<td><?php  echo $person->id; ?></td>
    				<td><?php echo $person->name; ?></td>
    				<td><?php echo $person->email; ?></td>
    				<td>
    					<a href="edit.php?id=<?php echo $person->id;?>" class="btn btn-info">Edit</a>
    					<a onclick= "return confirm('Are you sure you want to delete?');"href="delete.php?id=<?php echo $person->id; ?>" class="btn btn-danger">Delete</a>
    				</td>
    			</tr>
    		<?php endforeach;?>
    		    </table>
    		</div>
    	</div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php require 'footer.php'; ?>