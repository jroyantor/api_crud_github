
<?php require "../templates/header.html" ?>

<form action="create.php" method = "POST">

    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Repository Name"/>

    <label for="description">Description</label>
    <textarea name="description"></textarea>
<fieldset>
    <p>Do you want to set it's  visibility to private?</p>
    <label for="private">
    <input type="radio" name="private" value="true"/>
    Private
    </label>
</fieldset>
    <input type="submit" value="Add"/>
</form>

<?php  require "../templates/footer.html"?>

