$(document).ready(function() {
$(function() {
$("#dialog").dialog({
autoOpen: false
});
$("#update").on("click", function() {
$("#dialog").dialog("open");
});
}); 
});