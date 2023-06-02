<form action="order.php" method="post" id="form">
    <input type="text" name="first" value="Hello">
</form>
<a href="#" onclick="myFunction()">Click</a>
<script>
    function myFunction() {
        document.getElementById("form").submit();
        return false; // Prevents the link from following its href
    }

    document.getElementById("form").addEventListener("submit", function() {
        window.location.href = 'order.php';
    });
</script>