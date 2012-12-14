<?php
	$stmt = $db_conn->query('SELECT * FROM courses ORDER BY title');
	
	while($row = $stmt->fetch()) {
		echo '<div class="courses">';
		echo '<div class="title">' . $row['title'] . '</div>';
		echo '<div class="summary">' . $row['summary'] . '</div>';
		echo '</div>';
	}
?>
