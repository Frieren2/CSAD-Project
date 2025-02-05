<?php include 'fetchMovies.php';?>
<div class="headers" style="display: flex; gap: 10px; flex-direction: column;">
    <h1>View Movies</h1>
    <?php if (mysqli_num_rows($result) > 0): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Poster</th>
            <th>Genre</th>
            <th>Rating</th>
            <th>Edit</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                    <?php if (!empty($row['poster'])): ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['poster']); ?>" 
                             alt="Movie Poster" width="100" height="100">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
                <td><?php echo $row['genre']; ?></td>
                <td><?php echo $row['rating']; ?></td>
                <td>
                    <a href="editMovie.php?id=<?php echo $row['id']; ?>">
                        <button style="background: transparent;border: none;"><img src="resources/edit.png"  class = "edit"></button>
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
        <p>No movies found.</p>
    <?php endif; ?>
</div>
<?php
mysqli_close($db);
?>