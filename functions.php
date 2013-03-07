<?
// Function to clean values for db
function escape_value( $value ) {
	return addslashes(htmlspecialchars($value));
}
?>
