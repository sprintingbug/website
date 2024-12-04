<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website ni Peruda</title>
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <?php include 'member-header.php'; ?>
    <?php include 'nav-members.php'; ?>

    <main class="content">
        <h1>Welcome to the Members' Page</h1>
        <section class="members">

            <!-- Member 1 -->
            <div class="member-item">
                <img src="css/m1.jpeg" alt="Band: The 1975">
                <p class="member-name">The 1975</p>
            </div>

            <!-- Member 2 -->
            <div class="member-item">
                <img src="css/m2.webp" alt="Band: Oasis">
                <p class="member-name">Oasis</p>
            </div>

            <!-- Member 3 -->
            <div class="member-item">
                <img src="css/m3.jpg" alt="Band: Paramore">
                <p class="member-name">Paramore</p>
            </div>

            <!-- Member 4 -->
            <div class="member-item">
                <img src="css/m4.webp" alt="Band: My Chemical Romance">
                <p class="member-name">My Chemical Romance</p>
            </div>

        </section>

        <?php include 'info-col.php'; ?>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>